@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>New text</h1>
            <form action="{{ route('reader.update', $reader->id) }}" method="post">
                @csrf            
                @method('PUT')    
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name='title' id='title' value="{{ $reader->title }}">
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea class="form-control" id="text" rows="3" name='text'>{{ $reader->text }}</textarea>
                </div>
                <div class="form-group">
                    <label for="questions">Questions</label>
                    <textarea class="form-control" id="questions" rows="3" name='questions'>{{ $reader->questions }}</textarea>
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
