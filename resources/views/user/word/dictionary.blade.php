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
                </tr>
                @foreach($dictionary->words as $word) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $word->word }}</td>
                        <td>{{ $word->translate }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection
