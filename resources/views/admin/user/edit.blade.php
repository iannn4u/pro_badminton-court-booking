@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl">{{ $title }}</h1>

    <form action="/admin/user/{{ $user->id }}" method="post" class="max-w-xl mt-10 space-y-5">
        @method('put')
        @csrf
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-slate-900">Nama User</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500"
                required>
        </div>
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-slate-900">Username User</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500"
                required>
        </div>
        <div>
            <label for="role" class="block mb-2 text-sm font-medium text-slate-900">Role User</label>
            <select id="role" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option {{ old('role') || $user->role == 'operator' ? 'selected' : '' }} value="operator">Operator</option>
                <option {{ old('role') || $user->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
            </select>
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-slate-900">Password User</label>
            <input type="text" id="password" name="password"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500"
                autocomplete="off">
            <p id="helper-text-explanation" class="text-sm text-gray-500 dark:text-gray-400">Kosongkan jika tidak ingin
                mengganti password.</p>
        </div>
        <div class="flex gap-2">
            <a href="/admin/user"
                class="flex justify-center items-center gap-1 text-sm px-5 py-2 h-max bg-slate-100 text-slate-700 border border-gray-200 rounded-lg shadow hover:bg-slate-200">
                <p class="font-semibold">Batal</p>
            </a>
            <button
                class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
                <p class="font-semibold">Tambah</p>
            </button>
        </div>
    </form>
@endsection
