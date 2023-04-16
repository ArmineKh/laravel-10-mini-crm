@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Company') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
                    </div>
                    

                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Company Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Company Name">
                            @error('name')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Company Email:</strong>
                            <input type="email" name="email" class="form-control" placeholder="Company Email">
                            @error('email')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Company Logo:</strong>
                            <input type="file" name="logo" class="form-control" placeholder="Company Logo">
                            @error('logo')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Company Website:</strong>
                            <input type="text" name="website" class="form-control" placeholder="Company Website">
                            @error('website')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                          <div class="form-group">
                            <strong>Company Address:</strong>
                            <input type="text" name="address" class="form-control" placeholder="Company Address">
                            @error('address')
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

