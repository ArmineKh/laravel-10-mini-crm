@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card p-4" >
          
          <div class="card-body">
            <h5 class="card-title">{{ $employee->name }} {{ $employee->surname }}</h5>
            <p class="card-text"><span class="d-block"><strong>Email: </strong>{{ $employee->email }}</span> <span class="d-block"><strong>Company: </strong> {{ $employee->company->name }} </span> <span class="d-block"><strong>Phone: </strong>{{ $employee->phone }}</span> </p>
            <a href="{{ route('employees.index') }}" class="btn btn-primary m-auto">Back to Index</a>
          </div>
        </div>

            
        </div>
    </div>
</div>


@endsection




