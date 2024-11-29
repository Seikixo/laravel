<div {{ $attributes->merge(['class' => 'p-4 bg-white rounded shadow-md']) }}>
    <table class="table-auto border-collapse border border-gray-300 w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $student->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->section }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->year }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
