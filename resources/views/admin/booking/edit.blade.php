@extends('admin.layouts.index')

@section('main')
    <h1 class="text-3xl">{{ $title }}</h1>

    <form action="/admin/booking/edit/{{ $booking->id_booking }}" method="post" class="max-w-xl mt-10 space-y-5">
        @method("put")
        @csrf
        <div>
            <label for="name_booking" class="block mb-2 text-sm font-medium text-slate-900">Nama Booking</label>
            <input type="text" id="name_booking" name="name_booking" value="{{ old('name_booking', $booking->name_booking) }}"
                class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500">
        </div>
        <div class="flex gap-10">
            <div>
                <label for="date_booking" class="block mb-2 text-sm font-medium text-slate-900">Tanggal Booking</label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="date_booking" type="date" name="date_booking"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full ps-10 p-2.5"
                        placeholder="Select date" autocomplete="off">
                </div>
            </div>
            <div>
                <h2 class="block mb-2 text-sm font-medium text-slate-900">Lapangan Booking</h2>
                <div id="lapangan-options" class="opacity-50 pointer-events-none">
                    @if (!$courts->isEmpty())
                        @foreach ($courts as $court)
                            <div class="flex items-center mb-4">
                                <input id="{{ $court->name_court }}" type="radio" value="{{ $court->name_court }}"
                                    onclick="cekJadwal('{{ $court->name_court }}', '{{ $incrementOpen }}', '{{ $incrementClose }}')"
                                    name="court_booking"
                                    class="w-4 h-4 text-slate-600 bg-gray-100 border-gray-300 focus:ring-slate-500">
                                <label for="{{ $court->name_court }}"
                                    class="ms-2 text-sm font-medium text-gray-900">{{ $court->name_court }}</label>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center mb-4">
                            <label for="lapangan3" class="text-sm font-medium text-slate-900 italic">- Belum ada data
                                lapangan</label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="sm:flex-row flex-col">
            <h2 class="block mb-2 text-sm font-medium text-slate-900">Jam
                Booking</h2>
            <ul id="timetable" class="grid w-full grid-cols-3 gap-2 mt-2">
                @for ($i = $incrementOpen; $i < $incrementClose; $i++)
                    <li>
                        <input type="checkbox" id="{{ $i }}.00 - {{ $i + 1 }}.00" name="time_booking[]"
                            value="{{ $i }}.00 - {{ $i + 1 }}.00" class="hidden peer" disabled>
                        <label for="{{ $i }}.00 - {{ $i + 1 }}.00"
                            class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-not-allowed text-slate-600 border-slate-600 peer-checked:border-slate-600 hover:text-white peer-checked:text-white hover:bg-slate-500 peer-checked:bg-slate-700">
                            {{ ($i < 10 ? '0' . $i . '.00' : $i . '.00') . ' - ' . ($i + 1 < 10 ? '0' . ($i + 1) . '.00' : $i + 1 . '.00') }}
                        </label>
                    </li>
                @endfor
            </ul>
        </div>
        <div class="flex gap-2">
            <button
                class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
                <p class="font-semibold">Edit</p>
            </button>
            <a href="/admin/booking/"
                class="flex justify-center items-center gap-1 text-sm px-5 py-2 h-max bg-slate-100 text-slate-700 border border-gray-200 rounded-lg shadow hover:bg-slate-200">
                <p class="font-semibold">Batal</p>
            </a>
        </div>
    </form>

    <script>
        const inputTanggal = document.querySelector("#date_booking");
        const lapanganOptions = document.querySelector("#lapangan-options");
        const lapanganInputs = document.querySelectorAll("input[name='court_booking']");
        let tanggal;

        inputTanggal.addEventListener("change", () => {
            tanggal = inputTanggal.value;

            if (tanggal) {
                lapanganOptions.classList.remove("opacity-50", "pointer-events-none");

                lapanganInputs.forEach(input => {
                    input.checked = false;
                });
            } else {
                lapanganOptions.classList.add("opacity-50", "pointer-events-none");
            }
        });

        function cekJadwal(inputLapangan, incrementOpen, incrementClose) {
            let result;
            incrementOpen = parseInt(incrementOpen)
            incrementClose = parseInt(incrementClose)
            console.log(inputLapangan, tanggal)

            fetch(`/booking/cekSlot`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        court_booking: inputLapangan,
                        date_booking: tanggal
                    })
                })
                .then((response) => response.json())
                .then((data) => {
                    const bodyTemplate = document.querySelector("#timetable");
                    const bookedSlots = data.data[0]; // Data dari database
                    let htmlContent = '';

                    for (let i = incrementOpen; i < incrementClose; i++) {
                        let timeSlot = (i < 10 ? '0' + i + '.00' : i + '.00') + ' - ' + (i + 1 < 10 ? '0' + (i + 1) +
                            '.00' : i + 1 + '.00');
                        const isBooked = bookedSlots.includes(timeSlot); // Periksa apakah timeSlot ada di bookedSlots

                        htmlContent += `
                        <li>
                            <input type="checkbox" id="${timeSlot}" name="time_booking[]"
                                value="${timeSlot}" class="hidden peer" ${isBooked ? 'disabled' : ''}>
                            <label for="${timeSlot}"
                                class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer ${
                                    isBooked
                                        ? 'bg-gray-400/30 text-gray-600 border-gray-400 cursor-not-allowed'
                                        : 'text-slate-600 border-slate-600 cursor-pointer peer-checked:border-slate-600 hover:text-white peer-checked:text-white hover:bg-slate-500 peer-checked:bg-slate-700'
                                }">
                                ${timeSlot}
                            </label>
                        </li>`;
                    }

                    bodyTemplate.innerHTML = htmlContent;
                });
            tch((e) => console.error(e));
        }
    </script>
@endsection
