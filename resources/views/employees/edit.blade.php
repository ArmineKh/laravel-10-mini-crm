@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Employee') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
                    </div>
                    
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Employee Name:</strong>
                            <input type="text" name="name" value="{{ $employee->name }}"  class="form-control" placeholder="Employee Name">
                            @error('name')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Employee Surname:</strong>
                            <input type="text" name="surname"  value="{{ $employee->surname }}"  class="form-control" placeholder="Employee Surname">
                            @error('surname')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Employee Email:</strong>
                            <input type="email" name="email" value="{{ $employee->email }}" class="form-control" placeholder="Employee Email">
                            @error('email')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Employee Company :</strong>
                            <select name="company" class="form-select form-control">
                              <option disable>Employee Company</option>
                              @foreach ($companies as $company)
                              <option value="{{$company->id}}">{{$company->name}}</option>
                              @endforeach
                            </select>
                            @error('company')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Employee Phone:</strong>
                            <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="Employee phone">
                            @error('phone')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                          </div>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

