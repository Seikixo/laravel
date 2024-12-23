@extends('layouts.app')

@section('title', 'Home page')
    
@section('content')

    <x-container 
    :students="$students" 
    :sections="$sections" 
    :selectedSection="$selectedSection" 
    :years="$years"
    :selectedYear="$selectedYear"
    class="flex flex-col"></x-container>

@endsection