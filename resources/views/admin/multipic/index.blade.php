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
                    <div class="card-group">
                        @foreach ($images as $image)
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <img src="{{ asset($image->image) }}" alt="图片">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- 添加多图表单 --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">多图上传</div>
                        <div class="card-body">
                            <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">图片</label>
                                    <input type="file" name="image[]" class="form-control" id="exampleInputEmail1"
                                        multiple aria-describedby="emailHelp">
                                    {{-- 错误提示 --}}
                                    @error('image')
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
