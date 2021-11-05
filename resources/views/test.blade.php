{{-- blade模版语法
 1、数据显示：{{变量}},避免了XSS攻击
2、控制输出：@if , @elseif , @endif 指令构建 if 表达式，@foreach 和@endforeach构建循环
3、模版继承：@extends(),@section(),@yield().
4、引入子视图：@include() --}}

<?php
   $name = 'summer';
   echo $name;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$name}}</title>
</head>
@if ()

@elseif ()

@endif

@foreach ( as )

@endforeach

<body>

</body>

</html>
