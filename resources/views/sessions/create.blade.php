@extends('layouts.master')

@section('content')
<div class="col-sm-8">
    <h1>Sign-In</h1>
    <form method ="post" action="/login">
        {{csrf_field()}}
         
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" class="form-control">
        </div>
         
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
        @include('layouts.error')
    </form>
</div>
@endsection