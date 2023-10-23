@extends('layouts.main')
@section('container')
<div class="row">
    @foreach($histories as $h)
    <div class="col-md-3 mr-2">
        <div class="card" style="width: 15rem;">
            <div class="card-body">
              <h6 class="small mb-2 text-body-secondary">Created at: {{ $h->created_at }}</h6>
              <h6 class="small mb-2 text-body-secondary">Last modified: {{ $h->updated_at }}</h6>
              <h2 class="card-title mb-2">{{ $h->name }}</h2>
              <h6 class="card-text small">Data: {{ substr($h->data, 0, 15) . "..." }}</h6>
              <h6 class="card-text small">Weight: {{ substr($h->weights, 0, 15) . "..." }}</h6>
              <h6 class="card-text small">Alternatives: {{ substr($h->alternatives, 0, 15) . "..." }}</h6>
              <h6 class="card-text small">Criteria: {{ substr($h->criterias, 0, 15) . "..." }}</h6>
              <form action="/electre" method="get">
                <input type="hidden" value="{{ $h->data }}" name="values">
                <input type="hidden" value="{{ $h->weights }}" name="weights">
                <input type="hidden" value="{{ $h->alternatives }}" name="alternatives">
                <input type="hidden" value="{{ $h->criterias }}" name="criterias">
                <input type="hidden" value="{{ $h->id }}" name="id">
                <button class="btn btn-secondary">Go</button>
              </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection