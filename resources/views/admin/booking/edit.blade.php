@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl">{{ $title }}</h1>
    <form action="/admin/booking/edit/{{ $booking->id_court }}" method="post" class="max-w-xl mt-10 space-y-5">
        @method('put')
        @csrf
        <div>
            <label for="name_booking" class="block mb-2 text-sm font-medium text-slate-900">Nama Booking</label>
            <input type="text" id="name_booking" name="name_booking"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500" value="{{ old("name_booking", $booking->name_booking) }}">
        </div>

        <div class="flex gap-10">
            <div>
                <label for="datepicker-autohide" class="block mb-2 text-sm font-medium text-slate-900">Tanggal
                    Booking</label>
                <div class="relative w-max">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-autohide" name="date_booking" datepicker datepicker-autohide type="text"
                        value="{{ old("date_booking", $booking->date_booking) }}"
                        class="bg-white border border-slate-500 text-slate-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full ps-10 p-2.5"
                        placeholder="Select date">
                </div>
            </div>
            <div>
                <h2 class="block mb-2 text-sm font-medium text-slate-900">Lapangan
                    Booking</h2>
                <div class="flex items-center mb-4">
                    <input id="lapangan1" type="radio" value="Lapangan 1" name="court_booking"
                        class="w-4 h-4 text-slate-600 bg-gray-100 border-gray-300 focus:ring-slate-500">
                    <label for="lapangan1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lapangan
                        1</label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="lapangan2" type="radio" value="Lapangan 2" name="court_booking"
                        class="w-4 h-4 text-slate-600 bg-gray-100 border-gray-300 focus:ring-slate-500">
                    <label for="lapangan2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lapangan
                        2</label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="lapangan3" type="radio" value="Lapangan 3" name="court_booking"
                        class="w-4 h-4 text-slate-600 bg-gray-100 border-gray-300 focus:ring-slate-500">
                    <label for="lapangan3" class="ms-2 text-sm font-medium text-slate-900 dark:text-slate-300">Lapangan
                        3</label>
                </div>
            </div>
        </div>
        <div class="sm:flex-row flex-col">
            <h2 class="block mb-2 text-sm font-medium text-slate-900">Jam
                Booking</h2>
            <ul id="timetable" class="grid w-full grid-cols-3 gap-2 mt-2">
                @for ($i = 8; $i < 23; $i++)
                    <li>
                        <input type="checkbox" id="{{ $i }}.00 - {{ $i + 1 }}.00" name="time_booking[]"
                            value="{{ $i }}.00 - {{ $i + 1 }}.00" class="hidden peer">
                        <label for="{{ $i }}.00 - {{ $i + 1 }}.00"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-slate-600 border-slate-600 peer-checked:border-slate-600 hover:text-white peer-checked:text-white hover:bg-slate-500 peer-checked:bg-slate-700">
                            {{ $i }}.00 - {{ $i + 1 }}.00
                        </label>
                    </li>
                @endfor
            </ul>
        </div>
        <div class="flex gap-2">
            <button
                class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
                <p class="font-semibold">Tambah</p>
            </button>
            <a href="/admin/booking/"
                class="flex justify-center items-center gap-1 text-sm px-5 py-2 h-max bg-slate-100 text-slate-700 border border-gray-200 rounded-lg shadow hover:bg-slate-200">
                <p class="font-semibold">Batal</p>
            </a>
        </div>
    </form>
@endsection
