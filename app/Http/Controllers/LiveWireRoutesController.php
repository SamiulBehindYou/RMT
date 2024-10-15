<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveWireRoutesController extends Controller
{
    public function tag_index(){
        return view('admin.tag.tags');
    }

    public function color_size(){
        return view('admin.color&size.color&size');
    }
    public function inventory(){
        return view('admin.inventory.inventory');
    }
}
