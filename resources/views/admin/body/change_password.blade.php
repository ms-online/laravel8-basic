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
                <form class="form-pill">
                    <div class="form-group">
                        <label for="exampleFormControlInput3">当前密码</label>
                        <input type="password" class="form-control" id="exampleFormControlInput3" placeholder="当前密码">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">新密码</label>
                        <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="新密码">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">确认新密码</label>
                        <input type="password" class="form-control" id="exampleFormControlPassword3"
                            placeholder="确认新密码">
                    </div>
                    <button class="btn btn-primary" type="submit">保存</button>
                </form>
            </div>
        </div>
    </div>
    {{-- </div> --}}

    @endsection
