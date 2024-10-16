<?php

namespace App\Livewire;

use App\Models\color;
use App\Models\inventory as ModelsInventory;
use App\Models\Product;
use App\Models\size;
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

        if(ModelsInventory::where('product_id', $this->product_id)->exists()){
            //
        }else{
            ModelsInventory::insert([
                'product_id' => $this->product_id,
                'color_id' => $this->color_id,
                'size_id' => $this->size_id,
                'quantity' => $this->quantity,
            ]);
        }
    }

    public function render()
    {
        $inventories = ModelsInventory::all();
        $products = Product::all();
        $colors = color::all();
        $sizes = size::all();
        return view('livewire.inventory', [
            'inventories' => $inventories,
            'products' => $products,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
}
