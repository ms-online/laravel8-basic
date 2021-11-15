@extends('admin.admin_master')

@section('admin')
<div class="py-12">
    <div class="container">
        <div class="my-3"><a href="{{ route('add.about') }}" class="btn btn-primary">添加Contact</a></div>
        <div class="row">
            <div class="col-md-12">
                {{--  --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">Contact Profile</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">序号</th>
                                    <th scope="col" width="25%">联系地址</th>
                                    <th scope="col" width="15%">联系邮箱</th>
                                    <th scope="col" width="15%">联系电话</th>
                                    <th scope="col" width="15%">创建时间</th>
                                    <th scope="col" width="15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i =1)
                                @foreach ($contacts as $con )
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $con->address }}</td>
                                    <td>{{ $con->email}}</td>
                                    <td>{{ $con->phone }}</td>
                                    <td>
                                        @if ($con->created_at == NULL)
                                        <span class="text-danger">没有设置创建时间</span>
                                        @else
                                        {{ Carbon\Carbon::parse($cont->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-success">编辑</a>
                                        <a href="{{ url('contact/delete/'.$con->id) }}"
                                            onclick="return confirm('是否确认删除？')" class="btn btn-danger">删除</a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
