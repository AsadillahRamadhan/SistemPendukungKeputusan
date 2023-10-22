<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bobot Kriteria</title>
</head>
<body>
<h2>Menentukan Bobot tiap-tiap Kriteria (W)</h2>
<table>
    <thead>
        <tr>
            <th>Kriteria</th>
            <th>Bobot</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($criteria as $kriteria => $bobot)
            <tr>
                <td style="padding: 5px;">Kriteria {{ $kriteria }}</td>
                <td style="padding: 5px;">{{ $bobot }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>