<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard() {

        $days = Bill::whereDay('created_at', date('d'))->get();
        $months = Bill::whereMonth('created_at', date('m'))->get();
        $years = Bill::whereYear('created_at', date('Y'))->get();

        $daily_sale = 0;
        foreach($days as $day){
            $daily_sale += $day->total_price;
        }
        $monthly_sale = 0;
        foreach($months as $month){
            $monthly_sale += $month->total_price;
        }
        $yearly_sale = 0;
        foreach($years as $year){
            $yearly_sale += $year->total_price;
        }

        return view('admin.dashboard', compact('daily_sale', 'monthly_sale', 'yearly_sale'));
    }
}
