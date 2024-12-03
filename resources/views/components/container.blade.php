<div {{ $attributes->merge(['class' => 'p-4 bg-white rounded shadow-md']) }}>

    @if (@session('success'))
        <div class="flex flex-row w-full h-10 bg-green-100 text-black">
            {{session('success')}}
        </div>
    @endif
    <table class="table-auto border-collapse border border-gray-300 w-full">
        <thead class="bg-gray-100">
            <tr>
                @foreach (['ID', 'Name', 'Section', 'Year', 'English', 'Math', 'Science', 'History'] as $info)
                    <th class="border border-gray-300 px-4 py-2">{{$info}}</th>
                @endforeach
            </tr>
            <tr>
                <a href="{{ route('students.create') }}">Add</a>
            </tr>     
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 cursor-pointer">{{ $student->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->section }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->year }}</td>
                    @if ($student->grades->isNotEmpty())
                        @foreach ($student->grades as $grade)
                            @foreach (['english', 'math', 'science', 'history'] as $subject)
                                <td class="border border-gray-300 px-4 py-2">{{ $grade->$subject }}</td>
                            @endforeach
                        @endforeach
                        
                    @else
                        @foreach (['english', 'math', 'science', 'history'] as $subject)
                            <td class="border border-gray-300 px-4 py-2">No grade</td>
                        @endforeach
                    @endif
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="border border-gray-300 px-4 py-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($students->count())
        <nav class="mt-4">
            {{$students->links()}}
        </nav>
    @endif
</div>
