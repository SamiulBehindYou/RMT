<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard() {
        // Sales report
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

        // Purchase Report
        $purchase_per_days = Purchase::whereDay('created_at', date('d'))->get();
        $purchase_per_months = Purchase::whereMonth('created_at', date('m'))->get();
        $purchase_per_years = Purchase::whereYear('created_at', date('Y'))->get();

        $daily_purchase = 0;
        foreach($purchase_per_days as $day){
            $daily_purchase += ($day->purchase * $day->quantity);
        }
        $monthly_purchase = 0;
        foreach($purchase_per_months as $month){
            $monthly_purchase += ($month->purchase * $month->quantity);
        }
        $yearly_purchase = 0;
        foreach($purchase_per_years as $year){
            $yearly_purchase += ($year->purchase * $year->quantity);
        }


        return view('admin.dashboard', compact(
            'daily_sale',
            'monthly_sale',
            'yearly_sale',
            'daily_purchase',
            'monthly_purchase',
            'yearly_purchase',
        ));
    }
}
