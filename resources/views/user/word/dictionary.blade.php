@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>List of dictionaries</h1>
            <table>
                <tr>
                    <th>#</th>
                    <th>word-translate</th>
                    <th>translate-word</th>           
                    <th>to repeat</th>
                </tr>
                @foreach($dictionary->words as $word) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $word->word }}</td>
                        <td>{{ $word->translate }}</td>
                        <td><a href="{{ route('to-repeat-words', $word->id) }}">to repeat</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection
