@extends('layouts.app')

@section('title', 'Edit Page')

@section('content')
    <div>
        <form class="grid grid-cols-2 grid-rows-1 w-[50%] h-auto justify-center items-center border border-solid rounded-lg border-black gap-4 p-4" method="POST" action=" {{ route('students.update', $student->id) }}">
            @csrf
            @method('PUT')
            <div class="col-start-1 col-end-1 row-start-1 row-end-1 gap-2">
                <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="name" id="name" value="{{ old('name', $student->name) }}">
                <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="section" id="section" value="{{ old('section', $student->section) }}">
                <input class="border border-solid rounded-md border-black p-2 mb-2" type="text" name="year" id="year" value="{{ old('year', $student->year) }}">
                <button class="flex flex-col justify-center items-center w-auto h-auto bg-blue-100 hover:bg-blue-300" type="submit" >Submit</button>
            </div>
                
            <div class="col-start-2 col-end-2 row-start-1 row-end-1 gap-2">
                @foreach ($student->grades as $grade)
                    @foreach (['english', 'math', 'science', 'history'] as $subject)
                    <!--<label for="grades[{{ $grade->id }}][{{ $subject }}]">{{ ucfirst($subject) }}</label>-->
                        <input 
                            class="border border-solid rounded-md border-black p-2 mb-2" 
                            name="grades[{{ $grade->id }}][{{ $subject }}]"
                            type="text" 
                            value="{{ old('grades.'. $grade->id . '.' . $subject, $grade->$subject) }}"
                        >
                    @endforeach               
                @endforeach
            </div>
            
        
        </form>
    </div>

@endsection