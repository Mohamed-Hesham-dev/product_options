@extends('home')
@section('content')
<a  href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-outline-primary mr-1 ">
    Edit <i class="icon-lg la la-file-medical"></i></a>

<form action="#" method="POST" enctype="multipart/form-data">
           @method('PUT')
          {{ csrf_field() }}

          <div class="form-group">
               <label for="exampleInputName">product Name:</label>
               <input type="text" class="form-control col-4 " style="border-radius:20px" name="name" value="{{$product->name}}" readonly>
          </div>
          @foreach($options as $option)
          <div class="form-group">

               <label>{{$option->name}}:</label>
                         <select class="form-control"  name="{{$option->name}}[]"  multiple="" readonly>
                         <option value="" disabled>Select</option>
                              @foreach( $option->values as $op)

                                   <option @if(in_array($op->id,$optionValue))
                                        selected
                                   @endif value="{{ $op->id }}" disabled>{{ $op->name }}</option>
                              @endforeach

                         </select>
          </div>
          @endforeach


</form>
@endsection
