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
    <p>Terimakasih telah dilakukan pendaftaran pada taggal 22 Maret 2024 atas nama Saudara {{ $detail['name'] }}, silahkan melakukan pembayaran sebesar Rp 3.000.000; dengan rincian yang sudah di jelaskan di aplikasi day care dan lakukan registrasi ulang dengan menekan tombol di bawah ini sebelum tanggal 1 April 2024 </p>
    <br>
    <p>Teriamakasih</p>
    <br>
    <br>
    <p>Day Care</p>
    <br>
    <br>
    <br>
    <a href="{{ url('/re-registration/' . $detail['id']) }}"><button>Register</button>
    </a>

</body>
</html>
