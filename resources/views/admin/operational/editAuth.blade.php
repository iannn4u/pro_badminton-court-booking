@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl max-sm:py-5">{{ $title }}</h1>
    <form action="/admin/pengaturan/edit/account/{{ $user->id }}" method="post" class="max-w-xl mt-10 space-y-5">
        @method("put")
        @csrf
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-slate-900">Username</label>
            <input type="text" id="username" name="username"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500" value="{{ old("username", $user->username) }}">
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-slate-900">Password</label>
            <input type="password" id="password" name="password"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500">
        </div>
        <div class="flex gap-2">
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
