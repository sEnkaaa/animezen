@extends('admin.layout')

@section('content')

<div class="container">

  	<div class="row">
      <div class="col-lg-12">
        <div class="bs-component">
          <div class="jumbotron"> 
           	<form method="POST">
                <fieldset>
                  <legend>Login</legend>
                  @if (session('error'))
	                <div class="alert alert-dismissible alert-danger">{{ session('error') }}</div>
	                @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input name="email" type="text" class="form-control" placeholder="" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="" required>
                  </div>
                  @csrf
                  <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-outline-success float-right" style=" width: 100%">
                  </div>
                  
                </fieldset>
              </form>
          </div>
        </div>
      </div>
    </div>

</div>

@endsection