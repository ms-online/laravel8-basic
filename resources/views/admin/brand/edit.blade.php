<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            编辑品牌形象
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                {{-- 编辑品牌表单 --}}
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">编辑品牌形象</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">品牌名称</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
                                    {{-- 错误提示 --}}
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">品牌图片</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
                                    {{-- 错误提示 --}}
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset($brands->brand_image) }}" alt=""
                                        style="width:400px; height:200px">
                                </div>

                                <button type="submit" class="btn btn-primary">更新</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
