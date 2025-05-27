<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\Inventory;
use App\Models\Invoice;
use Livewire\Component;

class InvoiceTrash extends Component
{

    public function restoreInvoice($id){
        $invoice = Invoice::onlyTrashed()->find($id);
        $invoice_id = $invoice->invoice_id;
        $invoice->restore();

        session()->flash('restore', $invoice_id.' invoice restored!');
        return back();
    }


    public function deleteInvoice($id){
        $invoice = Invoice::onlyTrashed()->find($id);
        $bills = Bill::where('invoice_id', $invoice->invoice_id)->get();
        $invoice_id = $invoice->invoice_id;

        foreach($bills as $bill){
            if($bill->status == 1){
                Inventory::where('product_id', $bill->product_id)->where('color_id', $bill->color_id)->where('size_id', $bill->size_id)->increment('quantity', $bill->quantity);
                $bill->delete();
            }else{
                $bill->delete();
            }
        }

        Invoice::onlyTrashed()->find($id)->forceDelete();
        session()->flash('trash_invoice_delete', $invoice_id.' invoice parmanatly deleted!');
        return back();
    }

    public function render()
    {
        $invoices = Invoice::onlyTrashed()->orderBy('id', 'DESC')->get();
        return view('livewire.invoice-trash', compact('invoices'));
    }
}
