<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            品牌形象
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
                        <div class="card-header">品牌形象</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">序号</th>
                                        <th scope="col">品牌名称</th>
                                        <th scope="col">品牌图片</th>
                                        <th scope="col">创建时间</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand )
                                    <tr>
                                        <th scope="row">{{ $loop->index + $brands->firstItem() }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img src="{{ asset($brand->brand_image) }}" alt=""
                                                style="height:40px;width:70px"></td>
                                        <td>
                                            @if ($brand->created_at == NULL)
                                            <span class="text-danger">没有设置创建时间</span>
                                            @else
                                            {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-success">编辑</a>
                                            <a href="{{ url('brand/delete/'.$brand->id) }}"
                                                onclick="return confirm('是否确认删除？')" class="btn btn-danger">删除</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- 分页导航 --}}
                            {{ $brands -> links() }}
                        </div>
                    </div>
                </div>
                {{-- 添加品牌表单 --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">添加品牌</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">品牌名称</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    {{-- 错误提示 --}}
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">品牌图片</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    {{-- 错误提示 --}}
                                    @error('brand_image')
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
