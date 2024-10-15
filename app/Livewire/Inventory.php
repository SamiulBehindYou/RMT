<?php

namespace App\Livewire;

use App\Models\inventory as ModelsInventory;
use Livewire\Component;

class Inventory extends Component
{
    public function render()
    {
        $inventories = ModelsInventory::all();
        return view('livewire.inventory', [
            'inventories' => $inventories,
        ]);
    }
}
