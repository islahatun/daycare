<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Teacher</title>
</head>
<body>
    <h1 align="center">Report Teacher</h1>
   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:23%">Deskripsi</th>
                <th style="width:23%">Kurang Baik</th>
                <th style="width:23%">Baik</th>
                <th style="width:30%">Sangat Baik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $data as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->assessment->argument }}</td>
                <td>
                <label for="sad" {{ $d->score == 1? "style=='filter: grayscale(0)'":"style=='filter: grayscale(1)'" }}>
                    <img src="{!! asset('assets/img/sad.png')!!}" alt="sad" width="50" height="50" class="mx-auto d-block">
                </label>
                </td>
                <td>
                <label for="sad" {{ $d->score == 3? "style=='filter: grayscale(0)'":"style=='filter: grayscale(1)'" }>
                    <img src="{!! asset('assets/img/happiness.png')!!}" alt="sad" width="50" height="50" class="mx-auto d-block">
                </label>
                </td>
                <td>
                <label for="sad" {{ $d->score == 1? "style=='filter: grayscale(0)'":"style=='filter: grayscale(1)'" }>
                    <img src="{!! asset('assets/img/happy.png')!!}" alt="sad" width="50" height="50" class="mx-auto d-block">
                </label>
                </td>
                <td>{{ $d->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
</body>
</html>
