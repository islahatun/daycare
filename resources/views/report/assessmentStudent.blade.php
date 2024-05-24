<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <title>Report Anak</title>
</head>
<body>
    <h1 align="center">Report Anak</h1>
   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:10%">Deskripsi</th>
                <th style="width:10%">Kurang Baik</th>
                <th style="width:10%">Baik</th>
                <th style="width:10%">Sangat Baik</th>
                <th style="width:10%">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content1 as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->assessment->argument }}</td>
                <td>
                    <label for="sad" style="{{ $d->score == 1 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/sad.png') }}" alt="sad" width="30" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="happy" style="{{ $d->score == 3 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happiness.png') }}" alt="happy" width="30" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="very_happy" style="{{ $d->score == 5 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happy.png') }}" alt="very happy" width="30" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>{{ $d->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>

   <div class="page-break"></div>

   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:10%">Deskripsi</th>
                <th style="width:10%">Kurang Baik</th>
                <th style="width:10%">Baik</th>
                <th style="width:10%">Sangat Baik</th>
                <th style="width:10%">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content2 as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->assessment->argument }}</td>
                <td>
                    <label for="sad" style="{{ $d->score == 1 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/sad.png') }}" alt="sad" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="happy" style="{{ $d->score == 3 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happiness.png') }}" alt="happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="very_happy" style="{{ $d->score == 5 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happy.png') }}" alt="very happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>{{ $d->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>

   <div class="page-break"></div>

   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:10%">Deskripsi</th>
                <th style="width:10%">Kurang Baik</th>
                <th style="width:10%">Baik</th>
                <th style="width:10%">Sangat Baik</th>
                <th style="width:10%">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content3 as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->assessment->argument }}</td>
                <td>
                    <label for="sad" style="{{ $d->score == 1 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/sad.png') }}" alt="sad" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="happy" style="{{ $d->score == 3 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happiness.png') }}" alt="happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="very_happy" style="{{ $d->score == 5 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happy.png') }}" alt="very happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>{{ $d->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>

   <div class="page-break"></div>

   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:10%">Deskripsi</th>
                <th style="width:10%">Kurang Baik</th>
                <th style="width:10%">Baik</th>
                <th style="width:10%">Sangat Baik</th>
                <th style="width:10%">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content4 as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->assessment->argument }}</td>
                <td>
                    <label for="sad" style="{{ $d->score == 1 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/sad.png') }}" alt="sad" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="happy" style="{{ $d->score == 3 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happiness.png') }}" alt="happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="very_happy" style="{{ $d->score == 5 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happy.png') }}" alt="very happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>{{ $d->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>

   <div class="page-break"></div>

   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:10%">Deskripsi</th>
                <th style="width:10%">Kurang Baik</th>
                <th style="width:10%">Baik</th>
                <th style="width:10%">Sangat Baik</th>
                <th style="width:10%">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content5 as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->assessment->argument }}</td>
                <td>
                    <label for="sad" style="{{ $d->score == 1 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/sad.png') }}" alt="sad" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="happy" style="{{ $d->score == 3 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happiness.png') }}" alt="happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="very_happy" style="{{ $d->score == 5 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happy.png') }}" alt="very happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>{{ $d->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>

   <div class="page-break"></div>

   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:10%">Deskripsi</th>
                <th style="width:10%">Kurang Baik</th>
                <th style="width:10%">Baik</th>
                <th style="width:10%">Sangat Baik</th>
                <th style="width:10%">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content6 as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->assessment->argument }}</td>
                <td>
                    <label for="sad" style="{{ $d->score == 1 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/sad.png') }}" alt="sad" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="happy" style="{{ $d->score == 3 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happiness.png') }}" alt="happy" width="10" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>
                    <label for="very_happy" style="{{ $d->score == 5 ? 'filter: grayscale(0)' : 'filter: grayscale(1)' }}">
                        <img src="{{ asset('assets/img/happy.png') }}" alt="very happy" width="30" height="30" class="mx-auto d-block">
                    </label>
                </td>
                <td>{{ $d->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>

   <div class="page-break"></div>
</body>
</html>
