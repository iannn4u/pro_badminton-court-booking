@extends('admin.layouts.index')

@section('main')
    <div class="flex justify-between max-sm:py-5">
        <h1 class="text-3xl">{{ $title }}</h1>
        <a href="/admin/user/create"
            class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
            <p class="font-semibold">Tambah User</p>
        </a>
    </div>


    <div class="relative shadow-md sm:rounded-lg p-3 bg-white mt-5 md:mt-10">
        <div class="w-full max-lg:overflow-x-scroll">
            <table class="md:w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama User
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Role User
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->isEmpty())
                        <tr class="bg-white border-b">
                            <th scope="row" colspan=""
                                class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                                Tidak ada data user
                            </th>
                        </tr>
                    @else
                        @foreach ($users as $user => $value)
                            <tr class="bg-white border-b">
                                <th scope="row"
                                    class="min-[955px]:px-6 min-[955px]:py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                    {{ $value->name }}
                                </th>
                              
                                <td class="min-[955px]:px-6 min-[955px]:py-4 text-center">
                                    {{ $value->username }}
                                </td>
                                <td class="min-[955px]:px-6 min-[955px]:py-4 text-center">
                                    {{ $value->role }}
                                </td>
                                <td class="px-6 py-4 flex gap-5 justify-center">
                                    <a href="/admin/user/{{ $value->id }}/edit"
                                        class="font-medium text-slate-600 dark:text-slate-500 hover:underline">Edit</a>
                                    <form action="/admin/user/{{ $value->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="font-medium text-slate-600 dark:text-slate-500 hover:underline"
                                            onclick="return confirm('Yakin ingin hapus user ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
