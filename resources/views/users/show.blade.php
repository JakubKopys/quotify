@extends('layouts/app')

@section('content')
    <div class="show-user container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{$user->name}}  {{$user->email}}  {{$user->id}}
            </div>
        </div>
    </div>
@endsection