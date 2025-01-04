@extends('admin.layouts.index')

@section('main')
    <div class="flex justify-between max-sm:py-5">
        <h1 class="max-sm:text-2xl text-3xl">{{ $title }}</h1>
        <a href="/admin/lapangan/tambah"
            class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
            <p class="font-semibold">Tambah Lapangan</p>
        </a>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3 bg-white mt-5 md:mt-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Nama Lapangan
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Harga Lapangan
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($courts->isEmpty())
                    <tr class="bg-white border-b">
                        <th scope="row" colspan="" class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                            Tidak ada lapangan tersedia
                        </th>
                    </tr>
                @else
                    @foreach ($courts as $court => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $value->name_court }}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $value->price_court }}
                            </td>
                            <td class="px-6 py-4 flex gap-5 justify-center">
                                <a href="/admin/lapangan/edit/{{ $value->id_court }}"
                                    class="font-medium text-slate-600 dark:text-slate-500 hover:underline">Edit</a>
                                <form action="/admin/lapangan/delete/{{ $value->id_court }}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button class="font-medium text-slate-600 dark:text-slate-500 hover:underline"
                                    onclick="return confirm('Yakin ingin hapus lapangan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
