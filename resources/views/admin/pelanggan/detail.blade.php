@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl max-sm:py-5">{{ $title }}</h1>



    <div
        class="w-max max-sm:w-full mt-10 overflow-hidden flex flex-col max-md:items-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col p-10">
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $pelanggan->name }}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">No Hp : {{ $pelanggan->phoneNumber ?? 'Belum Ada No HP' }}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Alamat : {{ $pelanggan->address ?? 'Belum Ada Alamat' }}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Pertama kali datang : {{ $pelanggan->first_come }}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Terakhir kali booking : {{ $pelanggan->last_booking }}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Terakhir kali main : {{ $pelanggan->last_playing ?? 'Belum Main' }}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">Total main : {{ $pelanggan->playing }}</span>
        </div>
        <div class="w-full p-2 overflow-x-auto">
            <table class="w-max text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 py-3 text-center">
                            Tanggal Main
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Lapangan
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Jam
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Harga
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $bookings = App\Models\Booking::where('name_booking', $pelanggan->name)
                            ->orderBy('date_booking', 'desc')
                            ->take(5)
                            ->get();
                    @endphp
                    @if ($bookings->isEmpty())
                        <tr class="bg-white border-b">
                            <th scope="row" colspan=""
                                class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                                Tidak ada pelanggan yang tersedia
                            </th>
                        </tr>
                    @else
                        @foreach ($bookings as $booking => $value)
                            <tr class="bg-white border-b">
                                <th scope="row"
                                    class="min-[955px]:px-6 min-[955px]:py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                    {{ $value->date_booking }}
                                </th>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 text-center">
                                    {{ $value->court_booking }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 text-center">
                                    {{ $value->time_booking }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 text-center">
                                    {{ $value->price_booking }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
