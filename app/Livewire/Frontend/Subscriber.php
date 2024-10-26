<?php

namespace App\Livewire\Frontend;

use App\Models\Subscriber as ModelsSubscriber;
use Livewire\Component;

class Subscriber extends Component
{
    public $name;
    public $email;
    public function add(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:subscribers',
        ],[
            'email.unique' => 'This email already subscribed!'
        ]);

        ModelsSubscriber::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        session()->flash('subscribed', 'Email successfully subscribed!');
        return back();
    }
    public function render()
    {
        return view('livewire.frontend.subscriber');
    }
}
