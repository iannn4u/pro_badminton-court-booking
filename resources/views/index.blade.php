<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900 font-semibold">
    <div class="bg-gray-100 h-[100%] max-w-[2040px] mx-auto md:p-10 p-5">
        <div id="controls-carousel" class="relative md:w-[80%] mx-auto" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('/images/badminton_landscape1.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{ asset('/images/badminton_landscape2.jpg') }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
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
        <div class="xl:ms-[130px] lg:ms-[105px] md:ms-[90px] my-5 lg:my-10">
            <h1 class="max-sm:text-3xl text-4xl font-bold">Gor Puja Bangsa</h1>
            <div class="mt-2 gap-1 flex flex-col max-sm:text-sm">
                <p class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Senin - Minggu: 08.00 - 23.00</span>
                </p>
                <a href="https://maps.app.goo.gl/A4VPuoEW1NM7LHgt6"
                    class="flex gap-2 underline hover:text-green-600 w-max max-sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span>Jl. Setia Budi, Karangasih, Kec. Cikarang Utara, <br>Kabupaten Bekasi, Jawa Barat
                        17530</span>
                </a>
                <a href="" class="flex gap-2 underline hover:text-green-600 w-max max-sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 ms-0.5" viewBox="0 0 448 512">
                        <path
                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                    </svg>
                    <span class="ms-0.5">0812 3456 7891</span>
                </a>
            </div>
        </div>
        <div class="bg-gray-300 md:w-[80%] mx-auto h-0.5"></div>
        <div class="md:ms-[30px] my-10">
            <h2 class="text-2xl md:text-3xl font-bold text-center">Highlights</h2>
            <div class="flex flex-wrap justify-between items-center">
                <div class="font-normal mt-5 max-lg:w-full">
                    <div
                        class="block w-full lg:max-w-sm h-[175px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Fasilitas</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            - 3 lapangan kayu <br>
                            - Kamar mandi dan musholla <br>
                            - kantin <br></p>
                    </div>
                </div>
                <div class="font-normal mt-5 max-lg:w-full">
                    <div
                        class="block lg:max-w-sm h-[175px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Harga Sewa</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            - 1 jam: Rp. 50.000 <br>
                            - 3 jam: Rp. 120.000 <br>
                            - Hubungi Whatsapp untuk member <br></p>
                    </div>
                </div>
                <div class="font-normal mt-5 max-lg:w-full">
                    <div
                        class="block lg:max-w-sm h-[175px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Review Lapangan
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            - <a href="https://www.instagram.com/reel/"
                                class="underline hover:text-green-600">https://www.instagram.com/reel/</a> <br>
                            - <a href="https://www.instagram.com/reel/"
                                class="underline hover:text-green-600">https://www.instagram.com/reel/</a> <br>
                    </div>
                </div>
                <div class="font-normal mt-5 max-lg:w-full">
                    <div
                        class="block lg:max-w-sm h-[175px] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Booking Policy
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            - Untuk mendapatkan MEMBER, silakan hubungi Admin via whatsapp <a href="0812 3456 7891"
                                class="underline hover:text-green-600">0812 3456
                                7891</a> <br>
                            - DP harus dibayar dalam waktu 30 menit setelah booking. <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-300 md:w-[80%] mx-auto h-0.5"></div>
        <div class="lg:ms-[130px] my-20 lg:max-w-[81%]">
            <div class="flex gap-5">
                <h2 class="text-2xl font-bold flex gap-2 items-center"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    Schedule</h2>
                <form class="max-w-sm shadow-md">
                    <select id="filter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="week">Week</option>
                        <option value="day">Day</option>
                    </select>
                </form>
            </div>
            <div>
                <div class="week">
                    <div class="flex justify-between gap-2 mt-10">
                        @foreach ($date as $day)
                            <p class="text-center w-full flex max-sm:flex-col md:gap-2 justify-center">
                                <span>{{ $day['day'] }}</span><span>{{ $day['date'] }}</span>
                            </p>
                        @endforeach
                    </div>
                    <div class="flex justify-between mt-2 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">8.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">8.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">8.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">8.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">8.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">8.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">8.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">9.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">9.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">9.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">9.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">9.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">9.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">9.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">10.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">10.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">10.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">10.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">10.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">10.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">10.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">11.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">11.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">11.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">11.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">11.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">11.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">11.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">12.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">12.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">12.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">12.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">12.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">12.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">12.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">13.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">13.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">13.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">13.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">13.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">13.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">13.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">14.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">14.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">14.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">14.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">14.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">14.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">14.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">15.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">15.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">15.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">15.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">15.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">15.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">15.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">16.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">16.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">16.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">16.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">16.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">16.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">16.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">17.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">17.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">17.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">17.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">17.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">17.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">17.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">18.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">18.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">18.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">18.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">18.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">18.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">18.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">19.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">19.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">19.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">19.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">19.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">19.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">19.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">20.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">20.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">20.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">20.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">20.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">20.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">20.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">21.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">21.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">21.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">21.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">21.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">21.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">21.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">22.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">22.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">22.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">22.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">22.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">22.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">22.00</a>
                    </div>
                    <div class="flex justify-between mt-1 gap-2">
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">23.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">23.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">23.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">23.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">23.00</a>
                        <a href=""
                            class="text-center bg-gray-200 w-full py-1 rounded-md text-gray-500">23.00</a>
                        <a href="" class="text-center bg-green-200 w-full py-1 rounded-md">23.00</a>
                    </div>
                </div>
                <div class="today w-full max-w-4xl bg-white shadow-md rounded-lg max-sm:p-3 p-6 mt-5 mx-auto">
                    <div class="">
                        <table class="w-full text-sm text-center">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">JAM</th>
                                    @foreach ($courts as $court)
                                        <th scope="col" class="px-6 py-3">{{ $court['name_court'] }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">08:00</th>
                                    <td class="px-6 py-4 bg-green-200 rounded">John Doe</td>
                                    <td class="px-6 py-4 bg-gray-100 italic text-gray-500">Available</td>
                                    <td class="px-6 py-4 bg-green-200 rounded">Mike Tyson</td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">09:00</th>
                                    <td class="px-6 py-4 bg-gray-100 italic text-gray-500">Available</td>
                                    <td class="px-6 py-4 bg-green-200 rounded">Jessica</td>
                                    <td class="px-6 py-4 bg-gray-100 italic text-gray-500">Available</td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">10:00</th>
                                    <td class="px-6 py-4 bg-gray-100 italic text-gray-500">Available</td>
                                    <td class="px-6 py-4 bg-gray-100 italic text-gray-500">Available</td>
                                    <td class="px-6 py-4 bg-green-200 rounded">Sarah</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="mt-5 ms-5 status">
                <a href="" class="text-center bg-green-200 p-2 rounded-md">Tersedia</a>
                <a href="" class="text-center bg-gray-200 p-2 rounded-md">Tidak Tersedia</a>
            </div>
        </div>
    </div>
    <footer class="bg-gray-300 text-center py-5 h-[100%] max-w-[2040px] mx-auto p-10">
        <h1>Make with love❤️</h1>
    </footer>

    <script>
        const filterSchedule = document.getElementById('filter');
        const week = document.querySelector('.week');
        const today = document.querySelector('.today');
        const status = document.querySelector('.status');
        today.style.display = 'none';

        filterSchedule.addEventListener('change', function(e) {
            e.preventDefault();

            if (filterSchedule.value == 'day') {
                today.style.display = 'block';
                week.style.display = 'none';
                status.style.display = 'none';
            } else if (filterSchedule.value == 'week') {
                week.style.display = 'block';
                today.style.display = 'none';
                status.style.display = 'block';
            }
        });
    </script>
</body>

</html>
