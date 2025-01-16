<?php

namespace App\Charts;

use App\Models\OrderItem;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y'); // Tahun yang diinginkan

        $totalOrders = [];

        // Perulangan dari bulan 1 hingga 12
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // Hitung total pesanan berdasarkan tahun, bulan, dan status "Accepted"
            $totalOrders[$bulan] = OrderItem::whereYear('checkin', $tahun)
                ->whereMonth('checkin', $bulan)
                ->where('status', 'Accepted')
                ->count();
        }

        // Buat array untuk label bulan
        $monthLabels = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthLabels[] = date('M', mktime(0, 0, 0, $i, 1));
        }

        // Buat chart
        return $this->chart->lineChart()
            ->setTitle('Total Order')
            ->setSubtitle('Total Order untuk Tahun ' . $tahun)
            ->addData('Total Order', array_values($totalOrders))
            ->setHeight(280)
            ->setXAxis($monthLabels); // X-axis berisi label bulan dari Januari hingga Desember
    }

    // for ($i = 11; $i >= 0; $i--) {
    //     // Mendapatkan bulan dan tahun untuk bulan saat ini ditambah $i bulan
    //     $bulanIni = \Carbon\Carbon::now()->subMonths($i);
    //     $tahun = $bulanIni->year;
    //     $bulan = $bulanIni->month;

    //     // Menghitung total pesanan dengan status "Accepted" untuk bulan ini
    //     $totalOrders = OrderItem::whereYear('checkin', $tahun)
    //                              ->whereMonth('checkin', $bulan)
    //                              ->where('status', 'Accepted')
    //                              ->count();

    //     // Menyimpan total pesanan ke dalam array dengan kunci bulan
    //     $totalOrdersPerMonth[] = $totalOrders;

    //     // Menambahkan label bulan ke dalam array label bulan
    //     $monthLabels[] = $bulanIni->format('F'); // Menggunakan Carbon untuk mendapatkan nama bulan
    // 
}
