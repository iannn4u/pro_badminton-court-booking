@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl max-sm:py-5">{{ $title }}</h1>
    <form action="/admin/pengaturan/tambah/highlight" method="post" class="max-w-xl mt-10 space-y-5" id="contentForm">
        @csrf
        <div>
            <label for="name_highlight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                Highlight</label>
            <input type="text" id="name_highlight" aria-label="disabled input 2" name="name_highlight"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ old('name_highlight') }}" required>
        </div>
        <div class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <input type="hidden" name="desc_highlight" id="desc_highlight">
            <div class="px-3 py-2 border-b dark:border-gray-600">
                <div class="flex items-center gap-2">
                    <button id="typographyDropdownButton" data-dropdown-toggle="typographyDropdown"
                        class="flex items-center justify-center rounded-lg bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-500 hover:bg-gray-200 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-600 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white dark:focus:ring-gray-600"
                        type="button">
                        Format
                        <svg class="-me-0.5 ms-1.5 h-3.5 w-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="ps-1.5">
                        <span class="block w-px h-4 bg-gray-300 dark:bg-gray-600"></span>
                    </div>
                    <!-- Heading Dropdown -->
                    <div id="typographyDropdown" class="z-10 hidden w-72 rounded bg-white p-2 shadow dark:bg-gray-700">
                        <ul class="space-y-1 text-sm font-medium" aria-labelledby="typographyDropdownButton">
                            <li>
                                <button id="toggleParagraphButton" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Paragraph
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">0</kbd>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button data-heading-level="3" type="button"
                                    class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                    3
                                    <div class="space-x-1.5">
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                        <kbd
                                            class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">3</kbd>
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center space-x-1 rtl:space-x-reverse flex-wrap">
                        <button id="toggleListButton" type="button" data-tooltip-target="tooltip-list"
                            class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                            </svg>
                            <span class="sr-only">Toggle list</span>
                        </button>
                        <div id="tooltip-list" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Toggle list
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button id="toggleOrderedListButton" type="button" data-tooltip-target="tooltip-ordered-list"
                            class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4" />
                            </svg>
                            <span class="sr-only">Create ordered list</span>
                        </button>
                        <div id="tooltip-ordered-list" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Toggle ordered list
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                <label for="wysiwyg-typography-example" class="sr-only">Publish post</label>
                <div
                    id="wysiwyg-typography-example"class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400">
                </div>
            </div>
        </div>
        <div class="flex gap-2 mt-5">
            <button
                class="flex justify-center items-center gap-1 text-sm px-4 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
                <p class="font-semibold">Tambah</p>
            </button>
            <a href="/admin/pengaturan"
                class="flex justify-center items-center gap-1 text-sm px-5 py-2 h-max bg-slate-100 text-slate-700 border border-gray-200 rounded-lg shadow hover:bg-slate-200">
                <p class="font-semibold">Batal</p>
            </a>
        </div>
    </form>

    <script type="module" src="{{ asset('js/editor.js') }}"></script>
@endsection
