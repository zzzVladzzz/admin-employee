@extends('layouts.app')
{{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>create Employee</h1>
            <form method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Name" name="name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" name="email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone">Phone</label>
                    <input value="{{old('phone')}}" type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPhone" placeholder="Phone" name="phone">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <input value="{{old('address')}}" type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputAddress" placeholder="Address" name="address">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputContractExpirationDate">Contract Expiration Date</label>
                    <input value="{{old('contract-expiration-date')}}" id="date" class="form-control @error('contract-expiration-date') is-invalid @enderror" name="contract-expiration-date" type="text">
                    @error('contract-expiration-date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <script type="text/javascript">

                        $('#date').datepicker({
                            format: 'yyyy-mm-dd',
                        });

                    </script>
                    <style>
                        .dropdown-menu{
                            height: 200px;
                        }
                        .datepicker-days{
                            display: block!important;
                        }
                    </style>
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone">Select Manager</label>
                    <select class="custom-select" name="manager_id">
                        @foreach($managers as $manager)

                        <option value="{{$manager['id']}}" >{{$manager['name']}}</option>
                            @endforeach
                    </select>
                    {{--<input value="{{old('phone')}}" type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPhone" placeholder="Phone" name="phone">--}}
                    @error('manager_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile" class="@error('file_contract') is-invalid @enderror" name="file_contract">
                    @error('file_contract')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div>
            {{--<a href="{{route('employee.create')}}">Create Employee</a>--}}
        </div>
    </div>
</div>

@endsection

{{--<script>--}}

    {{--$('#dateS').datepicker({--}}

        {{--format: 'mm-dd-yyyy'--}}

    {{--});--}}

{{--</script>--}}