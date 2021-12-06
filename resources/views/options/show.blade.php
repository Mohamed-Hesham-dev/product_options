@extends('home')
@section('content')
<a  href="{{url('options/'.$option->id.'/edit')}}" class="btn btn-outline-primary mr-1 ">
     Edit <i class="icon-lg la la-file-medical"></i></a>
<form action=""  enctype="multipart/form-data">
         
          <div class="form-group">
                    <label for="exampleInputName">Option Name:</label>
                    <input type="text" class="form-control col-4 " style="border-radius:20px" name="name" value="{{$option->name}}" readonly>

          </div>
</form>

@endsection