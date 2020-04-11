@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a href="{{route('employee.create')}}">Create Employee</a>
            </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contract date</th>
                        <th scope="col">Contract expiration date</th>
                        <th scope="col">File contract</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                        <th scope="row">{{$employee->id}}</th>
                        <td> {{ $employee->name }}</td>
                        <td> {{ $employee->email }}</td>
                        <td> {{ $employee->phone }}</td>
                        <td> {{ $employee->address }}</td>
                        <td> {{ $employee->contract_date }}</td>
                        <td> {{ $employee->contract_expiration_date }}</td>
                            <td>@if(Storage::disk('public')->exists($employee->file_contract))<a href=" {{ Storage::url($employee->file_contract) }} "> download </a>@endif</td>
                            <td>
                                <a href="{{route('employee.edit', ['employee' => $employee->id])}}" type="button" class="btn btn-primary">update</a>
                                <br>
                                <form action="{{route('employee.destroy', ['employee' => $employee->id])}}" method="post">
                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                    <input type="hidden" name="_method" value="delete" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
{{--                                <a href="{{route('employee.destroy', ['employee' => $employee->id])}}" type="button" class="btn btn-danger">update</a>--}}
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            {{ $employees->links() }}


        </div>
    </div>
</div>
@endsection
