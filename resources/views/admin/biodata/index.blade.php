@extends('admin.layouts.index')

@section('main')
    <div class="flex justify-between">
        <h1 class="text-3xl">{{ $title }}</h1>
        <a href="/admin/pengaturan/edit/{{ $biodata->id_biodata }}"
            class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
            <p class="font-semibold">Edit Biodata</p>
        </a>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3 bg-white mt-10">
        
    </div>
@endsection
