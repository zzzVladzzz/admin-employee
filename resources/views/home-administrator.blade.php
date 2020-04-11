@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>
                    <h2 class="text-center"><a href="{{route('employee.index')}}">Employee</a></h2>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Link</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($managers as $manager)
                <tr>
                    <th scope="row">{{$manager->id}}</th>
                    <td> {{ $manager->name }}</td>
                    <td> {{ $manager->email }}</td>
                    <td><a href="{{route('detail-view-manager', ['user' => $manager->id])}}"> Open detail view </a></td>
                </tr>
            @endforeach


            </tbody>
        </table>
        {{ $managers->links() }}

    </div>
</div>
@endsection
