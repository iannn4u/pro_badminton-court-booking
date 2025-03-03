<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Tambahkan CSRF Token Laravel -->
    <style>
        html {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .option {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #ddd;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan Website Gor Puja Bangsa</h1>
        <div class="option">
            <button class="no-print" onclick="window.print()">Cetak Laporan</button>
            <select id="months" class="no-print">
                <option selected disabled value="">Pilih bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <select id="years" class="no-print">
                <option selected disabled value="">Pilih tahun</option>
            </select>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody id="reportTable">
                <tr>
                    <td>Jumlah Kunjungan/Pesanan</td>
                    <td id="total_visits">-</td>
                </tr>
                <tr>
                    <td>Jumlah Member Baru</td>
                    <td id="new_members">-</td>
                </tr>
                <tr>
                    <td>Total Income</td>
                    <td id="total_income">-</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        const yearSelect = document.getElementById('years');
        const monthSelect = document.getElementById('months');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const startYear = 2025;
        const currentYear = new Date().getFullYear();

        for (let year = startYear; year <= currentYear; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }

        async function fetchReport() {
            const selectedMonth = monthSelect.value;
            const selectedYear = yearSelect.value;

            if (!selectedMonth || !selectedYear) return;

            try {
                const response = await fetch('/report/detail', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        month: selectedMonth,
                        year: selectedYear
                    })
                });

                const data = await response.json();

                // Perbarui tabel dengan data dari server
                document.getElementById('total_visits').textContent = data.kunjungan ?? '-';
                document.getElementById('new_members').textContent = data.member ?? '-';
                document.getElementById('total_income').textContent = data.income ?
                    `Rp ${data.income.toLocaleString()}` : '-';

            } catch (error) {
                console.error('Error fetching report:', error);
            }
        }

        yearSelect.addEventListener("change", fetchReport);
        monthSelect.addEventListener("change", fetchReport);
    </script>
</body>

</html>
