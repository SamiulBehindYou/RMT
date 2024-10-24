<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class ViewInvoice extends Component
{
    public function delete_invoice($id){
        $invoice = Invoice::find($id);
        $invoice_id = $invoice->invoice_id;
        $invoice->delete();
        session()->flash('invoice_delete', $invoice_id.' invoice move to trash!');
        return back();
    }

    public function render()
    {
        $invoices = Invoice::all();
        return view('livewire.view-invoice', compact('invoices'));
    }
}
