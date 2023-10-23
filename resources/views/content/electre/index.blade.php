@extends('layouts.main')
@section('container')
<div class="mb-3 mt-2">
    <label for="">Masukkan Jumlah Kriteria</label>
    <input type="number" class="form-control" id="kriteria">
</div>
<div class="mb-3">
    <label for="">Masukkan Jumlah Alternatif</label>
    <input type="number" class="form-control" id="alternatif">
</div>
<div class="mb-3">
    <button class="btn btn-secondary" onclick="tambahTabel()">Cetak Tabel</button>
</div>
<div class="mb-3 d-none">
    <form action="/electre" method="post">
        @csrf
        <table class="table table-striped text-center" border="1">
            <tbody id="table" class="mb-3">
            </tbody>
        </table>
        <button class="btn btn-secondary" type="submit">Hitung</button>
    </form>
</div>
<script>
    @if(isset($alternatives))
    document.querySelector('#kriteria').value = {{ count($criterias) }}
    document.querySelector('#alternatif').value = {{ count($alternatives) }}
    @php
    $bobot = 0;
    $kriteria = 0;
    $alternatif = 0;
    @endphp
    loadTabel()
    @endif
    function loadTabel(){
        jumlah_kriteria = document.querySelector('#kriteria').value
        jumlah_alternatif = parseInt(document.querySelector('#alternatif').value) + 1
        syntax = ''
        document.querySelector('#table').innerHTML = ''
        alternatif = 1
        kriteria = 1
        bobot = 1
        document.getElementByN
        for(let i = 0; i <= jumlah_alternatif; i++){
            syntax += "<tr>"
            for(let j = 0; j <= jumlah_kriteria; j++){
                if(j == 0 && i == 1){
                    syntax += `<td class="d-flex align-items-center justify-content-center">Bobot</td>`
                } else {
                    if(i == 0 && j == 0){
                        syntax += `<td></td>`
                    } else {
                        if(j == 0){
                            syntax += `<td><input type="text" id="a${alternatif - 1}" class="form-control text-center" name="alternatives[]" placeholder="A${alternatif}"></td>`
                            alternatif++
                        } else if (i == 0){
                            syntax += `<td><input type="text" id="c${kriteria - 1}" class="form-control text-center" name="criterias[]" placeholder="C${kriteria}"></td>`
                            kriteria++
                        } else if (i == 1){
                            syntax += `<td><input type="number" id="w${bobot - 1}" class="form-control text-center" name="weights[]" placeholder="C${bobot} (W)"></td>`
                            bobot++
                        } else {
                            syntax += `<td><input type="number" id="v${i - 2}${j - 1}" class="form-control text-center" name="values[${i - 2}][${j - 1}]" placeholder="(${i-1}, ${j})"></td>`
                        }
                        
                        
                    }
                }
                
            }
            syntax += "</tr>"
        }
        document.querySelector('#table').innerHTML += syntax
        @for($i = 0; $i < count($alternatives); $i++)
        document.querySelector("#a{{ $i }}").setAttribute('value', "{{ $alternatives[$i] }}")
        @endfor
        @for($i = 0; $i < count($criterias); $i++)
        document.querySelector("#c{{ $i }}").setAttribute('value', "{{ $criterias[$i] }}")
        @endfor
        @for($i = 0; $i < count($weights); $i++)
        document.querySelector("#w{{ $i }}").setAttribute('value', "{{ $weights[$i] }}")
        @endfor
        @for($i = 0; $i < count($values); $i++)
        @for($j = 0; $j < count($values[0]); $j++)
        document.querySelector("#v{{ $i }}{{ $j }}").setAttribute('value', {{ $values[$i][$j] }})
        @endfor
        @endfor
        document.querySelector('.d-none').classList.remove('d-none')
    }
    function tambahTabel(){
        jumlah_kriteria = document.querySelector('#kriteria').value
        jumlah_alternatif = parseInt(document.querySelector('#alternatif').value) + 1
        syntax = ''
        document.querySelector('#table').innerHTML = ''
        alternatif = 1
        kriteria = 1
        bobot = 1
        for(let i = 0; i <= jumlah_alternatif; i++){
            syntax += "<tr>"
            for(let j = 0; j <= jumlah_kriteria; j++){
                if(j == 0 && i == 1){
                    syntax += `<td class="d-flex align-items-center justify-content-center">Bobot</td>`
                } else {
                    if(i == 0 && j == 0){
                        syntax += `<td></td>`
                    } else {
                        if(j == 0){
                            syntax += `<td><input type="text" class="form-control text-center" name="alternatives[]" placeholder="A${alternatif}"></td>`
                            alternatif++
                        } else if (i == 0){
                            syntax += `<td><input type="text" class="form-control text-center" name="criterias[]" placeholder="C${kriteria}"></td>`
                            kriteria++
                        } else if (i == 1){
                            syntax += `<td><input type="number" class="form-control text-center" name="weights[]" placeholder="C${bobot} (W)"></td>`
                            bobot++
                        } else {
                            syntax += `<td><input type="number" class="form-control text-center" name="values[${i - 2}][${j - 1}]" placeholder="(${i-1}, ${j})"></td>`
                        }
                        
                        
                    }
                }
                
            }
            syntax += "</tr>"
        }
        document.querySelector('#table').innerHTML += syntax
        document.querySelector('.d-none').classList.remove('d-none')
    }

</script>
@endsection
