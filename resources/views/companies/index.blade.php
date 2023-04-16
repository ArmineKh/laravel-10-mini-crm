@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="pull-right mb-2">
                      <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Company Logo</th>
                          <th width="180px">Company Name</th>
                          <th>Company Email</th>
                          <th>Company Website</th>
                          <th>Company Address</th>
                          <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($companies as $company)
                        <tr>
                          
                          <td scope="row">{{ $company->id }}</td>
                          <td>
                              <a href="{{ route('companies.show',$company->id) }}">

                              <img width=100 height=100 class="rounded-pill" src="{{strpos($company->logo, 'http') === 0 ? $company->logo : asset('storage/'. $company->logo) }}" alt="{{ $company->name }}">
                              </a>
                            </td>
                            <td class="align-middle">{{ $company->name }}</td>
                            <td class="align-middle">{{ $company->email }}</td>
                            <td class="align-middle">{{ $company->website }}</td>
                            <td class="align-middle">{{ $company->address }}</td>
                            <td>
                              <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                        {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

