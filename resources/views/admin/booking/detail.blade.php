@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl">{{ $title }}</h1>

    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $booking->name_booking }}</h5>
        @php
            $dateFormat = \Carbon\Carbon::parse($booking->date_booking)->format('d-m-Y');
        @endphp
        <p class="font-normal text-gray-700 dark:text-gray-400">
            {{ $booking->pelanggan->phoneNumber }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ $dateFormat . ', ' . $booking->time_booking . ', ' . $booking->court_booking }}</p>
        <div class="w-full flex justify-between">
            <a href=""
                class="text-white w-full text-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Selesai</a>
            <form action="/admin/booking/{{ $booking->id_booking }}" method="post" class="w-full">
                @method('delete')
                @csrf
                <button
                    class="text-white w-full text-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                    onclick="return confirm('Yakin ingin hapus lapangan ini?')">Cancel/Hapus</button>
            </form>
        </div>
    </div>
@endsection
