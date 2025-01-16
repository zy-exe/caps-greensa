<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Order;
use App\Models\Train;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Exports\HistoryExport;
use App\Models\LayoutModels;
use Illuminate\Support\Facades\DB;


use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function showlogin()
    {
        return view('admin.page.login');
    }

    public function logout(Request $request)
    {
        // logout
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // redirect to login page
        return redirect('/admin-login');
    }

    public function showorderspj()
    {
        // get order
        $orders = Order::whereNotNull('surat')->get();

        // get now date
        $now = Carbon::now();
        $now = $now->format('Y-m-d');

        // update order status to 'rejected' WHERE tanggal checkin <= $now
        OrderItem::whereDate('checkin', '<=', $now)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        // redirect to orderspj page
        return view('admin.page.orderspj', ['orders' => $orders]);
    }

    public function showorderreguler()
    {
        // update order yang kadaluarsa jadi is_expired=1 AND status='Rejected'
        $orderExpireds = Order::whereNull('surat')
        ->whereNull('bukti_pembayaran')
        ->where('created_at', '<', Carbon::now()->subHour())
        ->get();
        
        foreach ($orderExpireds as $orderExpired) {
            $orderExpired->update(['is_expired' => 1]);
            foreach ($orderExpired->items as $item) {
                $item->update(['status' => 'Rejected']);
            }
        }

        // get order reguler
        $orders = Order::whereNull('surat')
                ->where('is_expired', 0)
                ->get();

        // get now date
        $now = Carbon::now();
        $now = $now->format('Y-m-d');

        // update order status to 'rejected' WHERE tanggal checkin <= $now
        OrderItem::whereDate('checkin', '<=', $now)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        // redirect to orderreguler page
        return view('admin.page.orderreguler', ['orders' => $orders]);
    }

    public function showhistory()
    {
        // update order yang kadaluarsa jadi is_expired=1 AND status='Rejected'
        $orderExpireds = Order::whereNull('surat')
        ->whereNull('bukti_pembayaran')
        ->where('created_at', '<', Carbon::now()->subHour())
        ->get();
        
        foreach ($orderExpireds as $orderExpired) {
            $orderExpired->update(['is_expired' => 1]);
            foreach ($orderExpired->items as $item) {
                $item->update(['status' => 'Rejected']);
            }
        }

        // get order yang statusnya != pending OR order yang sudah expired
        $orders = Order::where(function ($query) {
            $query->whereHas('items', function ($subQuery) {
                $subQuery->where('status', '!=', 'Pending');
            })->orWhere('is_expired', 1);
        })->get();

        // get now date
        $now = Carbon::now();
        $now = $now->format('Y-m-d');

        // update order status to 'rejected' WHERE tanggal checkin <= $now
        OrderItem::whereDate('checkin', '<=', $now)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        // redirect to order history page
        return view('admin.page.history', ['orders' => $orders]);
    }

    public function accOrder($itemId)
    {
        // update selected order status to 'Accepted'
        $item = OrderItem::findOrFail($itemId);
        $item->status = 'Accepted';
        $item->save();

        // redirect back with message
        return redirect()->back()->with('success', 'Order has been accepted.');
    }

    public function rejectOrder($itemId)
    {
        // update selected order status to 'Rejected'
        $item = OrderItem::findOrFail($itemId);
        $item->status = 'Rejected';
        $item->save();

        // redirect back with message
        return redirect()->back()->with('success', 'Order has been rejected.');
    }

    public function updateOrderStatus(Request $request, $orderId)
    {
        // get order AND get $request->status
        $order = Order::findOrFail($orderId);
        $status = $request->input('status');

        if ($status == 'Acc' || $status == 'Reject') {
            $order->status = $status;
            $order->save();
        }

        // redirect back with message
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function deleteSelectedOrders(Request $request)
    {
        // Validasi request
        $request->validate([
            'order_ids' => 'required|array', // Memastikan order_ids ada dan bertipe array
            'order_ids.*' => 'exists:order_items,id', // Memastikan setiap order_id ada di database
        ]);

        // Mendapatkan order_ids dari request
        $orderIds = $request->order_ids;

        // Mendapatkan order_items yang sesuai dengan order_ids
        $orderItems = OrderItem::whereIn('id', $orderIds)->get();

        // Mendapatkan order_ids yang unik dari order_items
        $uniqueOrderIds = $orderItems->pluck('order_id')->unique()->toArray();

        // Menghapus order_items yang sesuai dengan order_ids
        OrderItem::whereIn('id', $orderIds)->delete();

        // Menghapus order yang memiliki order_id yang sama dengan order_ids
        Order::whereIn('id', $uniqueOrderIds)->delete();

        // Redirect atau kembali ke halaman yang sesuai setelah penghapusan berhasil
        return redirect()->back()->with('success', 'Berhasil dihapus.');
    }


    public function showtcstore()
    {
        return view('admin.page.listTC.trainstore');
    }

    public function login(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // cek apakah di database ada datanya
        $admin = Admin::where('username', $credentials['username'])->first();

        // jika akun ada, redirect to dashboard
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('admin', $admin);
            return redirect()->intended('/admin')->withErrors(['akun' => 'Sudah Login !!!']);
        }
        // jika tidak, redirect back with error
        else {    
            return redirect()->back()->withErrors(['akun' => 'Akun salah']);
        }
    }

    public function showtcedit($id)
    {
        // get train
        $train = Train::findOrFail($id);

        // redirect to trainedit page
        return view('admin.page.listTC.trainedit', ['train' => $train]);
    }

    public function showadmin(MonthlyUsersChart $chart)
    {
        // update order yang kadaluarsa jadi is_expired=1 AND status='Rejected'
        $orderExpireds = Order::whereNull('surat')
        ->whereNull('bukti_pembayaran')
        ->where('created_at', '<', Carbon::now()->subHour())
        ->get();
        
        foreach ($orderExpireds as $orderExpired) {
            $orderExpired->update(['is_expired' => 1]);
            foreach ($orderExpired->items as $item) {
                $item->update(['status' => 'Rejected']);
            }
        }

        // Logika pengambilan data berdasarkan filter yang dipilih
        $orders = Order::all();
        $order_pending = OrderItem::where('status', 'Pending')->count();
        $order_acc = OrderItem::where('status', 'Accepted')->count();
        $order_rej = OrderItem::where('status', 'Rejected')->count();
        $pendapatan = OrderItem::where('status', 'Accepted')->sum('harga');
        $orderschart['chart'] = $chart->build();

        $currentMonth = Carbon::now()->month; // Mengambil bulan saat ini

        $order_accmonth = OrderItem::where('status', 'Accepted')
            ->whereMonth('checkin', $currentMonth) // Hanya pesanan dalam bulan ini
            ->select(DB::raw('count(*) as total'))
            ->first(); // Menggunakan first() untuk hanya mengambil satu baris hasil pertama

        $total_accmonth = $order_accmonth->total;

        $order_pending_month = OrderItem::where('status', 'Pending')
        ->whereMonth('checkin', $currentMonth)
        ->count();
        $order_rejected_month = OrderItem::where('status', 'Rejected')
        ->whereMonth('checkin', $currentMonth)
        ->count();
        
        $pendapatan_month = OrderItem::where('status', 'Accepted')
        ->whereMonth('checkin', $currentMonth)
        ->sum('harga');

        return view('admin.page.dashboard', [
            'orders' => $orders,
            'order_pending' => $order_pending,
            'order_acc' => $order_acc,
            'order_rej' => $order_rej,
            'pendapatan' => $pendapatan,
            'orderschart' => $orderschart,
            'total_accmonth' => $total_accmonth,
            'order_pending_month'=> $order_pending_month,
            'order_rejected_month'=> $order_rejected_month,
            'pendapatan_month'=>$pendapatan_month // Mengirim total pesanan yang diterima pada bulan ini
        ]);
    }


    public function showtrlist()
    {
        // get train
        $trains = Train::all();

        // redirect to trainlist page
        return view('admin.page.listTC.trainlist', ['trains' => $trains]);
    }

    public function showuserlist()
    {
        // get guest
        $guests = Guest::all();

        // redirect to user list page
        return view('admin.page.userlist', ['guests' => $guests]);
    }

    public function userdelete($id)
    {
        // get user where 'id' = $id, then delete
        $guest = Guest::findOrFail($id);
        $guest->delete();

        // redirect back with message
        return redirect('/admin-user-list')->withErrors(['Akun berhasil dihapus']);
    }



    public function tcedit(Request $request, $id)
    {
        // update train
        $train = Train::findOrFail($id);
        $train->update([
            'nama'      => $request->nama,
            'lantai'    => $request->lantai,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // update kapsitas
        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'Classroom')
            ->update(['kapasitas' => $request->kap_Classroom]);

        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'Teater')
            ->update(['kapasitas' => $request->kap_Teater]);

        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'Round Table')
            ->update(['kapasitas' => $request->kap_Round_Table]);

        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'U Shape')
            ->update(['kapasitas' => $request->kap_U_Shape]);

        // update gambar utama
        if ($request->hasFile('gambar_utama')) {
            //upload new image
            $gambarPath = $request->file('gambar_utama');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'utama')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'utama')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar biasa1
        if ($request->hasFile('gambar_biasa1')) {
            //upload new image
            $gambarPath = $request->file('gambar_biasa1');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'biasa1')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'biasa1')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar biasa2
        if ($request->hasFile('gambar_biasa2')) {
            //upload new image
            $gambarPath = $request->file('gambar_biasa2');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'biasa2')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'biasa2')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar biasa3
        if ($request->hasFile('gambar_biasa3')) {
            //upload new image
            $gambarPath = $request->file('gambar_biasa3');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'biasa3')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'biasa3')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar denah
        if ($request->hasFile('gambar_denah')) {
            //upload new image
            $gambarPath = $request->file('gambar_denah');
            $gambarPath->storeAs('public/posts/denah/', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/denah/' . $train->images()->where('konten', 'denah')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'denah')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        return redirect()->route('train.showlist')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function tcdelete($id)
    {
        // get train
        $train = Train::findOrFail($id);

        // delete data from database
        $train->delete();

        // delete image data from storage
        Storage::delete('public/posts/' . $train->gambar);

        // redirect to train list with message
        return redirect('/admin-training-center-list')->withErrors(['Training Center berhasil dihapus']);
    }

    public function tcstore(Request $request)
    {
        // create train
        $train = Train::create([
            'nama'      => $request->nama,
            'lantai'    => $request->lantai,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // add gambar utama
        if ($request->hasFile('gambar_utama')) {
            // upload new image
            $gambarPath = $request->file('gambar_utama');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'utama',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar biasa1
        if ($request->hasFile('gambar_biasa1')) {
            // upload new image
            $gambarPath = $request->file('gambar_biasa1');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'biasa1',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar biasa2
        if ($request->hasFile('gambar_biasa2')) {
            // upload new image
            $gambarPath = $request->file('gambar_biasa2');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'biasa2',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar biasa3
        if ($request->hasFile('gambar_biasa3')) {
            // upload new image
            $gambarPath = $request->file('gambar_biasa3');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'biasa3',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar denah
        if ($request->hasFile('gambar_denah')) {
            // upload new image
            $gambarPath = $request->file('gambar_denah');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'denah',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // create layout
        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'Classroom',
            'kapasitas'    => $request->kap_class,
        ]);

        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'Teater',
            'kapasitas'    => $request->kap_teater,
        ]);

        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'Round Table',
            'kapasitas'    => $request->kap_roundtable,
        ]);

        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'U Shape',
            'kapasitas'    => $request->kap_ushape,
        ]);

        return redirect('/admin-training-center-list')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }
}
