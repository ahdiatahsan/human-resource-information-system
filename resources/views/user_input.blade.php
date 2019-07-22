@extends('layouts.master')

@section('title')
    Input Data User
@endsection

@section('content')
<div class="container-fluid mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Form Input Data User
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user_save') }}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                @if ($errors->any())
                <div class="col-sm-12 p-r-0 p-l-0 p-b-0">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul style="margin-bottom:0!important;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="form-group float-right">
                    <button type="reset" class="btn btn-danger">
                        <i class="fas fa-recycle"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
