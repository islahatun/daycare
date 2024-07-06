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
    <title>Report Teacher</title>
</head>
<body>
    <table border="1" cellspacing="0" style="width:100%">
        <tr style="text-align: center">
            <td>
                <center>
                    <img src="{!! public_path('assets/img/logo.jpg') !!}" alt="" height="50px" width="50px">
                </center>
               </td>
            <td style="text-align: center">
                <p>Daycare</p>
                <p>Pusat Pembelajaran Keluarga</p>
                <p>Kawasan Pusat Pemerintahan Provinsi Banten</p>
            </td>
        </tr>
    </table>
    <h1 align="center">Report Teacher</h1>
   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:23%">Teacher Name</th>
                <th style="width:23%">Telp</th>
                <th style="width:23%">Birth Date</th>
                <th style="width:30%">Gradulation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->teacher_name }}</td>
                <td>{{ $d->telp }}</td>
                <td>{{ $d->birth_date }}</td>
                <td>{{ $d->graduate_of }}-{{ $d->major }},{{ $d->university}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
</body>
</html>
