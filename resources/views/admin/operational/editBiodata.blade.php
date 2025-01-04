@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl max-sm:py-5">{{ $title }}</h1>
    <form action="/admin/pengaturan/edit/biodata/{{ $operational->id_operational }}" method="post"
        enctype="multipart/form-data" class="max-w-xl mt-10 space-y-5">
        @method('put')
        @csrf
        <div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photos_place">Upload
                    Foto
                    Tempat</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="photos_place" name="photos_place[]" type="file" multiple>
            </div>
            <div class="flex items-center mt-2 mb-5 gap-5">
                <div class="flex items-center">
                    <input id="preview1" type="checkbox" name="preview1" value="1"
                        @if ($operational->preview1 == 1) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="preview1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nonaktifkan
                        contoh foto tempat 1</label>
                </div>
                <div class="flex items-center">
                    <input id="preview2" type="checkbox" name="preview2" value="1"
                        @if ($operational->preview2 == 1) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="preview2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nonaktifkan
                        contoh foto tempat 2</label>
                </div>
            </div>
            <div class="mb-5">
                <label for="name_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Tempat</label>
                <input type="text" id="name_biodata" aria-label="disabled input 2" name="name_biodata"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('name_biodata', $operational->name_biodata) }}" required>
            </div>
            <div class="mb-5 grid grid-cols-2 max-sm:grid-cols-1 max-sm:gap-2 gap-10">
                <div>
                    <label for="address_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Tempat</label>
                    <input type="text" id="address_biodata" aria-label="disabled input 2" name="address_biodata"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('address_biodata', $operational->address_biodata) }}" required>
                </div>
                <div>
                    <label for="link_address_biodata"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Google Maps Tempat</label>
                    <input type="text" id="link_address_biodata" aria-label="disabled input 2"
                        name="link_address_biodata"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('link_address_biodata', $operational->link_address_biodata) }}" required>
                    <p class="mt-2 text-xs"><span class="font-medium">Jika tidak ada link isi input dengan "/".</p>
                </div>
            </div>
        </div>
        <div class="mb-5 grid grid-cols-2 max-sm:grid-cols-1 max-sm:gap-2 gap-10">
            <div>
                <label for="wa_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                    Telepon/Whatsapp</label>
                <input type="text" id="wa_biodata" aria-label="disabled input 2" name="wa_biodata"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('wa_biodata', $operational->wa_biodata) }}" required>
            </div>
            <div>
                <label for="link_wa_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                    Whatsapp</label>
                <input type="text" id="link_wa_biodata" aria-label="disabled input 2" name="link_wa_biodata"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('link_wa_biodata', $operational->link_wa_biodata) }}" required>
                <p class="mt-2 text-xs"><span class="font-medium">Jika tidak ada link isi input dengan "/".</p>
            </div>
        </div>
        <div class="flex gap-2 mt-5">
            <button
                class="flex justify-center items-center gap-1 text-sm px-4 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
                <p class="font-semibold">Edit</p>
            </button>
            <a href="/admin/pengaturan"
                class="flex justify-center items-center gap-1 text-sm px-5 py-2 h-max bg-slate-100 text-slate-700 border border-gray-200 rounded-lg shadow hover:bg-slate-200">
                <p class="font-semibold">Batal</p>
            </a>
        </div>
    </form>
@endsection
