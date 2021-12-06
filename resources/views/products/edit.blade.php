@extends('home')
@section('content')

<form action="{{url('products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
           @method('PUT')
          {{ csrf_field() }}

          <div class="form-group">
               <label for="exampleInputName">product Name:</label>
               <input type="text" class="form-control col-4 " style="border-radius:20px" name="name" value="{{$product->name}}">
          </div>

          @foreach($options as $option)
          <div class="form-group">

               <label>{{$option->name}}:</label>
                         <select class="form-control"  name="{{$option->name}}[]"  multiple="">
                         <option value="{{ $option->id }}" disabled>Select</option>
                              @foreach( $option->values as $op)

                                   <option @if(in_array($op->id,$optionValue))
                                        selected
                                   @endif value="{{ $op->id }}">{{ $op->name }}</option>
                              @endforeach

                         </select>
          </div>
          @endforeach

          <div class="form-group">
               <button style="border-radius:20px" type="submit" class="btn btn-primary"><i class="fas fa-save">Update</i></button>
          </div>
</form>
@endsection
