@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl">{{ $title }}</h1>

    <div class="mt-10 flex gap-5">
        <section
            class="flex justify-between items-center min-w-[400px] h-min max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex gap-5 items-center">
                <div class="bg-slate-700 rounded-full w-11 h-11 text-white grid place-items-center">
                    <p class="mb-0.5">A</p>
                </div>
                <div>
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">Welcome</h5>
                    <p class="font-normal text-gray-700">admin</p>
                </div>
            </div>

            <a href="/admin/logout"
                class="flex justify-center items-center gap-1 px-2 py-2 h-max bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
                <p class="font-semibold">Keluar</p>
            </a>
        </section>
        <section class="block min-w-[400px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <p class="mb-2 text-xl font-bold tracking-tight text-gray-900">Set jam buka dan tutup</p>
            <div>
                <form action="/admin/operational/edit/{{ $operational->id_operational }}" method="post" class="flex items-between gap-3">
                    @csrf
                    <div>
                        <label for="time_open" class="block mb-2 text-sm font-medium text-gray-900">Jam Buka:</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="time" id="time_open" name="time_open"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                min="00:00" max="23:00" value="{{ $operational->time_open }}" required />
                        </div>
                    </div>
                    <div>
                        <label for="time_close" class="block mb-2 text-sm font-medium text-gray-900">Jam Tutup:</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="time" id="time_close" name="time_close"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                min="00:00" max="23:00" value="{{ $operational->time_close }}" required />
                        </div>
                    </div>
                    <button
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2 h-[42px] mt-7">Set</button>
                </form>
            </div>
        </section>
    </div>

    <div class="mt-10 flex gap-5">
        <section class="block min-w-[400px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <h5 class="font-normal text-gray-700">Jumlah Pengunjung Hari Ini</h5>
            <p class="mb-2 text-3xl font-bold tracking-tight text-gray-900">0</p>
        </section>
        <section class="block min-w-[400px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <h5 class="font-normal text-gray-700">Income Bulan Ini</h5>
            <p class="mb-2 text-3xl font-bold tracking-tight text-gray-900">Rp 0</p>
        </section>
    </div>
@endsection
