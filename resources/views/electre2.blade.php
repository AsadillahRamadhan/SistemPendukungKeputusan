<h1>.3.2. Membuat Matriks Perbandingan Berpasangan Ternormalisasi (R)</h1>
<p>Jumlah Kriteria (n): {{ $n }}</p>
<p>Jumlah Alternative (m): {{ $m }}</p>

<h2>Data Perbandingan Berpasangan X</h2>
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

<h2>Nilai Rata-rata Kuadrat Per-Kriteria</h2>
<ul>
    @for ($i = 0; $i < $n; $i++) <li>Kriteria {{ $i+1 }}: {{ $x_rata[$i] }}</li>
        @endfor
</ul>

<h2>Matriks R (Hasil Normalisasi)</h2>
<table>
    <thead>
        <tr>
            <th>Alternative</th>
            @for ($i = 1; $i <= $n; $i++)
                <th style="padding: 5px;">Kriteria {{ $i }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach ($R as $alternative => $criteria)
            <tr>
                <td>{{ $alternative }}</td>
                @for ($i = 0; $i < $n; $i++)
                    <td style="padding: 5px;">{{ $criteria[$i] }}</td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>
