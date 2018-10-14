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
                <th scope="col">Read</th>
                <th scope="col">Read Hand</th>
                <th scope="col">Done</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($readers as $reader)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $reader->title }}</td>
                        <td>{{ strlen($reader->text) }}</td>
                        <td><a href="{{ route('reader.show', $reader->id) }}">Read</a></td>
                        <td><a href="{{ route('reader.hand', $reader->id) }}">Read</a></td>
                        <td>{{ $reader->done ? 'done' : 'no' }}</td>
                        <td><a href="{{ route('reader.edit', $reader->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('reader.destroy', $reader->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button>delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <example-component></example-component>
        </div>
    </div>
</div>
@endsection


