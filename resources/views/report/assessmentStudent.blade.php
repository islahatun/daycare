<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .page-break {
            page-break-after: always;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            text-align: center;
            padding: 5px;
        }
    </style>
    <title>Report Anak</title>
</head>
<body>
    <h1 align="center">Report Anak</h1>
    <h3>{{ Auth::user()->student->student_name }}</h3>

    @foreach ($contents as $contentKey => $contentData)
        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Penilaian</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contentData['data'] as $key => $d)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $d->assessment->argument }}</td>
                           <td>{{ $d->score }}</td>
                            <td>@if ($d->score == 1)
                                Kurang Baik
                                @elseif ($d->score == 3)
                                Baik
                                @elseif ($d->score == 5)
                                Sanagat Baik
                            @endif</td>
                        </tr>

                    @endforeach
                    <tr>
                        <td colspan="3">Total</td>
                        <td>{{ $contentData['sum'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="page-break"></div>
    @endforeach
</body>
</html>
