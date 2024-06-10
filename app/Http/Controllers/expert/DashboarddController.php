<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboarddController extends Controller
{
    public function index(){
        return view('expert.dashboard');
    }
}
