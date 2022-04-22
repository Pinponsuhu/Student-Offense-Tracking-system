@extends('layouts.app')
@section('content')
    <main class="w-full mt-14 h-screen overflow-y-scroll">
        <div class="px-3 md:px-6 mt-4">
            <div class="bg-white py-8 px-3 md:px-6">
                <div class="">
                    <h1 class="text-2xl font-bold mb-4">All Report</h1>
                    <span id="button-excel" class="px-5  bg-blue-400 cursor-pointer text-white font-bold py-2.5">Export Excel</span>
                    <div class="w-full md:px-8 mt-3 overflow-x-scroll mx-auto ">
                        <table class="w-full mt-4" id="resultTable">
                            <thead>
                                <tr class="p-3 bg-yellow-400">
                                    <td class="text-gray-500 py-2.5 px-1 uppercase text-md font-bold">created By</td>
                                    <td class="text-gray-500 py-2.5 px-1 uppercase text-md font-bold">Remark</td>
                                    <td class="text-gray-500 py-2.5 px-1 uppercase text-md font-bold">Matric Number</td>
                                    <td class="text-gray-500 py-2.5 px-1 uppercase text-md font-bold">Student Name</td>
                                    <td class="text-gray-500 py-2.5 px-1 uppercase text-md font-bold">Faculty</td>
                                    <td class="text-gray-500 py-2.5 px-1 uppercase text-md font-bold">Department</td>
                                    <td class="text-gray-500 py-2.5 px-1 uppercase text-md font-bold">Created On</td>
                                </tr>
                            </thead>
                            <tbody class="mt-3">
                                @foreach ($offenses as $offense)
                                @php
                                    $user = App\Models\Student::find($offense->student_id)
                                @endphp
                                <tr class="py-4 bg-yellow-100 border-2 border-white px-3">
                                <td class="py-3">{{ $offense->reported_by }}</td>
                                <td class="py-3">{{ $offense->remark }}</td>
                                <td class="py-3"> {{ $user->matric_number }}</td>
                                <td class="py-3"> {{ $user->full_name }}</td>
                                <td class="py-3">{{ $user->faculty }}</td>
                                <td class="py-3">{{ $user->department }}</td>
                                <td class="px-2 py-3">{{ $offense->created_at->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </main>
    <script src="{{ asset('js/tableToExcel.js') }}"></script>
    <script>

let button = document.querySelector("#button-excel");

button.addEventListener("click", e => {
  let table = document.querySelector("#resultTable");
  TableToExcel.convert(table);
});
    </script>
@endsection
