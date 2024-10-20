@extends('admin.templates.main')

@section('content')
<form class="max-w-xl" method="post" action="/court">
    @csrf
    <h1 class="text-2xl font-bold mb-5">Tambah Lapangan</h1>
    <div class="mb-5">
        <label for="name_court" class="block mb-2 text-sm font-medium text-gray-900">Nama Lapangan</label>
        <input type="text" id="name_court" name="name_court" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
@endsection