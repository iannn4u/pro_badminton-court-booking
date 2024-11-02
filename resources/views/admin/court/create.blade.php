@extends('admin.templates.main')

@section('content')
    <div class="bg-gray-50 rounded-lg p-5 md:min-w-96 min-w-[90%]">
        <form class="w-full" method="post" action="/court">
            @csrf
            <h1 class="text-2xl font-bold mb-5">Tambah Lapangan</h1>
            <div class="mb-5">
                <label for="name_court" class="block mb-2 text-sm font-medium text-gray-900">Nama Lapangan</label>
                <input type="text" id="name_court" name="name_court"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <div class="mb-5">
                <label for="price_court" class="block mb-2 text-sm font-medium text-gray-900">Harga Lapangan/Jam</label>
                <input type="text" id="price_court" name="price_court"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <div class="mb-5">
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
            </div>
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
@endsection
