@extends('layouts.main')
@section('container')
<div id="section1">
    @php $i = 0; @endphp
    <div class="mt-3 mb-3">
        <h4 class="mb-3">Data Awal</h4>
        <table class="table table-striped text-center" border="1">
            <tr>
                <td></td>
                @foreach($criterias as $c)
                <td>{{ $c }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Bobot (K)</td>
                @foreach($weights as $w)
                <td>{{ $w }}</td>
                @endforeach
            </tr>
            @foreach($values as $row)
            <tr>
                <td>{{ $alternatives[$i++] }}</td>
                @foreach($row as $value)
                <td>{{ $value }}</td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
    <div class="mb-3">
        @php $i = 0; @endphp
        <h4 class="mb-3">Hasil Normalisasi</h4>
        <table class="table table-striped text-center" border="1">
            <tr>
                <td></td>
                @foreach($criterias as $c)
                <td>{{ $c }}</td>
                @endforeach
            </tr>
            @foreach($normalizations as $row)
            <tr>
                <td>{{ $alternatives[$i++] }}</td>
                @foreach($row as $norm)
                <td>{{ $norm }}</td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
    <div class="mb-3">
        @php $i = 0; @endphp
        <h4 class="mb-3">Hasil Matriks Preferensi</h4>
        <table class="table table-striped text-center" border="1">
            <tr>
                <td></td>
                @foreach($criterias as $c)
                <td>{{ $c }}</td>
                @endforeach
            </tr>
            @foreach($preferenceMatrix as $row)
            <tr>
                <td>{{ $alternatives[$i++] }}</td>
                @foreach($row as $pref)
                <td>{{ $pref }}</td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div id="section2">
    <div class="mb-3">
        <h4>Concordance Index</h4>
        <table class="table table-striped text-center" border="1">
            
            @for($i = 0; $i <= count($concordanceIndex); $i++)

                @for($j = 0; $j <= count($concordanceIndex[0]); $j++)
                    @if($j++ == $i)
                    <tr><td>C<sub>{{ $i + 1 . ", " . $j + 1 }}</sub></td><td>
                    @else
                        <td>C<sub>{{ $i + 1 . ", " . $j}}</sub></td><td>
                    @endif
                    
                    @for($k = 0; $k < 5; $k++)
                        @if(isset($concordanceIndex[$i][$j][$k]))
                       {{ "$concordanceIndex[$i][$j][$k] " }}
                       @endif
                    @endfor
                    </td>
                </tr>
                @endfor
            
                @endfor           
            
        </table>
    </div>
</div>

@endsection