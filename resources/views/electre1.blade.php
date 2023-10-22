<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbandingan Berpasangan</title>
</head>

<body>
    <h1>3.3.1 Membentuk Perbandingan Berpasangan (X)</h1>
    <p>Jumlah Kriteria (n): {{ $n }}</p>
    <p>Jumlah Alternative (m): {{ $m }}</p>

    <table>
        <thead>
            <tr>
                <th>Alternative</th>
                @for ($i = 1; $i <= $n; $i++) <th>Kriteria {{ $i }}</th>
                    @endfor
            </tr>
        </thead>
        <tbody>
            @foreach ($X as $alternative => $criteria)
            <tr>
                <td>{{ $alternative }}</td>
                @for ($i = 0; $i < $n; $i++) <td>{{ $criteria[$i]->value }}</td>
                    @endfor
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>