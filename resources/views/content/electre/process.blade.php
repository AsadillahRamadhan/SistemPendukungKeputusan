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
    <div class="d-flex justify-content-end">
        <button class="btn btn-secondary" type="button" onclick="next(1)">Next</button>
    </div>
</div>
<div id="section2" class="d-none">
    <div class="mb-3">
        <h4>Concordance Index</h4>
        <table class="table table-striped text-center" border="1">
            
            @for($i = 0; $i <= count($concordanceIndex); $i++)
                
                @for($j = 0; $j <= count($concordanceIndex[0]); $j++)
                    @if(isset($concordanceIndex[$i][$j]))
                        <tr><td>C<sub>{{ $i + 1 . ", " . $j + 1 }}</sub></td>
                    @endif

                    @if(isset($concordanceIndex[$i][$j]))
                        <td>{{ '{' }}
                        
                        @for($k = 0; $k <= count($concordanceIndex); $k++)
                        
                        @if(isset($concordanceIndex[$i][$j][$k]))
                        {{ $concordanceIndex[$i][$j][$k] + 1 . ' ' }}
                        @endif
                        
                        @endfor
                        {{ '}' }}</td>
                    @endif
                @endfor
                </tr>
            @endfor           
            
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-secondary mr-2" type="button" onclick="back(2)">Back</button>
        <button class="btn btn-secondary" type="button" onclick="next(2)">Next</button>
    </div>
</div>
<div id="section3" class="d-none">
    <div class="mb-3">
        <h4>Discordance Index</h4>
        <table class="table table-striped text-center" border="1">
            
            @for($i = 0; $i <= count($discordanceIndex); $i++)
                
                @for($j = 0; $j <= count($discordanceIndex[0]); $j++)
                    @if(isset($discordanceIndex[$i][$j]))
                        <tr><td>C<sub>{{ $i + 1 . ", " . $j + 1 }}</sub></td>
                    @endif

                    @if(isset($discordanceIndex[$i][$j]))
                        <td>{{ '{' }}
                        
                        @for($k = 0; $k <= count($discordanceIndex); $k++)
                        
                        @if(isset($discordanceIndex[$i][$j][$k]))
                        {{ $discordanceIndex[$i][$j][$k] + 1 . ' ' }}
                        @endif
                        
                        @endfor
                        {{ '}' }}</td>
                    @endif
                @endfor
                </tr>
            @endfor           
            
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-secondary mr-2" type="button" onclick="back(3)">Back</button>
        <button class="btn btn-secondary" type="button" onclick="next(3)">Next</button>
    </div>
</div>
<div id="section4" class="d-none">
    <div class="mb-3">
        <h4>Concordance Matrix</h4>
        <table class="table table-striped text-center" border="1">
            @foreach($concordanceMatrix as $cm)
                <tr>
                @for($i = 0; $i <= count($cm); $i++)
                <td>{{ isset($cm[$i]) ? $cm[$i] : "-" }}</td>
                @endfor
                </tr>
            @endforeach
        </table>
        <h4>Discordance Matrix</h4>
        <table class="table table-striped text-center" border="1">
            @foreach($discordanceMatrix as $dm)
                <tr>
                @for($i = 0; $i <= count($dm); $i++)
                @if(isset($dm[$i]))
                    @if($dm[$i] == 1 || $dm[$i] == 0)
                        <td>{{ $dm[$i] }}</td>
                    @else
                        <td>{{ number_format($dm[$i], 4) }}</td>
                    @endif
                @else
                    <td>-</td>
                @endif
                @endfor
                </tr>
            @endforeach
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-secondary mr-2" type="button" onclick="back(4)">Back</button>
        <button class="btn btn-secondary" type="button" onclick="next(4)">Next</button>
    </div>
</div>
<div id="section5" class="d-none">
    <div class="mb-3">
        <h4>Concordance Dominant</h4>
        <table class="table table-striped text-center" border="1">
            @foreach($concordanceDominant as $cd)
                <tr>
                    @for($i = 0; $i <= count($concordanceDominant[0]); $i++)
                        <td>{{ isset($cd[$i]) ? $cd[$i] : '-' }}</td>
                    @endfor
                </tr>
            @endforeach
        </table>
        <h4>Discordance Dominant</h4>
        <table class="table table-striped text-center" border="1">
            @foreach($discordanceDominant as $dd)
                <tr>
                    @for($i = 0; $i <= count($discordanceDominant[0]); $i++)
                        <td>{{ isset($dd[$i]) ? $dd[$i] : '-' }}</td>
                    @endfor
                </tr>
            @endforeach
        </table>
        <h4>Agregation Dominant</h4>
        <table class="table table-striped text-center" border="1">
            @foreach($agregationDominant as $ad)
                <tr>
                    @for($i = 0; $i <= count($agregationDominant[0]); $i++)
                        <td>{{ isset($ad[$i]) ? $ad[$i] : '-' }}</td>
                    @endfor
                </tr>
            @endforeach
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-secondary mr-2" type="button" onclick="back(5)">Back</button>
    </div>
</div>
<script>
    function next(section){
        document.querySelector('#section' + section).classList.add('d-none');
        document.querySelector('#section' + parseInt(section + 1)).classList.remove('d-none');
    }

    function back(section){
        document.querySelector('#section' + section).classList.add('d-none');
        document.querySelector('#section' + parseInt(section - 1)).classList.remove('d-none');
    }
</script>
@endsection