<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Student</title>
</head>
<body>
    <h1 align="center">Report Student</h1>
   <div>
    <table border="1" cellspacing="0" style="width:100%">
        <thead>
            <tr align="center">
                <th style="width:5%">No</th>
                <th style="width:23%">Student Name</th>
                <th style="width:23%">Student Age (Year)</th>
                <th style="width:23%">Birth Date</th>
                <th style="width:30%">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $content as $key => $d )
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $d->student_name }}</td>
                <td>{{ $d->student_age }}</td>
                <td>{{ $d->birth_date }}</td>
                <td>{{ $d->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
</body>
</html>
