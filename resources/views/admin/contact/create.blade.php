@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>创建Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.contact') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">邮箱地址</label>
                    <input type="text" class="form-control" name="email" id="exampleFormControlInput1"
                        placeholder="请输入邮箱">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">联系方式</label>
                    <input type="text" class="form-control" name="phone" id="exampleFormControlInput1"
                        placeholder="请输入联系方式">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">联系地址</label>
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">提交</button>
                </div>
            </form>
        </div>
    </div>




</div>
@endsection
