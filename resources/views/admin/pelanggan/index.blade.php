@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl max-sm:py-5">{{ $title }}</h1>

    <div class="relative shadow-md sm:rounded-lg p-3 bg-white mt-5 md:mt-10">
        <div class="pb-4">
            <form action="" method="get">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search"
                        class="block pt-2 ps-10 text-sm max-md:w-full text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-slate-500 focus:border-slate-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                        placeholder="Search for items" value="{{ request('search') }}">
                </div>
            </form>
        </div>
        <div class="w-full max-lg:overflow-x-scroll">
            <table class="md:w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-2 text-center">
                            Nama
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Nomor Telepon
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Banyaknya Bermain
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Pertama Kali Booking
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Terakhir Kali Booking
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Alamat
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Status
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pelanggans->isEmpty())
                        <tr class="bg-white border-b">
                            <th scope="row" colspan=""
                                class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                                Tidak ada pelanggan yang tersedia
                            </th>
                        </tr>
                    @else
                        @foreach ($pelanggans as $booking => $value)
                            <tr class="bg-white border-b">
                                <th scope="row"
                                    class="min-[955px]:px-6 min-[955px]:py-4 p-1 font-medium text-gray-900 whitespace-nowrap text-center">
                                    {{ $value->name }}
                                </th>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 p-1 text-center">
                                    {{ $value->phoneNumber ?? 'Belum di set'  }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 p-1 text-center">
                                    {{ $value->playing }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 p-1 text-center">
                                    {{ $value->first_come }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 p-1 text-center">
                                    {{ $value->last_playing }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 p-1 text-center">
                                    {{ $value->address ?? 'Belum di set' }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 p-1 text-center">
                                    {{ $value->status }}
                                </td>
                                <td class="px-6 py-4 flex gap-5 justify-center">
                                    <a href="/pelanggan/{{ $value->id }}"
                                        class="font-medium text-slate-600 dark:text-slate-500 hover:underline">Detail</a>
                                    <a href="/pelanggan/{{ $value->id }}/edit"
                                        class="font-medium text-slate-600 dark:text-slate-500 hover:underline">Edit</a>
                                    <form action="/pelanggan/{{ $value->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="font-medium text-slate-600 dark:text-slate-500 hover:underline"
                                            onclick="return confirm('Yakin ingin hapus pelanggan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
