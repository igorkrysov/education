@extends('layouts.app')

@section('content')
    <word-translate-component :type="'{{ $type }}'" :dictionary_id="{{ $dictionary->id }}"></word-translate-component>

@endsection
