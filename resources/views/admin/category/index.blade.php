<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品类型详情
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    {{--  --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">商品类型</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">序号</th>
                                    <th scope="col">商品名称</th>
                                    <th scope="col">所属用户</th>
                                    <th scope="col">创建时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                            <th scope="row">{{ $i++ }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- 添加商品表单 --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">添加商品</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">商品名称</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    {{-- 错误提示 --}}
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">提交</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
