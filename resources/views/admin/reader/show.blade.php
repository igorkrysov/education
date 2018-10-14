@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <reader-component :reader="{{ json_encode($reader) }}"></reader-component>
        </div>
    </div>
</div>
@endsection

