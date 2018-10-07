@extends('layouts.app')

@section('content')

    <dictionary-component :dictionaries_="{{ json_encode($dictionaries) }}"></dictionary-component>

@endsection
