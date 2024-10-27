@extends('admin.templates.main')

@section('content')



    
    {{-- <div class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
        <h2 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Jadwal Pemesanan Mendatang
        </h2>
        <ul class="space-y-3">
            <li class="flex flex-col p-4 bg-gray-50 border rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Lapangan 1</h3>
                        <p class="text-sm text-gray-500">Tanggal: 25 Oktober 2024, 10:00 - 11:00</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                        Confirmed
                    </span>
                </div>
                <div class="mt-2 flex justify-between">
                    <span class="text-sm text-gray-700">Status Pembayaran:</span>
                    <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                        Belum Bayar
                    </span>
                </div>
            </li>
            <li class="flex flex-col p-4 bg-gray-50 border rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Lapangan 2</h3>
                        <p class="text-sm text-gray-500">Tanggal: 26 Oktober 2024, 14:00 - 15:00</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                        Pending
                    </span>
                </div>
                <div class="mt-2 flex justify-between">
                    <span class="text-sm text-gray-700">Status Pembayaran:</span>
                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                        Sudah Bayar
                    </span>
                </div>
            </li>
            <li class="flex flex-col p-4 bg-gray-50 border rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Lapangan 3</h3>
                        <p class="text-sm text-gray-500">Tanggal: 27 Oktober 2024, 09:00 - 10:00</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                        Confirmed
                    </span>
                </div>
                <div class="mt-2 flex justify-between">
                    <span class="text-sm text-gray-700">Status Pembayaran:</span>
                    <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                        Belum Bayar
                    </span>
                </div>
            </li>
            <li class="flex flex-col p-4 bg-gray-50 border rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Lapangan 1</h3>
                        <p class="text-sm text-gray-500">Tanggal: 28 Oktober 2024, 16:00 - 17:00</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                        Canceled
                    </span>
                </div>
                <div class="mt-2 flex justify-between">
                    <span class="text-sm text-gray-700">Status Pembayaran:</span>
                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                        Sudah Bayar
                    </span>
                </div>
            </li>
            <li class="flex flex-col p-4 bg-gray-50 border rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Lapangan 2</h3>
                        <p class="text-sm text-gray-500">Tanggal: 29 Oktober 2024, 18:00 - 19:00</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                        Confirmed
                    </span>
                </div>
                <div class="mt-2 flex justify-between">
                    <span class="text-sm text-gray-700">Status Pembayaran:</span>
                    <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                        Belum Bayar
                    </span>
                </div>
            </li>
        </ul>
    </div> --}}
    
    


    {{-- <ul role="list" class="grid w-full grid-cols-2 gap-x-6 gap-y-3 text-sm sm:grid-cols-3 md:gap-y-10 lg:grid-cols-4 my-4">
        <li
            class="rounded-2xl md:border border-gray-200 p-4 sm:p-6 border-l border-gray-600 flex flex-col items-start gap-x-1.5">
            <div class="w-8 h-8">
                <h2 class="text-2xl sm:text-3xl font-semibold font-mona"
                    style="font-variation-settings: &quot;wdth&quot; 125;">1
                </h2>
            </div>
            <h3 class="font-mona font-normal text-sm sm:text-base text-gray-900 mt-2">Total User</h3>
        </li>
        <li
            class="rounded-2xl md:border border-gray-200 p-4 sm:p-6 border-l border-gray-600 flex flex-col items-start gap-x-1.5">
            <div class="w-8 h-8">
                <h2 class="text-2xl sm:text-3xl font-semibold font-mona"
                    style="font-variation-settings: &quot;wdth&quot; 125;">1
                </h2>
            </div>
            <h3 class="font-mona font-normal text-sm sm:text-base text-gray-900 mt-2">Total file</h3>
        </li>
        <li
            class="rounded-2xl md:border border-gray-200 p-4 sm:p-6 border-l border-gray-600 flex flex-col items-start gap-x-1.5">
            <div class="w-8 h-8">
                <h2 class="text-2xl sm:text-3xl font-semibold font-mona"
                    style="font-variation-settings: &quot;wdth&quot; 125;">1
                </h2>
            </div>
            <h3 class="font-mona font-normal text-sm sm:text-base text-gray-900 mt-2">Verified users</h3>
        </li>
        <li
            class="rounded-2xl md:border border-gray-200 p-4 sm:p-6 border-l border-gray-600 flex flex-col items-start gap-x-1.5">
            <div class="w-8 h-8">
                <h2 class="text-2xl sm:text-3xl font-semibold font-mona"
                    style="font-variation-settings: &quot;wdth&quot; 125;">1
                </h2>
            </div>
            <h3 class="font-mona font-normal text-sm sm:text-base text-gray-900 mt-2">Unverified users</h3>
        </li>
    </ul>
    <div class="relative overflow-x-auto">
        <div class="flex justify-between items-center mb-3">
            <div class="flex flex-col justify-between gap-10">
                <a href="/court/create"
                    class="w-max h-min mt-5\ text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
                    Lapangan</a>
            </div>
        </div>


        <table class="max-w-xl text-sm text-left rtl:text-right text-gray-500">
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
                @foreach ($courts as $court)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                            {{ $court['name_court'] }}
                        </th>
                        <td class="px-6 py-3 text-center">
                            <a href=""
                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">Detail</a>
                            <form action="/court/{{ $court['id_court'] }}" method="POST">
                        @csrf
                        @method('delete')
                    <button class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded border border-red-400">Delete</button>
                    </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function roundToHour(timeInput) {
            let [hours, minutes] = timeInput.value.split(':');
            minutes = "00";
            timeInput.value = `${hours}:${minutes}`;
        }

        document.querySelectorAll('.time-input').forEach(input => {
            input.addEventListener('input', function() {
                roundToHour(this);
            });
        });
    </script> --}}
@endsection
