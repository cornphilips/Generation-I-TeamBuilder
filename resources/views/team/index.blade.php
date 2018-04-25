<!-- index.blade.php -->

@extends('layouts.app')
@section('content')
  <div class="container">
    <a href="/team/create" class="btn btn-primary">Create Team</a>

    <table class="table table-striped">
    <thead>
      <tr>

        <th>ID</th>
        <th>Title</th>
        <th>Pokemon1</th>
        <th>Pokemon2</th>
        <th>Pokemon3</th>
        <th>Pokemon4</th>
        <th>Pokemon5</th>
        <th>Pokemon6</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($teams as $id)
      <tr>
        <td>{{$id['id']}}</td>
        <td>{{$id['title']}}</td>
        <td>{{$id['pokemon1']}}</td>
        <td>{{$id['pokemon2']}}</td>
        <td>{{$id['pokemon3']}}</td>
        <td>{{$id['pokemon4']}}</td>
        <td>{{$id['pokemon5']}}</td>
        <td>{{$id['pokemon6']}}</td>
        <td><a href="{{action('TEAMController@edit', $id['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('TEAMController@destroy', $id['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
