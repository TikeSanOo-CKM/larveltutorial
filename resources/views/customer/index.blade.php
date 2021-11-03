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
           <a href="{{ route('customer.add') }}" style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;"> ADD CUSTOMER</a>
          </legend>

           <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr class="text-center">
               <th class="text-center">No</th>
               <th class="text-center">Name</th>
               <th class="text-center">Email</th>
               <th class="text-center">Action</th>
            </tr>
            </thead>
           <tbody>
              @forelse ($customers as $customer)
                <tr class="text-center">
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td class="text-center">{{ $customer->name }}</td>
                <td class="text-center">{{ $customer->email }}</td>
                <td class="text-center">
                <!-- <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-warning mr-2 text-white">Edit</a> -->
                  <a href="{{ route('customer.edit',$customer->slug) }}" class="btn btn-sm btn-outline-danger py-0">Edit</a>
                  <a href="{{ route('customer.view',$customer->slug) }}" class="btn btn-sm btn-outline-danger py-0">View</a>
                  <a href="" onclick="if(confirm('Do you want to delete this customer?'))event.preventDefault(); document.getElementById('delete-{{$customer->slug}}').submit();" class="btn btn-sm btn-outline-danger py-0">Delete</a>
                  <form id="delete-{{$customer->slug}}" method="post" action="{{route('customer.delete',$customer->slug)}}" style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
                </td>
               </tr>
              @empty
              <p> No customer found!</p>
              @endforelse
           </tbody>
          </table>
        </div>
    </div>
</div>
@endsection