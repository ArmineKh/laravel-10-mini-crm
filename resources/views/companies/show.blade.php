@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card p-4" >
          <img src="{{strpos($company->logo, 'http') === 0 ? $company->logo : asset('storage/'. $company->logo) }}" style="width: 18rem; heigh: 18rem;" class="card-img-top rounded-pill m-auto" alt="{{ $company->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text"><span class="d-block"><strong>Email: </strong>{{ $company->email }}</span> <span class="d-block"><strong>Address: </strong> {{ $company->address }} </span> <span class="d-block"><strong>Website: </strong>{{ $company->website }}</span> </p>
            <a href="{{ route('companies.index') }}" class="btn btn-primary m-auto">Back to Index</a>
          </div>
        </div>

            
        </div>
    </div>
</div>


@endsection




