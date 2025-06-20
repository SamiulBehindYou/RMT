<?php

namespace App\Livewire;

use App\Models\Color;
use App\Models\Inventory as ModelsInventory;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Revenue;
use App\Models\Size;
use Carbon\Carbon;
use Livewire\Component;

class Inventory extends Component
{
    public $product_name;
    public $product_id;
    public $color_id;
    public $size_id;
    public $quantity;

    public function addQuantity(){


        if($this->product_name != null){
            $this->validate([
                'product_name' => 'required',
                'quantity' => 'required',
            ]);
            $this->product_id = $this->product_name;
        }
        else{
            $this->validate([
                'product_id' => 'required',
                'quantity' => 'required',
            ]);
        }

        $product = ModelsInventory::where('product_id', $this->product_id)->where('color_id', $this->color_id)->where('size_id', $this->size_id);

        if($product->exists()){
            $product->increment('quantity', $this->quantity);
        }else{
            ModelsInventory::insert([
                'product_id' => $this->product_id,
                'color_id' => $this->color_id,
                'size_id' => $this->size_id,
                'quantity' => $this->quantity,
            ]);
        }

        Purchase::insert([
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'purchase' => Product::find($this->product_id)->purchase,
            'created_at' => Carbon::now(),
        ]);

        session()->flash('quantity_add', "New Quantity added!");
        return back();
    }

    public function DeleteEntry($id){
        ModelsInventory::find($id)->delete();
        session()->flash('delete_entry', 'Entry Deleted!');
        return back();
    }

    public function render()
    {
        $this->reset();

        $inventories = ModelsInventory::all();
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('livewire.inventory', [
            'inventories' => $inventories,
            'products' => $products,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
}
