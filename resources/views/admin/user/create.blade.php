@extends('admin.layout.admin')
@section('title', 'Quản lý người dùng')
@section('content')
    <div class="create-form-user">
        <div class="title-form">
            <h4>{{ __('Create Admin') }}</h4>
        </div>
        <form method="POST" action="{{ route('admin\user\store') }}">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">{{ __('Name') }}</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                </div>
                @error('name')
                    <div class="col-lg-6">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">{{ __('Email') }}</label>
                <div class="col-lg-6">
                    <input class="form-control" rows="3" id="email" name="email"></input>
                </div>
                @error('email')
                    <div class="col-lg-6">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label">{{ __('Password') }}</label>
                <div class="col-lg-6">
                    <input class="form-control" rows="3" id="password" name="password"></input>
                </div>
                @error('password')
                    <div class="col-lg-6">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role_id" class="col-lg-2 control-label">{{ __('Role') }}</label>
                <div class="col-lg-6">
                    <select class="form-control" rows="3" id="role_id" name="role_id">
                        <option value=1>Super admin</option>
                        <option value=3>Moderator</option>
                    </select>
                </div>
                @error('role_id')
                    <div class="col-lg-6">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-danger" >
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
