@extends('admin.admin_master')

@section('admin')
{{-- <div class="container"> --}}

<div class="row">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>更新个人资料</h2>
            </div>
            <div class="card-body">
                {{--  --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form class="form-pill" action="{{ route('update.user.profile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput3">用户名</label>
                        <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">邮箱</label>
                        <input type="email" class="form-control" name="email" value={{  $user['email'] }}>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">保存</button>
                </form>
            </div>
        </div>
    </div>
    {{-- </div> --}}

    @endsection
