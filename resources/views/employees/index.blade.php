@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="pull-right mb-2">
                      <a class="btn btn-success" href="{{ route('employees.create') }}"> Create Employee</a>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Employee Name</th>
                          <th>Employee Surname</th>
                          <th>Employee Company</th>
                          <th>Employee email</th>
                          <th>Employee phone</th>
                          <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                          
                          <td scope="row">{{ $employee->id }}</td>
                          
                            <td class="align-middle">
                              <a href="{{ route('employees.show',$employee->id) }}">
                              {{ $employee->name }}
                              </a>
                            </td>
                            <td class="align-middle">{{ $employee->surname }}</td>
                            <td class="align-middle">{{ $employee->company->name }}</td>
                            <td class="align-middle">{{ $employee->email }}</td>
                            <td class="align-middle">{{ $employee->phone }}</td>
                            <td>
                              <form action="{{ route('employees.destroy',$employee->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                        {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

