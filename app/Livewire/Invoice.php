<?php

namespace App\Livewire;

use App\Models\inventory;
use App\Models\Invoice as ModelsInvoice;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Invoice extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $showInvoice;

    public function CreateInvoice(){
        $invoice_id = rand(1000000, 9999999);
        ModelsInvoice::create([
            'invoice_id' => $invoice_id,
        ]);
        session()->flash('new_invoice', 'Invoice Created!');
        return back();
    }
    public function Invoice($id){
        $this->showInvoice = $id;
    }

    public $product_id;
    public function Color($product_id){
        echo 'pp';
        die();
        $this->product_id = $product_id;
    }

    public function render()
    {
        $invoices = ModelsInvoice::orderBy('id', 'DESC')->SimplePaginate(10);
        // $products = Product::all();
        $inventories = inventory::groupBy(['product_id'])->selectRaw('sum(quantity) as quantity, product_id')->whereNot('quantity', 0)->get();

        $preview = $this->showInvoice;

        $showColorsSizes = null;
        if($this->product_id != null){
            $showColorsSizes = inventory::where('product_id', $this->product_id)->get();
        }

        return view('livewire.invoice', compact('preview', 'invoices', 'inventories', 'showColorsSizes'));
    }
}
