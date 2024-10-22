<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LiveWireRoutesController extends Controller
{
    public function tag_index(){
        return view('admin.tag.tags');
    }

    public function color_size(){
        return view('admin.color&size.color&size');
    }
    public function inventory(){
        return view('admin.inventory.inventory');
    }

    public function offline_sales(){
        return view('admin.sales.offline_sales');
    }
    public function online_sales(){
        return view('admin.sales.online_sales');
    }
    public function pdf(Request $request){

        $bills = Bill::where('invoice_id', $request->invoice)->where('status', 1)->get();
        $total = 0;
        foreach($bills as $bill){
            $total += $bill->total_price;
        }

        $pdf = Pdf::loadView('admin.PDF.pdf', [
            'bills' => $bills,
            'invoice' => $request->invoice,
            'total' => $total,
        ]);

        return $pdf->stream($request->invoice . '.pdf', array("Attachment" => false));

        // return view('admin.PDF.pdf', [
        //     'bills' => $bills,
        //     'invoice' => $request->invoice,
        //     'total' => $total,
        // ]);
    }
}
