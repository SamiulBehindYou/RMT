<?php

namespace App\Livewire;

use App\Models\color;
use App\Models\size;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ColorSize extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $color_name = '';

    public function saveColor(){
        $this->validate([
            'color_name' => 'required|unique:colors',
        ]);
        color::insert([
            'color_name' => $this->color_name,
            'created_at' => Carbon::now(),
        ]);
        session()->flash('color_added', 'Color added!');
        $this->reset();
        return back();
    }

    public function deleteColor($id){
        color::findOrFail($id)->delete();
        session()->flash('color_deleted', 'Color deleted!');
        return back();
    }

    public $size = '';

    public function saveSize(){
        $this->validate([
            'size' => 'required|unique:sizes',
        ]);
        size::insert([
            'size' => $this->size,
            'created_at' => Carbon::now(),
        ]);
        session()->flash('size_added', 'Size added!');
        $this->reset();
        return back();
    }

    public function deleteSize($id){
        size::findOrFail($id)->delete();
        session()->flash('size_deleted', 'Size deleted!');
        return back();
    }



    public function render()
    {;

        return view('livewire.color-size', [
            'colors' => color::orderBy('id', 'DESC')->paginate(5,['*'], 'colorsPage'),
            'sizes' => size::orderBy('id', 'DESC')->paginate(5,['*'], 'sizesPage'),
        ]);
    }
}