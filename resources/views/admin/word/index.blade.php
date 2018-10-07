@extends('layouts.app')

@section('content')

    <word-component :words_="{{ json_encode($words) }}" :dictionary_id="{{ $dictionary_id }}"></word-component>

@endsection
