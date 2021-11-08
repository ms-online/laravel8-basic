<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品类型详情
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
    </div>
</x-app-layout>
