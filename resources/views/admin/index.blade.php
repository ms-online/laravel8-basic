 @extends('admin.admin_master')

 @section('admin')

 <div class="container">
     <h2>
         Hello, <b>{{ Auth::user()->name }}</b>
         <br>
         <span class="my-2">总用户数目：<span class="badge bg-danger">{{ count($users) }}</span>
     </h2>
 </div>

 <div class="py-12">
     <div class="container">
         <div class="card">
             <div class="card-header">所有用户</div>
             <div class="card-body">
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
                             <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                         </tr>
                         @endforeach


                     </tbody>
                 </table>
             </div>

         </div>
     </div>
 </div>


 @endsection
