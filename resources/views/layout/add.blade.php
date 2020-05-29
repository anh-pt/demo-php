@extends('layouts.backend')
@section('heade','chức năng thêm')
@section('noi_dung')
<h2>add</h2>
<form action="{{route('user.save'}}" method="post">
  <input type="text" name="username" placeholder="Username"><br>
  <button>Save</button>
  @csrf
</form>
@endsection