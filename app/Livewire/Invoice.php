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
    public $showCustomer;
    public $customer;
    public $reference;

//Create Invoice
    public function CreateInvoice(){
        $invoice_id = rand(1000000, 9999999);
        ModelsInvoice::create([
            'invoice_id' => $invoice_id,
            'customer' => $this->customer,
            'reference' => $this->reference,
        ]);
        session()->flash('new_invoice', 'Invoice Created!');
        $this->reset('customer', 'reference');
        return back();
    }

//Choose Invoice to bill
    public function Invoice($id){
        $invoice = ModelsInvoice::find($id);
        $this->showInvoice = $invoice->invoice_id;
        if($invoice->customer != null){
            $this->showCustomer = $invoice->customer;
        }else{
            $this->showCustomer = 'No name!';
        }
    }


//Select product from dropdown
    public $selectedproduct;
    public $mountProductInfo;
    public $mountInventoryInfo;
    public function SelectProduct(){
        $this->mountProductInfo = Product::find($this->selectedproduct);
        $this->mountInventoryInfo = inventory::where('product_id', $this->selectedproduct)->get();
    }

//product colors
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

        $previewName = $this->showCustomer;

        $showColorsSizes = null;
        if($this->product_id != null){
            $showColorsSizes = inventory::where('product_id', $this->product_id)->get();
        }

        //Product Info
        $p_info = $this->mountProductInfo;
        $i_info = $this->mountInventoryInfo;

        return view('livewire.invoice', compact('preview', 'previewName', 'invoices', 'inventories', 'showColorsSizes', 'p_info', 'i_info'));
    }
}
