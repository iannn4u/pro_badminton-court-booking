@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl max-sm:py-5">{{ $title }}</h1>

    <form action="/pelanggan/{{ $pelanggan->id }}" method="post" class="max-w-xl mt-10 space-y-5">
        @method('put')
        @csrf
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-slate-900">Nama Pelangan</label>
            <input type="text" id="name" name="name"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500" value="{{ old('name', $pelanggan->name) }}" required>
        </div>
        <div>
            <label for="phoneNumber" class="block mb-2 text-sm font-medium text-slate-900">Nomor Telepon Pelangan</label>
            <input type="text" id="phoneNumber" name="phoneNumber"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500" value="{{ old('phoneNumber', $pelanggan->phoneNumber) }}">
        </div>
        <div>
            <label for="address" class="block mb-2 text-sm font-medium text-slate-900">Alamat Pelanggan</label>
            <textarea id="address" rows="4" name="address"
                class="block p-2.5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-salte-500 focus:ring-slate-500 focus:border-slate-500"
                placeholder="Write your thoughts here..."> {{ old('address', $pelanggan->address) }}</textarea>
        </div>
        <div class="flex gap-2">
            <button
                class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
                <p class="font-semibold">Tambah</p>
            </button>
            <a href="/pelanggan"
                class="flex justify-center items-center gap-1 text-sm px-5 py-2 h-max bg-slate-100 text-slate-700 border border-gray-200 rounded-lg shadow hover:bg-slate-200">
                <p class="font-semibold">Batal</p>
            </a>
        </div>
    </form>
@endsection
