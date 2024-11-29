@extends('layouts.app')

@section('title', 'Home page')
    
@section('content')

    <x-container :students="$students" class="flex flex-col"></x-container>

@endsection