@extends('layouts.app')

@section('title', 'Add Student Page')

@section('content')
    <form action="{{route('students.store')}}" method="POST">
        @csrf

        <div class="col-start-1 col-end-1 row-start-1 row-end-1 gap-2">
            <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="name" id="name">
            <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="section" id="section">
            <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="year" id="year">
        </div>

        <div class="col-start-2 col-end-2 row-start-1 row-end-1 gap-2 mt-4">
            <input 
                class="border border-solid rounded-md border-black p-2 mb-2" 
                name="grades[english]"
                placeholder="English"
                type="number" 
            >
            <input 
                class="border border-solid rounded-md border-black p-2 mb-2" 
                name="grades[math]"
                placeholder="Math"
                type="number" 
            >
            <input 
                class="border border-solid rounded-md border-black p-2 mb-2" 
                name="grades[science]"
                placeholder="Science"
                type="number" 
            >
            <input 
                class="border border-solid rounded-md border-black p-2 mb-2" 
                name="grades[history]"
                placeholder="History"
                type="number" 
            >
        </div>
        
            
        <div class="flex flex-row gap-4">
            <button class="flex flex-col justify-center items-center w-18 h-8 border rounded-md p-4 mt-4 bg-blue-100 hover:bg-blue-300" type="submit">Submit</button>
            <button class="flex flex-col justify-center items-center w-18 h-8 border rounded-md p-4 mt-4 bg-blue-100 hover:bg-blue-300" action="{{route('students.index')}}">Cancel</button>
        </div>
    </form>
@endsection