<!-- edit.blade.php -->

@extends('layouts.app')
@section('content')
<div class="container">
  <form method="post" action="{{action('TEAMController@update', $team)}}">
    <div class="form-group row">
      <div class="form-group row">
        {{csrf_field()}}

        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$team->title}}" name="title">
        </div>
      </div>

      <div class="form-group row">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$team->pokemon1}}" name="pokemon1">
        </div>
      </div>

      <div class="form-group row">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$team->pokemon2}}" name="pokemon2">
        </div>
      </div>

      <div class="form-group row">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$team->pokemon3}}" name="pokemon3">
        </div>
      </div>

      <div class="form-group row">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$team->pokemon4}}" name="pokemon4">
        </div>
      </div>

      <div class="form-group row">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$team->pokemon5}}" name="pokemon5">
        </div>
      </div>

      <div class="form-group row">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$team->pokemon6}}" name="pokemon6">
        </div>
      </div>

    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
@endsection
