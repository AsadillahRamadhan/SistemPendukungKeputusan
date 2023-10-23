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
        console.log(jumlah_alternatif)
    }

</script>
@endsection
