<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\Inventory;
use App\Models\Invoice as ModelsInvoice;
use App\Models\Product;
use Carbon\Carbon;
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
            'updated_at' => null,
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
        $this->mountInventoryInfo = Inventory::where('product_id', $this->selectedproduct)->get();
    }

// Add Bill
    public $color_size_id;
    public $price;
    public $quantity;
    public $discount;
    public $total_price;
    public function AddBill(){
        $this->validate([
            'selectedproduct' => 'required',
            'color_size_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
            'total_price' => 'required',
        ]);
        // Discount checkup
        if($this->discount != null){
            $after_discount = ((100 - $this->discount) / 100) * $this->price;
            if($this->mountProductInfo->purchase < $after_discount){
                $inquiry = Inventory::find($this->color_size_id);
                if($inquiry->quantity < $this->quantity){
                    session()->flash('q_error', 'Over Quantity or not available!');
                    return back();
                }else{
                    Bill::insert([
                        'invoice_id' => $this->showInvoice,
                        'product_id' => $this->selectedproduct,
                        'color_id' => $inquiry->color_id,
                        'size_id' => $inquiry->size_id,
                        'price' => $this->price,
                        'quantity' => $this->quantity,
                        'discount' => $this->discount,
                        'total_price' => $this->total_price,
                        'created_at' => Carbon::now(),
                    ]);

                    $this->mountProductInfo = null;
                    $this->reset('selectedproduct', 'color_size_id', 'price', 'quantity', 'discount', 'total_price');
                    return back();
                }
            }
            else{
                session()->flash('discount_error', 'This ammount of discount not possible!');
                return back();
            }
        }
        else{
            session()->flash('discount_error', 'Discount field can not be blank!');
            return back();
        }
    }


    public function DeleteItem($id){
        $bill = Bill::find($id);

        if($bill->status == 1){
            Inventory::where('product_id', $bill->product_id)->where('color_id', $bill->color_id)->where('size_id', $bill->size_id)->increment('quantity', $bill->quantity);
            $bill->delete();
        }else{
            $bill->delete();
        }
        session()->flash('checkout', 'Item Deleted!');
        return back();
    }

    public function dropInvoice($id){
        ModelsInvoice::where('invoice_id', $id)->delete();
        $this->showInvoice = null;
        session()->flash('dropinvoice', 'Invoice move to trash!');
        return back();
    }

    public function CheckOut($invoice_id){
        $bills = Bill::where('invoice_id', $invoice_id)->get();
        foreach($bills as $bill){
            if($bill->status == 0){
                Inventory::where('product_id', $bill->product_id)->where('color_id', $bill->color_id)->where('size_id', $bill->size_id)->decrement('quantity', $bill->quantity);
                $bill->status = 1;
                $bill->save();
            }
        }
        ModelsInvoice::where('invoice_id', $invoice_id)->update([
            'status' => 1,
        ]);

        session()->flash('checkout', 'Bill checked out successfully, Print invoice!');
        return back();
    }


    public function render()
    {

        $invoices = ModelsInvoice::orderBy('id', 'DESC')->SimplePaginate(10);

        $inventories = Inventory::groupBy(['product_id'])->selectRaw('sum(quantity) as quantity, product_id')->whereNot('quantity', 0)->get();

        $current_invoice = $this->showInvoice;

        $invoice_status = 0;
        if($current_invoice != null){
            $inv = ModelsInvoice::where('invoice_id', $current_invoice)->first();
            $invoice_status = $inv->status;
        }

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

        // Bill total

        $total = [
            'price' => 0,
            'quantity' => 0,
            'discount' => 0,
            'total_price' => 0,
        ];
        foreach($bills as $bill){
            $total['price'] += $bill->price;
            $total['quantity'] += $bill->quantity;
            $total['discount'] += $bill->discount;
            $total['total_price'] += $bill->total_price;
        }


        return view('livewire.invoice', compact('current_invoice', 'previewName', 'invoices', 'invoice_status', 'inventories', 'i_info', 'bills', 'total'));
    }
}
