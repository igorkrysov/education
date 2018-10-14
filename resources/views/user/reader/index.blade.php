@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Count symbols</th>
                <th scope="col">Count pages</th>
                <th scope="col">Read</th>
                <th scope="col">Read Hand</th>
                <th scope="col">Done</th>
                </tr>
            </thead>
            <tbody>
                @foreach($readers as $reader)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $reader->title }}</td>
                        <td>{{ strlen($reader->text) }}</td>
                        <td>{{ substr_count($reader->text, '.') }}</td>
                        <td><a href="{{ route('reader.show', $reader->id) }}">Read</a></td>
                        <td><a href="{{ route('reader.hand', $reader->id) }}">Read</a></td>
                        <td>{{ $reader->done ? 'done' : 'no' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection


