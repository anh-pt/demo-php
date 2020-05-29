@extends('layouts.backend')
@section('list')
<h2>Danh sách bảng</h2>
<table border= "1">
 <tr>
    <th>STT</th>
    <th>ID</th>
    <th>Username</th>
    <th>email</th>
    <th>fullname</th>
 </tr>
 <tr>
    
    @foreach($list as $k => $value)
    <tr>
    <td>{{$k+1}}</td>
    <td>{{$value->id}}</td>
    <td>{{$value->username}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->fullname}}</td>
    </tr>
    @endforeach
</tr>
</table>
@endsection