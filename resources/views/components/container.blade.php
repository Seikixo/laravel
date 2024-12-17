<div {{ $attributes->merge(['class' => 'p-4 bg-white rounded shadow-md']) }}>

    @if (@session('success'))
        <div class="flex flex-row w-full h-10 bg-green-100 text-black">
            {{session('success')}}
        </div>
    @endif

    <div class="flex w-full mb-2 justify-between">
        <form action="{{route('students.index')}}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{request('search')}}" placeholder="Search Students" class="border border-black rounded-md px-2">
            <button type="submit" class="flex justify-start border-2 rounded-md px-2">Search</button>
        </form>
        <a href="{{ route('students.create') }}" class="flex justify-start items- w-fit border-2 rounded-md px-2 right-0">Add</a>
    </div>

    <table class="table-auto border-collapse border border-gray-300 w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('students.index', [
                        'sort' => 'name',
                        'direction' => request('direction') === 'asc' ? 'desc' : 'asc',
                    ]) }}" class="flex justify-center items-center gap-2">
                        Name
                        @if (request('sort') === 'name')
                            <img src="{{ asset(request('direction') === 'asc' ? 'up.png' : 'down.png') }}" alt="{{request('direction')}}" class="w-4 h-4">
                        @endif
                    </a>
                    
                </th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Year</th>
                @foreach (['English', 'Math', 'Science', 'History'] as $info)
                    <th class="border border-gray-300 px-4 py-2">{{$info}}</th>
                @endforeach
            </tr>    
        </thead>
        <tbody>
            @forelse ($students as $student)
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
                    <td class="border border-gray-300 px-4 py-2">
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" >Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center py-4">No Students Found</td>
                </tr>

            @endforelse
        </tbody>
    </table>
    @if ($students->count())
        <nav class="mt-4">
            {{$students->withQueryString()->links()}}
        </nav>
    @endif
</div>
