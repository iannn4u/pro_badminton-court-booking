<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <form>
        <h1 class="text-2xl font-bold">Pesan Lapangan</h1>

        <div
            class="pt-5 border-t border-gray-200 dark:border-gray-800 flex sm:flex-row flex-col sm:space-x-5 rtl:space-x-reverse">
            <div id="datepicker-inline" inline-datepicker data-date="02/25/2024"></div>
            <div
                class="sm:ms-7 sm:ps-5 sm:border-s border-gray-200 dark:border-gray-800 w-full sm:max-w-[15rem] mt-5 sm:mt-0" id="timesBook">
                <button type="button" data-collapse-toggle="timetable"
                    class="inline-flex items-center w-full py-2 px-5 me-2 justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white me-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                            clip-rule="evenodd" />
                    </svg>
                    Pick a time
                </button>
                <label class="sr-only">
                    Pick a time
                </label>
                <ul id="timetable" class="grid w-full grid-cols-2 gap-2 mt-5">
                    <li>
                        <input type="radio" id="10-am" value="" class="hidden peer" name="timetable">
                        <label for="10-am"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            10:00 AM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="10-30-am" value="" class="hidden peer" name="timetable">
                        <label for="10-30-am"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            10:30 AM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="11-am" value="" class="hidden peer" name="timetable">
                        <label for="11-am"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            11:00 AM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="11-30-am" value="" class="hidden peer" name="timetable">
                        <label for="11-30-am"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            11:30 AM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="12-am" value="" class="hidden peer" name="timetable">
                        <label for="12-am"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            12:00 AM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="12-30-pm" value="" class="hidden peer" name="timetable">
                        <label for="12-30-pm"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            12:30 PM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="1-pm" value="" class="hidden peer" name="timetable">
                        <label for="1-pm"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            01:00 PM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="1-30-pm" value="" class="hidden peer" name="timetable">
                        <label for="1-30-pm"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            01:30 PM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="2-pm" value="" class="hidden peer" name="timetable">
                        <label for="2-pm"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            02:00 PM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="2-30-pm" value="" class="hidden peer" name="timetable">
                        <label for="2-30-pm"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            02:30 PM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="3-pm" value="" class="hidden peer" name="timetable">
                        <label for="3-pm"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            03:00 PM
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="3-30-pm" value="" class="hidden peer" name="timetable">
                        <label for="3-30-pm"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-blue-600 border-blue-600 dark:hover:text-white dark:border-blue-500 dark:peer-checked:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-white peer-checked:text-white hover:bg-blue-500 dark:text-blue-500 dark:bg-gray-900 dark:hover:bg-blue-600 dark:hover:border-blue-600 dark:peer-checked:bg-blue-500">
                            03:30 PM
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mb-5">
            <label for="name_user" class="block mb-2 text-sm font-medium text-gray-900">Atas Nama</label>
            <input type="text" id="name_user" name="name_user"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required />
        </div>
    </form>

    {{-- <table>
        <tr>
            <th>1/1/2024</th>
            <th>2/1/2024</th>
            <th>3/1/2024</th>
            <th>4/1/2024</th>
            <th>5/1/2024</th>
            <th>6/1/2024</th>
            <th>7/1/2024</th>
        </tr>
        @for ($i = 0; $i < 10; $i++)
        <tr>
                <td>
                    <span class="bg-gray-200 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $i }}:00</span>
                </td>
                <td>
                    <span class="bg-green-200 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $i }}:00</span>

                </td>
            </tr>
        @endfor
    </table> --}}

    <script>
        // document.getElementById('datepicker-inline').addEventListener('click', () => {
        //     timesBook.style.display = 'none';
        // })
    </script>
</body>

</html>
