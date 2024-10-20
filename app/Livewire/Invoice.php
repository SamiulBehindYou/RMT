<?php

namespace App\Livewire;

use App\Models\Bill;
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

// Add Bill
    public $color_id;
    public $size_id;
    public $price;
    public $quantity;
    public $discount;
    public $total_price;
    public function AddBill(){
        Bill::insert([
            'invoice_id' => $this->showInvoice,
            'product_id' => $this->selectedproduct,
            'color_id' => $this->color_id,
            'size_id' => $this->size_id,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'discount' => $this->discount,
            'total_price' => $this->total_price,
        ]);

        $this->mountProductInfo = null;
        $this->reset('selectedproduct', 'color_id', 'size_id', 'price', 'quantity', 'discount', 'total_price');
        return back();
    }


    public function DeleteItem($id){
        $bill = Bill::find($id);

        if($bill->status == 1){
            inventory::where('product_id', $bill->product_id)->where('color_id', $bill->color_id)->where('size_id', $bill->size_id)->increment('quantity', $bill->quantity);
            $bill->delete();
        }else{
            $bill->delete();
        }
        session()->flash('checkout', 'Item Deleted!');
        return back();
    }

    public function CheckOut($invoice_id){
        $bills = Bill::where('invoice_id', $invoice_id)->get();
        foreach($bills as $bill){
            if($bill->status == 0){
                inventory::where('product_id', $bill->product_id)->where('color_id', $bill->color_id)->where('size_id', $bill->size_id)->decrement('quantity', $bill->quantity);
                $bill->status = 1;
                $bill->save();
            }
        }
        session()->flash('checkout', 'Bill checked out successfully, Print invoice!');
        return back();
    }


    public function render()
    {

        $invoices = ModelsInvoice::orderBy('id', 'DESC')->SimplePaginate(10);
        // $products = Product::all();
        $inventories = inventory::groupBy(['product_id'])->selectRaw('sum(quantity) as quantity, product_id')->whereNot('quantity', 0)->get();

        $preview = $this->showInvoice;

        $previewName = $this->showCustomer;

        //Product Info
        $i_info = $this->mountInventoryInfo;

        if($this->mountProductInfo != null){
            $this->price = $this->mountProductInfo->price;
            $this->quantity = 1;
            $this->discount = $this->mountProductInfo->discount;
            $this->total_price = $this->mountProductInfo->after_discount;
        }

        // Bils show
        $bills = Bill::where('invoice_id', $this->showInvoice)->get();

        return view('livewire.invoice', compact('preview', 'previewName', 'invoices', 'inventories', 'i_info', 'bills'));
    }
}
