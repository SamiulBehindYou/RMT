<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function contact(){
        return view('frontend.contact.contact');
    }

    public function store_message(Request $request){
        $request->validate([
            'name' => 'required',
            'number' => 'required|numeric|max_digits:11|min_digits:11',
            'email' => 'required|email',
            'message' => 'required|max:300',
        ]);

        Message::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->withSuccess('Message sent successfully!');
    }


    // Admin's Route

    public function view_message(){
        $messages = Message::orderBy('id', 'DESC')->get();
        return view('admin.message.message_list', compact('messages'));
    }

    public function single_message($id){
        $message = Message::findOrFail($id);
        if($message->status == 0){
            $message->status = 1;
            $message->save();
        }
        return view('admin.message.single_message', compact('message'));
    }

    public function delete_all(){
        Message::truncate();
        return back()->withSuccess('All messages deleted successfully!');
    }
}
