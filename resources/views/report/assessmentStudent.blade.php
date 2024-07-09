<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .page-break {
            page-break-after: always;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        /* th {
            border: 1px solid #000;
            text-align: center;
            padding: 5px;
        }
        .td{
            border: 1px solid #000;
        } */
    </style>
    <title>Report Anak</title>
</head>
<body>


    @foreach ($contents as $contentKey => $contentData)

    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr style=" text-align: center;">
            <td><img src="{!! public_path('assets/img/logo.jpg') !!}" alt="" height="50px" width="50px"></td>
            <td style="align-content: center">
                <p>Daycare</p>
                <p>Pusat Pembelajaran Keluarga</p>
                <p>Kawasan Pusat Pemerintahan Provinsi Banten</p>
            </td>
        </tr>
    </table>
    <h1 align="center">PREESCHOL PROGRESS REPORT</h1>
    <table width="100%" border="0">
        <tr>
            <td><p style="text-align:left;">Nama    : {{ Auth::user()->student->student_name }}</p></td>
            <td><p style="text-align:right;">
                Usia    : {{ Auth::user()->student->student_age }} Tahun</p></td>
        </tr>
    </table>

        <img src="{!! public_path('storage/' .  Auth::user()->student->student_image) !!}" alt="" width="50" height="50">


    <br>
    <br>

        <div>
            <table  width="100%" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aspek Perkembangan</th>
                        <th>Penilaian</th>
                        <th>Keterangan</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contentData['data'] as $key => $d)
                        <tr>
                            <td  style="text-align: center;">{{ $key + 1 }}</td>
                            <td>{{ $d->assessment->argument }}</td>

                            <td style=" text-align: center;">
                                @if ($d->score == 1)
                                    <img src="{{ public_path('assets/img/sad.png') }}" alt="sad" width="30" height="30" class="mx-auto d-block">
                                @elseif ($d->score == 3)
                                    <img src="{{ public_path('assets/img/happiness.png') }}" alt="happiness"width="30" height="30" class="mx-auto d-block">
                                @elseif ($d->score == 5)
                                    <img src="{{ public_path('assets/img/happy.png') }}" alt="happy"width="30" height="30" class="mx-auto d-block">
                                @endif
                            </td>
                            <td>@if ($d->score == 1)
                                    Belum Berkembang (BB)
                                @elseif ($d->score == 3)
                                    Mulai Berkembang (MB)
                                @elseif ($d->score == 5)
                                   Sudah Berkembang (SB)
                                @endif
                            </td>
                            <td  style=" text-align: center;">{{ $d->score }}</td>
                        </tr>

                </tr>

                    @endforeach
                    <tr style=" text-align: center;">
                        <td colspan="4">Total</td>
                        <td >{{ $contentData['sum'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="page-break"></div>
    @endforeach
</body>
</html>
