<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello, <b>{{ Auth::user()->name }}</b>
            <b style="float: right">总用户数目：<span class="badge bg-danger">{{ count($users) }}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">序号</th>
                            <th scope="col">用户姓名</th>
                            <th scope="col">用户邮箱</th>
                            <th scope="col">创建时间</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
