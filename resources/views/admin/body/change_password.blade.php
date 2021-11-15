@extends('admin.admin_master')

@section('admin')
{{-- <div class="container"> --}}

<div class="row">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>更新密码</h2>
            </div>
            <div class="card-body">
                <form class="form-pill" action="{{ route('password.unpdate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput3">当前密码</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"
                            placeholder="当前密码">
                        @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">新密码</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="新密码">
                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">确认新密码</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="确认新密码">
                    </div>
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-primary" type="submit">保存</button>
                </form>
            </div>
        </div>
    </div>
    {{-- </div> --}}

    @endsection
