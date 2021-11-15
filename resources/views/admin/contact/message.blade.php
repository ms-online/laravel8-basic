@extends('admin.admin_master')

@section('admin')
<div class="py-12">
    <div class="container">

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
                    <div class="card-header">Contact Message</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">序号</th>
                                    <th scope="col" width="15%">姓名</th>
                                    <th scope="col" width="15%">邮箱</th>
                                    <th scope="col" width="15%">主题</th>
                                    <th scope="col" width="25%">消息</th>
                                    <th scope="col" width="15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i =1)
                                @foreach ($message as $mess)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $mess->name }}</td>
                                    <td>{{ $mess->email}}</td>
                                    <td>{{ $mess->subject}}</td>
                                    <td>{{ $mess->message }}</td>
                                    <td>

                                        <a href="{{ url('message/delete/'.$mess->id) }}"
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
