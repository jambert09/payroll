@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Manage Salary details</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('managesalary')}}">Salary details</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                    @foreach ($users as $user)
                        <form action="{{ route('managesalary.detail', ['id' => $user->id]) }}" method="get" class="form-horizontal">
                        @endforeach
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Manage salary details</h4>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Employee name</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="employee_id" class="form-control">
                                            <option value="0" disabled {{ old('user') ? '' : 'selected' }}>All1</option>
                                            @foreach($users as $user)

                                                <option value="{{$user->id}}" {{ old('user') ? 'selected' : '' }}>{{$user->username}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark">Go</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
            @include('admin.includes.footer')
    </div>

@endsection
