@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors))
                    <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
                <form class="edit_user" method="POST" action="/users/{{$user->id}}">
                    {{method_field('PATCH')}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection