@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          @if(session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
          @endif

          <legend style="color: green; font-weight: bold;">LARAVEL 7.X CRUD EXAMPLE - CODECHIEF
           <a href="{{ route('customer.list') }}" style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;"> CUSTOMER LIST</a>
          </legend>

          <form action="{{ route('customer.save') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
              <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
            </div>

            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
              <font style="color:red"> {{ $errors->has('email') ?  $errors->first('email') : '' }} </font>
            </div>
            
            <div class="form-group" style="margin-top: 24px;">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>

          </form>
        </div>
    </div>
</div>
@endsection