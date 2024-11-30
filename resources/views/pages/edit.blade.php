@extends('layouts.app')

@section('title', 'Edit Page')

@section('content')
    <div>
        <form class="flex flex-col w-80 h-80 border border-solid rounded-lg border-black gap-4 p-4" method="POST" action=" {{ route('students.update', $student->id) }}">
            @csrf
            @method('PUT')
    
            <input class="border border-solid border-black" type="name" name="name" id="name" value="{{ old('name', $student->name) }}">
            <input class="border border-solid border-black" type="section" name="section" id="section" value="{{ old('section', $student->section) }}">
            <input class="border border-solid border-black" type="year" name="year" id="year" value="{{ old('year', $student->year) }}">
        
        </form>
    </div>

@endsection