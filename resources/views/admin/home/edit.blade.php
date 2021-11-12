@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>编辑About</h2>
        </div>
        <div class="card-body">
            <form action="{{url('update/homeabout/'.$homeabout->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">标题</label>
                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                        value="{{ $homeabout->title }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">简短描述</label>
                    <textarea class="form-control" name="short_des" id="exampleFormControlTextarea1"
                        rows="3">{{ $homeabout->short_des }}"</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">详细描述</label>
                    <textarea class="form-control" name="long_des" id="exampleFormControlTextarea1"
                        rows="3">{{ $homeabout->long_des }}"</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">更新</button>
                </div>
            </form>
        </div>
    </div>




</div>
@endsection
