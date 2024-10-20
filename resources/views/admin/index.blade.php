@extends('admin.templates.main')

@section('content')
    
<div class="relative overflow-x-auto">
    <a href="/court/create" class="block w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-3">Tambah Lapangan</a>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Lapangan
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 3; $i++)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Lapangan {{ $i }}
                </th>
                <td class="px-6 py-4 text-center">
                    <a href="" class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Detail</a>
                    <a href="" class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Delete</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>

@endsection