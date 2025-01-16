<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('pelanggan.page.home', [
            'title'    => 'Home'
        ]);
    }
    public function hotel()
    {
        return view('pelanggan.page.hotel', [
            'title'    => 'Hotel'
        ]);
    }
    public function TC()
    {
        return view('pelanggan.page.TC', [
            'title'    => 'TC'
        ]);
    }
    
}