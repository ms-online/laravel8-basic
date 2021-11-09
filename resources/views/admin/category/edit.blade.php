<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            编辑商品类型
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                {{-- 编辑商品表单 --}}
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">编辑商品类型</div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">商品名称</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $categories->category_name }}">
                                    {{-- 错误提示 --}}
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
