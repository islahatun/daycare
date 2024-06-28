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


    @foreach ($contents as $contentKey => $contentData)

    <table>
        <tr>
            <td><img src="{!! public_path('assets/img/logo.jpg') !!}" alt="" height="50px" width="50px"></td>
            <td> PUSPAGA PROVINSI BANTEN</td>
        </tr>
    </table>
    <h1 align="center">Report Anak</h1>
    <h3>{{ Auth::user()->student->student_name }}</h3>
    
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

                            <td>
                                @if ($d->score == 1)
                                    <img src="{{ public_path('assets/img/sad.png') }}" alt="sad" width="50" height="50" class="mx-auto d-block">
                                @elseif ($d->score == 3)
                                    <img src="{{ public_path('assets/img/happiness.png') }}" alt="happiness" width="50" height="50" class="mx-auto d-block">
                                @elseif ($d->score == 5)
                                    <img src="{{ public_path('assets/img/happy.png') }}" alt="happy" width="50" height="50" class="mx-auto d-block">
                                @endif
                            </td>
                            <td>{{ $d->score }}</td>
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
