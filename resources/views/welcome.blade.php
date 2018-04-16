@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Users CRUD</div>

                    @if(Auth::check())
                    @if(Auth::User()->isAdmin())
                      <!-- Table -->
                      <table class="table">
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>created_at</th>
                              <th>admin</th>
                              <th></th>
                              <th></th>
                          </tr>
                          @foreach($users as $user)
                            <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->password }}</td>
                              <td>{{ $user->created_at }}</td>
                              <td>{{ $user->admin }}</td>
                              <td><a href="/edit/{{$user->id}}"><button type="button" class="btn btn-primary">edit</button></a>
                              <td><a href="/delete/{{$user->id}}" onclick="return confirm('Delete user: {{$user->name}}?');"><button type="button" class="btn btn-danger">delete</button></a>

                            </tr>


                          @endforeach


                      </table>

                    @endif
                    @endif


            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> Login on to view >></a>
            @endif

        </div>
    </div>
</div>
@endsection
