@extends('layouts.app')

@section('title', 'Edit Page')

@section('content')
    <x-form>
        <form  method="POST" action=" {{ route('students.update', $student->id) }}">
            @csrf
            @method('PUT')
            <div class="col-start-1 col-end-1 row-start-1 row-end-1 gap-2">
                <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="name" id="name" value="{{ old('name', $student->name) }}">
                <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="section" id="section" value="{{ old('section', $student->section) }}">
                <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="year" id="year" value="{{ old('year', $student->year) }}">
            </div>
                
            <div class="col-start-2 col-end-2 row-start-1 row-end-1 gap-2 mt-4">
                @foreach ($student->grades as $grade)
                    @foreach (['english', 'math', 'science', 'history'] as $subject)
                        <input 
                            class="border border-solid rounded-md border-black p-2 mb-2" 
                            name="grades[{{ $grade->id }}][{{ $subject }}]"
                            type="text" 
                            value="{{ old('grades.'. $grade->id . '.' . $subject, $grade->$subject) }}"
                        >
                    @endforeach               
                @endforeach
            </div>
            <div class="flex flex-row gap-4">
                <button class="flex flex-col justify-center items-center w-18 h-8 border rounded-md p-4 mt-4 bg-blue-100 hover:bg-blue-300" type="submit">Submit</button>
                <button class="flex flex-col justify-center items-center w-18 h-8 border rounded-md p-4 mt-4 bg-blue-100 hover:bg-blue-300" action="{{route('students.index')}}">Cancel</button>
            </div>
            
        </form>
    </x-form>
@endsection