<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tes aja</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <ul>
        @foreach ($user as $item)
            <li>
                <strong>Nama:</strong> {{ $item->name }} <br>
                <strong>Universitas:</strong> {{ $item->universitas ? $item->universitas->nama_universitas : 'Tidak ada' }}
            </li>
        @endforeach
    </ul>
</body>
</html>
