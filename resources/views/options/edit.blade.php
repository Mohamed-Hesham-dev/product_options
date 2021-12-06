@extends('home')
@section('content')

<form action="{{url('options/'.$option->id)}}" method="POST" enctype="multipart/form-data">
           @method('PUT') 
          {{ csrf_field() }}

          <div class="form-group">
               <label for="exampleInputName">Option Name:</label>
               <input type="text" class="form-control col-4 " style="border-radius:20px" name="name" value="{{$option->name}}">
          </div>
          <div class="form-group">
               <button style="border-radius:20px" type="submit" class="btn btn-primary"><i class="fas fa-save">Update</i></button>
          </div>
</form>
@endsection