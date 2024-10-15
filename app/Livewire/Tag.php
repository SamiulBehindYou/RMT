<?php

namespace App\Livewire;

use App\Models\Tag as ModelsTag;
use Carbon\Carbon;
use Livewire\Component;

class Tag extends Component
{
    public $name;
    public function saveTag(){
        $this->validate([
            'name' => 'required|regex:/^\S*$/u|regex:/^[a-zA-Z]+$/u|max:15|unique:tags',
        ]);

        ModelsTag::insert([
            'name' => $this->name,
            'created_at' =>Carbon::now(),
        ]);

        session()->flash('tag_add', 'Tag added!');
        $this->reset();
        return back();
    }

    public function deleteTag($id){
        ModelsTag::findOrFail($id)->delete();
        session()->flash('tag_delete', 'Tag Deleted!');
        return back();
    }

    public function render()
    {
        $tags = ModelsTag::orderBy('id', 'DESC')->get();
        return view('livewire.tag', compact('tags'));
    }
}
