@extends('admin.layouts.index')

@section('main')
    <div class="flex justify-between max-sm:pt-5">
        <h1 class="text-3xl">{{ $title }}</h1>
    </div>

    @if (count($photos_preview) == 0 && $operational->preview1 == 0 && $operational->preview1 == 0)
    @else
        @if (count($photos_preview) == 1 && $operational->preview1 == 0 && $operational->preview1 == 0)
            <div id="controls-carousel" class="relative w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/' . $photos_preview[0]) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
            </div>
        @else
            <div id="default-carousel" class="relative md:w-[80%] mx-auto max-md:p-3 rounded-3xl md:mb-10 mb-5"
                data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @if ($operational->preview1 == 1)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/imgCarousel1.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endif
                    @if ($operational->preview2 == 1)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <!-- Item 2 -->
                            <img src="{{ asset('images/imgCarousel2.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endif
                    @foreach ($photos_preview as $photo)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <!-- Item 2 -->
                            <img src="{{ asset('storage/' . $photo) }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        @endif
    @endif
    <div class="bg-white shadow-xl p-5 md:p-10">
        <div>
            <div class="mb-5">
                <label for="name_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Tempat</label>
                <input type="text" id="name_biodata" aria-label="disabled input 2" name="name_biodata"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $operational->name_biodata }}" disabled readonly>
            </div>
            <div class="mb-5 grid grid-cols-2 max-sm:grid-cols-1 gap-3 md:gap-10">
                <div>
                    <label for="address_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Tempat</label>
                    <input type="text" id="address_biodata" aria-label="disabled input 2" name="address_biodata"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $operational->address_biodata }}" disabled readonly>
                </div>
                <div>
                    <label for="link_address_biodata"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Google Maps Tempat</label>
                    <input type="text" id="link_address_biodata" aria-label="disabled input 2"
                        name="link_address_biodata"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $operational->link_address_biodata }}" disabled readonly>
                </div>
            </div>
            <div class="mb-5 grid grid-cols-2 max-sm:grid-cols-1 gap-3 md:gap-10">
                <div>
                    <label for="wa_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                        Telepon/Whatsapp</label>
                    <input type="text" id="wa_biodata" aria-label="disabled input 2" name="wa_biodata"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $operational->wa_biodata }}" disabled readonly>
                </div>
                <div>
                    <label for="link_wa_biodata" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                        Whatsapp</label>
                    <input type="text" id="link_wa_biodata" aria-label="disabled input 2" name="link_wa_biodata"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $operational->link_wa_biodata }}" disabled readonly>
                </div>
            </div>
        </div>
        <a href="/admin/pengaturan/edit/biodata"
            class="text-white bg-slate-800 hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-800 dark:hover:bg-slate-700 dark:focus:ring-slate-700 dark:border-slate-700">Edit</a>
    </div>

    <div class="bg-white shadow-xl p-5 md:p-10">
        <div class="font-normal max-lg:w-full flex flex-wrap justify-center max-md:gap-5 md:gap-10">
            @foreach ($highlights as $highlight)
                <div class="font-normal min-w-60 max-w-sm relative">
                    <a href="/admin/pengaturan/hapus/highlight/{{ $highlight->id_highlight }}"
                        class="hover:text-gray-500" onclick="return confirm('Yakin ingin hapus?')"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 absolute top-2 right-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </a>
                    <div
                        class="block w-full overflow-auto lg:max-w-sm h-[175px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                        <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900">
                            {{ $highlight->name_highlight }}</h5>
                        <p class="font-normal text-gray-700" id="element-p">
                            {!! $highlight->desc_highlight !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="/admin/pengaturan/tambah/highlight"
            class="block w-full md:w-max mt-5 max-md:text-center text-white bg-slate-800 hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-800 dark:hover:bg-slate-700 dark:focus:ring-slate-700 dark:border-slate-700">Tambah
            Highlight</a>
    </div>

    <div class="bg-white shadow-xl p-5 md:p-10">
        <div>
            <div class="mb-5 grid grid-cols-2 max-sm:grid-cols-1 gap-3 md:gap-10">
                <div>
                    <label for="username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" id="username" aria-label="disabled input 2" name="username"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ auth()->user()->username }}" disabled readonly>
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" aria-label="disabled input 2" name="password"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ auth()->user()->password }}" disabled readonly>
                </div>
            </div>
            <a href="/admin/pengaturan/edit/account"
                class="text-white bg-slate-800 hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-800 dark:hover:bg-slate-700 dark:focus:ring-slate-700 dark:border-slate-700">Edit</a>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const orderedLists = document.querySelectorAll('ol');
                const paragraphElements = document.querySelectorAll('#element-p');
                paragraphElements.forEach(p => {
                    if (p.nextElementSibling) {
                        p.nextElementSibling.classList.add('break-words');
                    }
                });

                if (orderedLists.length > 0) {
                    orderedLists.forEach(function(ol) {
                        ol.classList.add('list-disc', 'ps-5');
                    });
                }
            });
        </script>
    @endsection
