@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>List of dictionaries</h1>
            <table>
                <tr>
                    <th>dictioary</th>
                    <th>word-translate</th>
                    <th>translate-word</th>
                    <th>clear wt</th>
                    <th>clear tw</th>
                </tr>
                @foreach($dictionaries as $dictionary) 
                    <tr>
                        <td><a href="{{ route('dictionary', $dictionary->id) }}"> {{ $dictionary->title }}</a></td>
                        <td><a href="{{ route('word-translate', ['wt', $dictionary->id]) }}"> wt( {{ count($dictionary->words()->where('wt', 1)->get()) }} / {{ count($dictionary->words) }})</a></td>
                        <td><a href="{{ route('word-translate', ['tw', $dictionary->id]) }}"> tw( {{ count($dictionary->words()->where('tw', 1)->get()) }} / {{ count($dictionary->words) }})</a></td>
                        <td><a href="{{ route('clear-word-translate', $dictionary->id) }}"> clear wt</a></td>
                        <td><a href="{{ route('clear-translate-word', $dictionary->id) }}"> clear tw</td>                
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    

@endsection
