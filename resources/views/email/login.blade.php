<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>Dengan Hormat,</div>
    <br>
    <p>Terimakasih telah dilakukan pendaftaran pada taggal 22 Maret 2024 atas nama Saudara {{ $detail['name'] }}. Berikut email dan password untuk melakukan login </p>
    <br>
    <table>
        <tr>
            <td>E-Mail</td>
            <td>:</td>
            <td>{{ $detail['email'] }}</td>
        </tr>
        <tr>
            <td>password</td>
            <td>:</td>
            <td>{{ $detail['password'] }}</td>
        </tr>
    </table>
    <p>Teriamakasih</p>
    <br>
    <br>
    <p>Day Care</p>
    <br>
    <br>
    <br>

</body>
</html>
