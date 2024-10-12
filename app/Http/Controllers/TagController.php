<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->get();
        return view('admin.tag.tags', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^\S*$/u|regex:/^[a-zA-Z]+$/u|max:15|unique:tags',
        ]);

        Tag::insert([
            'name' => $request->name,
            'created_at' =>Carbon::now(),
        ]);
        return back()->withSuccess('Tag added Successfully!');
    }

}
