@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>
{{--                    <h2 class="text-center">{{$user->name}}</h2>--}}
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Employee</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$user->name}}</th>
                    <td> {{ $user->email }}</td>
                    <td> @foreach($employees as $employee) {{$employee['name']}} <br> @endforeach </td>
                </tr>

            </tbody>
        </table>

    </div>
</div>
@endsection
