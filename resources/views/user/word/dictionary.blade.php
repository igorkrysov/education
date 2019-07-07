@extends('layouts.app')

@section('content')
    <words-list-component dictionary="{{ $dictionary->id }}"></words-list-component>
@endsection