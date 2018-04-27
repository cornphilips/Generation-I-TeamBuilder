@extends('layouts.app')

@section('content')
  <div class="container">
  <h2>Edit user: {{$users->name }}</h2>
  <p>Only users can edit and view their passwords</p>
  <p>To be honest there's not that much to edit for users</p>
  <form method="post" action="{{ action('ListController@update', $users) }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">name</label>
      <input required name="name" style="width:400px" value="{{ $users->name }}" type="text" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="email">email</label>
      <input required name="email" style="width:400px" value="{{ $users->email }}" type="text" class="form-control" id="email">
    </div>
    <div class="form-group">
      <label for="email">admin (boolean)</label>
      <input required name="admin" style="width:400px" value="{{ $users->admin }}" type="text" class="form-control" id="email">
    </div>
    <button type="submit" class="btn btn-primary">updateroni and cheese FUCK</button>
  </form>
  </div>
@endsection
