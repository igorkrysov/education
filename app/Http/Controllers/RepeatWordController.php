<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RepeatWord;
use App\Word;

class RepeatWordController extends Controller
{
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function addRepeatWords(Request $request, Word $word)
    {
        
        $repeatWord = RepeatWord::firstOrNew(['word_id' => $word->id]);
        $repeatWord->save();
        $word->wt = 1;
        $word->tw = 1;
        $word->save();

        if(!$request->ajax()) {
            return redirect()->back();
        }
    }

    public function index() 
    {
        return view('user.word.repeat');
    }

    public function getWords($count)
    {
        $words = RepeatWord::take($count)->with(['word'])->get();

        return response()->json(['words' => $words, 'countAll' => RepeatWord::count()]);
    }

    public function updateWords($word_id) 
    {
        RepeatWord::where('word_id', $word_id)->delete();
        return response()->json(['countAll' => RepeatWord::count()]);
    }
}
