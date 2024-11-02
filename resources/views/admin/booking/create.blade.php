@extends('admin.templates.main')

@section('content')
    <div class="bg-gray-50 rounded-lg p-5 md:min-w-[500px] min-w-[90%]">
        <form class="w-full" method="post" action="/booking">
            @csrf
            <h1 class="text-3xl font-bold mb-5">Tambah Jadwal</h1>
            <div class="flex justify-evenly gap-5">
                <div class="w-full">
                    <div class="mb-5">
                        <label for="name_booking" class="block mb-2 text-sm font-medium text-gray-900">Nama Pemesan</label>
                        <input type="text" id="name_booking" name="name_booking" value="{{ old('name_booking') }}"
                            class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                            required />
                    </div>
                    <div class="mb-5 w-max">
                        <label for="date_booking" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Main</label>
                        <input id="date_booking" name="date_booking" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date">
                    </div>
                    <div class="mb-5">
                        <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">Jam Main <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="dropdownDefaultCheckbox"
                            class="z-10 hidden overflow-y-scroll max-h-60 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow">
                            <ul class="p-3 space-y-3 text-sm text-gray-7000" aria-labelledby="dropdownCheckboxButton">
                                @for ($i = 8; $i < 24; $i++)
                                    <li>
                                        <div class="flex items-center">
                                            <input
                                                id="{{ $i < 10 ? '0' . $i : $i }}.00 - {{ $i + 1 < 10 ? '0' . $i + 1 : $i + 1 }}.00"
                                                name="time_booking[]" type="checkbox"
                                                value="{{ $i < 10 ? '0' . $i : $i }}.00 - {{ $i + 1 < 10 ? '0' . $i + 1 : $i + 1 }}.00"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label
                                                for="{{ $i < 10 ? '0' . $i : $i }}.00 - {{ $i + 1 < 10 ? '0' . $i + 1 : $i + 1 }}.00"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $i < 10 ? '0' . $i : $i }}.00
                                                - {{ $i + 1 < 10 ? '0' . $i + 1 : $i + 1 }}.00</label>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-5">
                        <h2 class="block mb-2 text-sm font-medium text-gray-900">Lapangan</h3>
                            @foreach ($courts as $court)
                                <div class="flex items-center mb-2">
                                    <input id="{{ $court['name_court'] }}" type="radio" value="{{ $court['name_court'] }}"
                                        name="court_booking"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="{{ $court['name_court'] }}"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $court['name_court'] }}</label>
                                </div>
                            @endforeach
                    </div>
                    <div>
                        <h2 class="block mb-2 text-sm font-medium text-gray-900">Metode Pembayaran</h3>
                            <div class="flex items-center mb-2">
                                <input checked id="cash" type="radio" value="Cash" name="method_payment"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="cash"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash</label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input id="dp" type="radio" value="DP" name="method_payment"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="dp"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">DP</label>
                            </div>
                            <div class="flex items-center mb-5">
                                <input id="transfer" type="radio" value="Transfer" name="method_payment"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="transfer"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transfer</label>
                            </div>
                    </div>

                </div>
            </div>
            <div class="mb-5">
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here...">{{ old('description') }}</textarea>
            </div>
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
@endsection
