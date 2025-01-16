<?php

namespace App\Http\Controllers;

use App\Mail\notifOrderMasuk;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Guest;
use App\Models\Order;
use App\Models\Train;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Models\LayoutModels;
use Illuminate\Http\Request;
use App\Models\TrainFacility;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Exception;

class GuestController extends Controller
{
    public function showchangepw()
    {
        return view('pelanggan.page.changepw', ['title' => 'change password']);
    }

    public function showhotel()
    {
        return view('pelanggan.page.hotel', ['title' => 'Hotel']);
    }

    public function showabout()
    {
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }
        
        // redirect to about page
        return view('pelanggan.page.about', [
            'title'         => 'About',
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showpackage()
    {
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // redirect to package page
        return view('pelanggan.page.package', [
            'title'         => 'package',
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showlogin()
    {
        return view('pelanggan.page.login', ['title' => 'Login']);
    }

    public function showregister()
    {
        return view('pelanggan.page.register', ['title' => 'Register']);
    }

    public function showforgotpw()
    {

        return view('pelanggan.page.forgotpw', ['title' => 'forgot password']);
    }

    public function showResetPW($token)
    {
        // Anda dapat menambahkan logika verifikasi tautan reset password di sini
        $title = 'Reset Password'; // Judul untuk halaman reset password
        return view('pelanggan.page.resetpassword', compact('token', 'title'));
    }

    public function forgetpassword(Request $request)
    {
        // Lakukan validasi terlebih dahulu
        $request->validate(['email' => 'required|email']);

        // Generate token baru
        $token = Str::random(64);

        // Cek apakah ada token lama untuk pengguna dengan email yang sama
        $existingToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        // Jika ada, perbarui token yang ada dengan token baru
        if ($existingToken) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            // Jika tidak ada, tambahkan token baru ke database
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }

        // Kirim email dengan token reset password
        Mail::send('pelanggan.auth.resetpassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        // Setelah email terkirim, redirect kembali ke halaman forgot password dengan pesan sukses
        return redirect('/forgot-password')->with('status', 'send email success');
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:1|confirmed', // tambahkan aturan 'confirmed' untuk memastikan password cocok dengan konfirmasi password
            'token' => 'required'
        ]);

        $updatePassword = Db::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        if (!$updatePassword || Carbon::parse($updatePassword->created_at)->addMinutes(3)->isPast()) {
            // Redirect kembali ke halaman reset password dengan pesan error
            return redirect("/forgot-password")->with('error', 'Token kadaluarsa, mohon kirim ulang email anda');
        }

        Db::table('guests')
            ->where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);


        Db::table('password_reset_tokens')
            ->where('email', $updatePassword->email)
            ->delete();

        // Umpan balik kepada pengguna
        return redirect('/login')->with('status', 'Password successfully reset!');
    }

    public function showhome()
    {
        // get now date
        $currentDate = Carbon::now()->addDay();

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // redirect to home page
        return view('pelanggan.page.home', [
            'title'         => 'Home',
            'currentDate'   => $currentDate,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showprofile()
    {
        // Ambil data pengguna dari database
        $guest = Guest::find(auth('guest')->id());

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // Tampilkan view untuk form edit profil dan teruskan data pengguna
        return view('pelanggan.page.profile', [
            'title' => 'Home',
            'guest' => $guest,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function updateprofile(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'negara' => 'required|string|max:255',
            'tanggallahir' => 'required|date|max:255',
        ]);
        
        // Temukan data pengguna berdasarkan ID yang diberikan
        $guest = Guest::find($id);
        
        if (!$guest) {
            return redirect('/profile')->with('error', 'Data pengguna tidak ditemukan');
        }
        
        // Simpan data yang diperbarui ke dalam database
        $guest->name = $request->input('name');
        $guest->nik = $request->input('nik');
        $guest->telp = $request->input('telp');
        $guest->alamat = $request->input('alamat');
        $guest->kota = $request->input('kota');
        $guest->provinsi = $request->input('provinsi');
        $guest->negara = $request->input('negara');
        $guest->tanggallahir = $request->input('tanggallahir');
        // Simpan kolom-kolom lainnya sesuai kebutuhan
        $guest->save();
        
        return redirect('/profile')->with('success', 'Data pengguna berhasil diperbarui');
    }

    public function changePassword(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:1|confirmed',
        ]);

        $guest = Guest::find(auth('guest')->id());

        // Verifikasi kata sandi saat ini
        if (!Hash::check($request->input('current_password'), $guest->password)) {
            return redirect('/change-password')->with('error', 'Kata Sandi Saat Ini Salah');
        }

        // Simpan kata sandi baru ke dalam database
        $guest->password = Hash::make($request->input('new_password'));
        $guest->save();

        return redirect('/profile')->with('success', 'Kata Sandi Berhasil Diubah');
    }

    public function showdetail_tc($id)
    {
        // inisiasi variabel train, fasilitas, layout_models dan tanggal hari ini
        $train = Train::findOrFail($id);
        $facilities = TrainFacility::all();
        $layout_models = LayoutModels::where('train_id', $id)->get();
        $currentDate = Carbon::now()->addDay();
        
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }
        
        return view('pelanggan.page.detail_tc', [
            'title' => 'Detail Training Center',
            'train' => $train,
            'facilities' => $facilities,
            'currentDate'  => $currentDate,
            'layout_models' => $layout_models,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showcart()
    {
        // inisiasi variabel $guest dan $currentDate
        $guest = Guest::find(auth('guest')->id());
        $currentDate = Carbon::now()->toDateString();
        
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }
        
        // hapus item yang tanggalnya <= hari ini
        CartItem::where('cart_id', $guest->id)
            ->where('checkin', '<=', $currentDate)
            ->delete();
        
        // tampilkan halaman cart dengan mengirim $guest dan $cartItemCount
        return view('pelanggan.page.cart', [
            'title'     => 'Keranjang',
            'guest'     => $guest,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function addToCart(Request $request)
    {
        // inisiasi variabel checkin, lamahari dan checkout sesuai $request
        $checkin = $request->checkin;
        $lamaHari = $request->lamaHari;
        $checkout = date('Y-m-d', strtotime($checkin . ' + ' . ($lamaHari - 1) . ' days'));
        
        // buat data baru di tabel cart_items
        CartItem::create([
            'cart_id'       => $request->cart_id,
            'train_id'      => $request->train_id,
            'layout'        => $request->layout,
            'checkin'       => $request->checkin,
            'checkout'      => $checkout,
            'lama'          => $request->lamaHari,
            'jam_mulai'     => $request->jam_mulai,
            'jam_selesai'   => $request->jam_selesai,
            'harga'         => $request->harga,
            'special'       => $request->special,
        ]);
        
        // munculkan notifikasi berhasil dan redirect ke halaman training center
        notify()->success('Berhasil menambahkan ke cart');
        return redirect('/training-center');
    }

    public function cartItemDelete($id)
    {
        // get cartItem
        $item = CartItem::findOrFail($id);

        // delete cartItem
        $item->delete();

        // show notification, then redirect to cart page
        notify()->error('Berhasil menghapus item.');
        return redirect('/cart');
    }

    public function showtrain()
    {
        $cart = Cart::find(auth('guest')->id());
        $facilities = TrainFacility::all();
        $currentDate = Carbon::now()->addDay();

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // get trains
        $query = Train::query();
        $dateIn = Carbon::tomorrow();
        $dateOut = Carbon::tomorrow();;

        // jika sudah login
        if (Auth::guard('guest')->check()) {
            // Get train_id yang ada di cart sendiri
            $roomInCart = CartItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('cart_id', '=', auth('guest')->id());
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->pluck('train_id')
                ->toArray();

            // Get train_id dari semua order
            $roomInOrderAll = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '!=', 'Rejected');
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '!=', 'Rejected');
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '!=', 'Rejected');
                })
                ->pluck('train_id')
                ->toArray();

            // masukkan semua train_id tadi ke $roomBooked (yang masuk di variable ini tidak akan ditampilkan saat di-search)
            $roomBooked = array_merge($roomInCart, $roomInOrderAll);

            // get train WHERE 'id' tidak ada dalam $roomBooked
            $query->whereNotIn('id', $roomBooked);
        }
        
        // jika belum login
        else {
            // Get train_id dari semua order yang sudah di ACC
            $roomInOrderAll = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '=', 'Accepted');
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->pluck('train_id')
                ->toArray();

            // masukkan semua train_id tadi ke $roomBooked (yang masuk di variable ini tidak akan ditampilkan saat di-search)
            $roomBooked = $roomInOrderAll;

            // get train WHERE 'id' tidak ada dalam $roomBooked
            $query->whereNotIn('id', $roomBooked);
        }

        $trains = $query->get();

        return view('pelanggan.page.train', [
            'title'        => 'Training Center',
            'trains'       => $trains,
            'facilities'   => $facilities,
            'currentDate'  => $currentDate,
            'cart'         => $cart,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function search(Request $request)
    {
        // get cart dan tanggal saat ini
        $cart = Cart::find(auth('guest')->id());
        $currentDate = Carbon::now()->addDay();
        
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }
        
        // inisiasi variabel yang digunakan untuk search
        $peserta = $request->peserta;
        $dateIn = $request->dateIn;
        $lama = $request->lama;
        $dateOut = date('Y-m-d', strtotime($dateIn . ' + ' . ($lama - 1) . ' days'));
        $query = Train::query();
        
        // jika peserta != null, maka get train yang kapasitasnya melebihi jumlah peserta
        if ($peserta !== null) {
            $queryLayout = LayoutModels::where('kapasitas', '>=', $peserta)->pluck('train_id')->unique()->toArray();
            $query->whereIn('id', $queryLayout);
        }
        
        // jika sudah login
        if (Auth::guard('guest')->check()) {
            // Get train_id yang ada di cart sendiri
            $roomInCart = CartItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('cart_id', '=', auth('guest')->id());
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->pluck('train_id')
                ->toArray();
            
            // Get train_id yang ada di order sendiri
            $roomInOrderSelf = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '!=', 'Rejected')
                    ->whereHas('order', function ($query) {
                        $query->where('guest_id', auth('guest')->id());
                    });
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '!=', 'Rejected')
                        ->whereHas('order', function ($query) {
                            $query->where('guest_id', auth('guest')->id());
                        });
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '!=', 'Rejected')
                        ->whereHas('order', function ($query) {
                            $query->where('guest_id', auth('guest')->id());
                        });
                })
                ->pluck('train_id')
                ->toArray();
            
            // Get train_id dari semua order yang sudah di ACC
            $roomInOrderAll = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '!=', 'Rejected');
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '!=', 'Rejected');
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '!=', 'Rejected');
                })
                ->pluck('train_id')
                ->toArray();
            
            // masukkan semua train_id tadi ke $roomBooked (yang masuk di variable ini tidak akan ditampilkan saat di-search)
            $roomBooked = array_merge($roomInCart, $roomInOrderSelf, $roomInOrderAll);
            
            // get train WHERE 'id' tidak ada dalam $roomBooked
            $query->whereNotIn('id', $roomBooked);
        }
        
        // get train sesuai id yang ada di $query
        $trains = $query->get();
        $facilities = TrainFacility::all();
        
        // redirect ke page yang sama, dengan data yang diperbarui
        return view('pelanggan.page.train', [
            'title'         => 'Training Center',
            'trains'        => $trains,
            'facilities'    => $facilities,
            'currentDate'   => $currentDate,
            'cart'          => $cart,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required|min:2|max:50|email',
            'password'  => 'required|min:8|max:20',
            'name'      => 'required|min:2|max:30',
            'nik'       => 'required|numeric',
            'telp'      => 'required|numeric',
            'alamat'    => 'required|min:2|max:100',
            'kota'      => 'required|min:2|max:20',
            'provinsi'  => 'required|min:2|max:30',
            'negara'    => 'required|min:2|max:30',
            'tanggallahir' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        DB::beginTransaction();
        // try create data guest baru + cart
        try {
            $guest = Guest::create([
                'username'  => $request->username,
                'email'     => $request->username,
                'password'  => bcrypt($request->password),
                'name'      => $request->name,
                'nik'       => $request->nik,
                'telp'      => $request->telp,
                'alamat'    => $request->alamat,
                'kota'      => $request->kota,
                'provinsi'  => $request->provinsi,
                'negara'    => $request->negara,
                'tanggallahir' => $request->tanggallahir,
            ]);

            // create cart for this user
            Cart::create([
                'guest_id' => $guest->id,
            ]);
        }
        catch (Exception $e) {
            notify()->error('Email sudah terdaftar.');
            return redirect()->back()->withInput();
            DB::rollBack();
        }

        // try kirim email verifikasi
        try { 
            event(new Registered($guest));
        }
        catch (Exception $e) {
            notify()->error('gagal mengirim email verifikasi.');
            return redirect()->back()->withInput();
            DB::rollBack();
        }

        // redirect ke halaman verifikasi email
        DB::commit();
        return redirect('/email/verify');
    }

    public function registerVerified($id, Request $request)
    {
        // update is_verified to true
        $guest = Guest::where('id', $id)->first();
        $guest->is_activated = 1;
        $guest->save();
        
        // login
        Auth::guard('guest')->login($guest);
        $request->session()->regenerate();
        $request->session()->put('guest', $guest);
        return redirect('/');
    }

    public function login(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        // cek data guest di database
        $guest = Guest::where('username', $credentials['username'])->first();

        // jika email belum terdaftar
        if (!$guest) {
            notify()->error('Email belum terdaftar.');
            return redirect()->back()->withErrors(['username' => 'Email belum terdaftar']);
        }

        // jika email terdaftar, tapi belum aktivasi
        if ($guest->is_activated === 0) {
            return redirect('/email/verify');
        }

        // jika email terdaftar, dan sudah aktivasi
        if (Auth::guard('guest')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('guest', $guest);
            notify()->success('Anda telah berhasil login!');
            return redirect()->intended('/');
        }

        // notifikasi untuk password salah
        notify()->error('Password salah');

        // tampilkan error password salah
        return redirect()->back()->withErrors(['password' => 'Password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        // logout
        Auth::guard('guest')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // redirect to home page
        return redirect('/');
    }

    public function showorder()
    {
        // get order WHERE 'guest_id' = guest sekarang
        $orders = Order::where('guest_id', auth('guest')->id())->orderByDesc('created_at')->get();
        $orderExpireds = Order::where('guest_id', auth('guest')->id())
        ->whereNull('surat')
        ->whereNull('bukti_pembayaran')
        ->where('created_at', '<', Carbon::now()->subHour())
        ->get();
        // update order yang kadaluarsa jadi is_expired=1 AND status='Rejected'
        foreach ($orderExpireds as $orderExpired) {
            $orderExpired->update(['is_expired' => 1]);
            foreach ($orderExpired->items as $item) {
                $item->update(['status' => 'Rejected']);
            }
        }
        
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }
        
        // is not from order
        session()->put('afterOrder', false);
        
        return view('pelanggan.page.order', [
            'title' => 'Order',
            'orders' => $orders,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function deleteorder($id)
    {
        // delete order
        Order::findOrFail($id)->delete();

        // delete order items
        OrderItem::where('order_id', $id)->delete();
    }

    public function showcheckout()
    {
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }
        
        // Ambil semua data dari tabel cart_items
        $cartItems = CartItem::all();
        $fromCart = True;
        
        // Variabel untuk menyimpan total harga
        $totalPrice = 0;
        
        // Iterasi melalui setiap item dan tambahkan harganya ke dalam total
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->harga;
        }
        
        // Tampilkan view checkout
        $cart = Cart::find(auth('guest')->id());
        return view('pelanggan.page.checkout', [
            'title' => 'Checkout',
            'cart' => $cart,
            'fromCart' => $fromCart,
            'totalHarga' => $totalPrice,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function checkoutKomplimen(Request $request, $cart_id)
    {
        $cart = Cart::find($cart_id);
        
        // store surat komplimen
        $surat = $request->file('surat');
        $namaSurat = time() . '.' . $surat->getClientOriginalExtension();
        $surat->storeAs('public/posts/surat', $namaSurat);
        
        // create order
        $order = Order::create([
            'guest_id'      => $cart->guest->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'surat'         => $namaSurat,
        ]);
        
        // create order item
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id'      => $order->id,
                'train_id'      => $item->train_id,
                'layout'        => $item->layout,
                'checkin'       => $item->checkin,
                'checkout'      => $item->checkout,
                'lama'          => $item->lama,
                'jam_mulai'     => $item->jam_mulai,
                'jam_selesai'   => $item->jam_selesai,
                'harga'         => $item->harga,
                'special'       => $item->special,
                'status'        => 'Pending',
            ]);
        }
        
        // Kirim email
        Mail::to("pusbis@uinsby.ac.id")->send(new notifOrderMasuk());
        Mail::to("noehie0108@gmail.com")->send(new notifOrderMasuk());
        Mail::to("catatanbelajarlala@gmail.com")->send(new notifOrderMasuk());
        
        // delete cart dari user tersebut
        CartItem::where('cart_id', $cart_id)->delete();
        
        // open order page
            // get order WHERE 'guest_id' = guest sekarang
            $orders = Order::where('guest_id', auth('guest')->id())->orderByDesc('created_at')->get();
            // get jumlah item dalam cart
            $cartItemCount = null;
            if (auth('guest')->check()) {
                $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
                $cartItemCount = $cartCount->items->count();
            }
            
            // is not from order
            session()->put('afterOrder', true);
            
            return view('pelanggan.page.order', [
                'title' => 'Order',
                'orders' => $orders,
                'cartItemCount' => $cartItemCount,
            ]);
    }

    public function checkoutReguler(Request $request, $cart_id)
    {
        $cart = Cart::find($cart_id);
        
        // create order
        $order = Order::create([
            'guest_id'      => $cart->guest->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
        
        // create order item
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id'      => $order->id,
                'train_id'      => $item->train_id,
                'layout'        => $item->layout,
                'checkin'       => $item->checkin,
                'checkout'      => $item->checkout,
                'lama'          => $item->lama,
                'jam_mulai'     => $item->jam_mulai,
                'jam_selesai'   => $item->jam_selesai,
                'harga'         => $item->harga,
                'special'       => $item->special,
                'status'        => 'Pending',
            ]);
        }
        // Kirim email
        Mail::to("muhammadramzy65@gmail.com")->send(new notifOrderMasuk());
        
        // delete item yang ada di cart
        CartItem::where('cart_id', $cart_id)->delete();
        
        // Redirect to showPayment route with order ID parameter
        return redirect('/payment/' . $order->id)->withErrors(['successAddToCart' => 'Order berhasil']);
    }

    public function reservasiLangsung(Request $request)
    {
        // inisiasi variabel yang dibutuhkan
        $fromCart = False;
        $train = Train::find($request->train_id);
        $checkin = $request->checkin;
        $lamaHari = $request->lamaHari;
        $checkout = date('Y-m-d', strtotime($checkin . ' + ' . ($lamaHari - 1) . ' days'));
        
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }
        
        // create $item yang berisi detail order untuk dikirim ke page checkout
        $item = [
            'guest_id'      => auth('guest')->id(),
            'train_id'      => $request->train_id,
            'layout'        => $request->layout,
            'checkin'       => $request->checkin,
            'checkout'      => $checkout,
            'lama'          => $request->lamaHari,
            'jam_mulai'     => $request->jam_mulai,
            'jam_selesai'     => $request->jam_selesai,
            'harga'         => $request->harga,
            'special'       => $request->special,
        ];
        
        // tampilkan halaman checkout dengan mengirim variabel berikut
        return view('pelanggan.page.checkout', [
            'title'     => 'Checkout',
            'item'      => $item,
            'train'     => $train,
            'fromCart'  => $fromCart,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function checkoutKomplimenLangsung(Request $request)
    {
        // get $request->item
        $item = json_decode($request->input('item'), true);

        // store surat komplimen
        $surat = $request->file('surat');
        $namaSurat = time() . '.' . $surat->getClientOriginalExtension();
        $surat->storeAs('public/posts/surat', $namaSurat);

        // create order
        $order = Order::create([
            'guest_id'       => $item['guest_id'],
            'nama_kegiatan'  => $request->nama_kegiatan,
            'surat'          => $namaSurat,
        ]);

        // create order item
        OrderItem::create([
            'order_id'      => $order->id,
            'train_id'      => $item['train_id'],
            'layout'        => $item['layout'],
            'checkin'       => $item['checkin'],
            'checkout'      => $item['checkout'],
            'lama'          => $item['lama'],
            'harga'         => $item['harga'],
            'jam_mulai'     => $item['jam_mulai'],
            'jam_selesai'   => $item['jam_selesai'],
            'special'       => $item['special'],
            'status'        => 'Pending',
        ]);

        // Kirim email
        Mail::to("muhammadramzy65@gmail.com")->send(new notifOrderMasuk());

        // open order page
            // get order WHERE 'guest_id' = guest sekarang
            $orders = Order::where('guest_id', auth('guest')->id())->orderByDesc('created_at')->get();

            // get jumlah item dalam cart
            $cartItemCount = null;
            if (auth('guest')->check()) {
                $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
                $cartItemCount = $cartCount->items->count();
            }
        
            // is not from order
            session()->put('afterOrder', true);
    
            return view('pelanggan.page.order', [
                'title' => 'Order',
                'orders' => $orders,
                'cartItemCount' => $cartItemCount,
            ]);
    }

    public function checkoutRegulerLangsung(Request $request)
    {
        // get $request->item
        $item = json_decode($request->input('item'), true);

        // create new order
        $order = Order::create([
            'guest_id'      => $item['guest_id'],
            'nama_kegiatan' => $request->nama_kegiatan,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        // create new orderItem
        OrderItem::create([
            'order_id'      => $order->id,
            'train_id'      => $item['train_id'],
            'layout'        => $item['layout'],
            'checkin'       => $item['checkin'],
            'checkout'      => $item['checkout'],
            'lama'          => $item['lama'],
            'harga'         => $item['harga'],
            'jam_mulai'     => $item['jam_mulai'],
            'jam_selesai'   => $item['jam_selesai'],
            'nama_kegiatan' => $request->nama_kegiatan,
            'special'       => $item['special'],
            'status'        => 'Pending',
        ]);

        // Kirim email
        Mail::to("muhammadramzy65@gmail.com")->send(new notifOrderMasuk());

        return redirect('/payment/' . $order->id)->withErrors(['successAddToCart' => 'Order berhasil']);
    }

    public function invoiceShow($orderId)
    {
        // get order, namaKegiatan, dan totalHarga
        $order = Order::where('id', $orderId)->first();
        $namaKegiatan = Order::where('id', $orderId)->value('nama_kegiatan');
        $totalHarga = OrderItem::where('order_id', $orderId)
            ->where('status', 'Accepted')
            ->sum('harga');

        return view('pelanggan.layout.invoice', [
            'order' => $order,
            'namaKegiatan' => $namaKegiatan,
            'totalHarga' => $totalHarga,
        ]);
    }

    public function invoiceDownload($orderId)
    {
        // get $order dan $namaKegiatan
        $order = Order::where('id', $orderId)->first();
        $namaKegiatan = Order::where('id', $orderId)->value('nama_kegiatan');
        
        // download pdf ke direktori lokal
        $pdf = PDF::loadView('pelanggan.layout.invoice', compact('order'));
        $pdf->setPaper('A4', 'landscape');
    }

    public function showPayment($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        $namaKegiatan = Order::where('id', $orderId)->value('nama_kegiatan');
        $totalHarga = OrderItem::where('order_id', $orderId)
                      ->sum('harga');

        // cek status semua pesanan
        $pending    = $order->items->every(function ($row) {return $row->status === 'Pending';});
        $accepted   = $order->items->every(function ($row) {return $row->status === 'Accepted';});
        $rejected   = $order->items->every(function ($row) {return $row->status === 'Rejected';});
        $sudah_bayar = false;

        // ubah variable $status
        if ($pending)  {$status = 'Pending';}
        if ($accepted) {$status = 'Accepted';}
        if ($rejected) {$status = 'Rejected';}

        // jika $order->bukti_pembayaran tidak null, berarti sudah bayar
        if ($order->bukti_pembayaran !== null) {$sudah_bayar = true;}

        return view('pelanggan.page.payment', [
            'title'         => 'Payment',
            'order'         => $order,
            'status'        => $status,
            'namaKegiatan'  => $namaKegiatan,
            'totalHarga'    => $totalHarga,
            'sudah_bayar'   => $sudah_bayar,
        ]);
    }

    public function showPaymentFailed($orderId)
    {
        // get order, then update 'is_expired' to 1
        $order = Order::where('id', $orderId)->first();
        $order->update(['is_expired' => 1]);
        foreach ($order->items as $item) {
            $item->update(['status' => 'Rejected']);
            $item->save();
        }
        

        // cek status semua pesanan
        $namaKegiatan = null;
        $totalHarga = null;
        $sudah_bayar = null;
        $status = null;

        return view('pelanggan.page.payment', [
            'title'         => 'payment',
            'order'         => $order,
            'status'        => $status,
            'namaKegiatan'  => $namaKegiatan,
            'totalHarga'    => $totalHarga,
            'sudah_bayar'   => $sudah_bayar,
        ]);
    }

    public function kirimPayment(Request $request)
    {
        // get order
        $order = Order::findOrFail($request->id);;
        
        // upload bukti pembayaran
        $gambarPath = $request->file('bukti_pembayaran');
        $gambarPath->storeAs('public/posts/bukti', $gambarPath->hashName());
        
        // update database
        $order->update(['bukti_pembayaran' => $gambarPath->hashName()]);
        
        // redirect
        return redirect()->back();
    }
}
