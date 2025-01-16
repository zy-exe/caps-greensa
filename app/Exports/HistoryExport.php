<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class HistoryExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return User::query();
    }
}

// use App\Models\OrderItem;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;

// class HistoryExport implements FromCollection, WithHeadings
// {
//     public function collection()
//     {
//         return OrderItem::with('order')->get()->map(function ($item) {
//             return [
//                 'Customer Name' => $item->order_id,
//                 'Room'          => $item->train->nama,
//                 'Check In'      => $item->checkin,
//                 'Check Out'     => $item->checkout,
//                 'Price'         => 'Rp ' . number_format($item->harga, 0, ',', '.'),
//                 'Activity'      => $item->nama_kegiatan,
//                 'Status'        => $item->status,
//             ];
//         });
//     }

//     public function headings(): array
//     {
//         return [
//             'Customer Name',
//             'Room',
//             'Check In',
//             'Check Out',
//             'Price',
//             'Activity',
//             'Status',
//         ];
//     }
// }

