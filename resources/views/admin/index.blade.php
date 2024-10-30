@extends('admin.templates.main')

@section('content')
<h1 class="text-3xl font-bold mb-5">Halaman Admin</h1>
    <div class="flex gap-2">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <a href="/court/create"
                class="block w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                Lapangan</a>
            <table class="max-w-xl text-center shadow-md text-sm rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Lapangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($courts->isEmpty())
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Tidak Ada Lapangan
                    </td>
                    </tr>
                    @endif
                    @foreach ($courts as $court)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $court['name_court'] }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $court['price_court'] }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 flex gap-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/court/{{ $court['id_court'] }}/edit">Edit</a>
                                <form action="/court/{{ $court['id_court'] }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure want delete it?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <a href="/booking/create"
                class="block w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                Jadwal</a>
            <table class="max-w-2xl text-center shadow-md text-sm rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jam
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lapangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Hermansyah
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            10.00 - 12.00
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Lapangan 1
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Cash
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <button onclick="return confirm('Are you sure want delete it?')">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>





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
