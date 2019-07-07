<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Word;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dictionary.index', ['dictionaries' => Dictionary::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.dictionary.create');
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
            'title' => 'required|string|max:255'
        ]);

        $dictionary = Dictionary::create($request->all());

        if($request->ajax()) {
            return $dictionary;
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function show(Dictionary $dictionary)
    {
        //
        return view('admin.word.index', ['words' => $dictionary->words, 'dictionary_id' => $dictionary->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function edit(Dictionary $dictionary)
    {
        //
        return view('admin.dictionary.edit', ['dictionary' => $dictionary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dictionary $dictionary)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255'
        ]);
        $dictionary->title = $request->title;
        $dictionary->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dictionary $dictionary)
    {
        //
        $dictionary->delete();

        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function dictionaries()
    {
        return view('user.word.dictionaries', ['dictionaries' => Dictionary::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function dictionary(Request $request, Dictionary $dictionary)
    {
        if ($request->ajax()) {
            return response()->json(['status' => true, 'words' => $dictionary->words]);
        }
        return view('user.word.dictionary', ['dictionary' => $dictionary]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function clearWT(Dictionary $dictionary)
    {
        
        $dictionary->words()->update(['wt' => 0]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function clearTW(Dictionary $dictionary)
    {
        $dictionary->words()->update(['tw' => 0]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function wordTranslate($type, Dictionary $dictionary)
    {
        return view('user.word.wt', ['dictionary' => $dictionary, 'type' => $type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function getWords($type, $count, Dictionary $dictionary)
    {
        $words = $dictionary->words();
        $words->where($type, 0)->inRandomOrder();        
        $words = $words->take($count)->get();

        return response()->json(['words' => $words, 'countAll' => $dictionary->words()->count(), 'countRepeat' => $dictionary->words()->where($type, 0)->count()]);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function updateWords($type, Word $word)
    {
        
        $word->$type = 1;
        
        $word->save();

        return Word::where('dictionary_id', $word->dictionary_id)->where($type, 0)->count();
    }

  


    
}
