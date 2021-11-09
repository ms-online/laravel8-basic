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
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">序号</th>
                                        <th scope="col">商品名称</th>
                                        <th scope="col">所属用户</th>
                                        <th scope="col">创建时间</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category )
                                    <tr>
                                        <th scope="row">{{ $loop->index + $categories->firstItem() }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->created_at == NULL)
                                            <span class="text-danger">没有设置创建时间</span>
                                            @else
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/edit/'.$category->id) }}"
                                                class="btn btn-success">编辑</a>
                                            <a href="{{ url('softdelete/category/'.$category->id) }}"
                                                class="btn btn-danger">回收</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- 分页导航 --}}
                            {{ $categories -> links() }}
                        </div>
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
        {{-- 回收站 --}}
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">回收站</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">序号</th>
                                        <th scope="col">商品名称</th>
                                        <th scope="col">所属用户</th>
                                        <th scope="col">创建时间</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trashedCat as $category )
                                    <tr>
                                        <th scope="row">{{ $loop->index + $trashedCat->firstItem() }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->created_at == NULL)
                                            <span class="text-danger">没有设置创建时间</span>
                                            @else
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/restore/'.$category->id)}}"
                                                class="btn btn-success">复位</a>
                                            <a href="{{ url('pdelete/category/'.$category->id) }}"
                                                class="btn btn-danger">删除</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- 分页导航 --}}
                            {{ $categories -> links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
