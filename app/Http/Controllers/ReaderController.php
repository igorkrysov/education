<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reader;
use Auth;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $readers = Reader::all();

        return view('admin.reader.index', [ 'readers' => $readers]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userIndex()
    {
        //
        $readers = Reader::all();

        return view('user.reader.index', [ 'readers' => $readers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.reader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:10000',
            'questions' => 'nullable|string|max:10000',
        ]);

        Reader::create(['title' => $request->title, 'text' => $request->text, 'questions' => $request->questions, 'user_id' => Auth::User()->id]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $reader = Reader::find($id);

        return view('admin.reader.show', ['reader' => $reader]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hand($id)
    {
        //
        $reader = Reader::find($id);

        return view('user.reader.hand', ['reader' => $reader]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reader = Reader::find($id);

        return view('admin.reader.edit', ['reader' => $reader]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([           
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:10000',
            'questions' => 'nullable|string|max:10000',
        ]);

        $reader = Reader::find($id);
        $reader->title = $request->title;
        $reader->text = $request->text;
        $reader->questions = $request->questions;        
        $reader->save();

        return redirect()->route('reader.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Reader::destroy($id);

        return redirect()->back();
    }
}
