@extends('home')
@section('content')
<a  href="{{url('optionValues/'.$optionValue->id.'/edit')}}" class="btn btn-outline-primary mr-1 ">
     Edit <i class="icon-lg la la-file-medical"></i></a>
<form action=""  enctype="multipart/form-data">
         
     <div class="form-group">
          <label>Option Name:</label>
          <select name="option_id" class="form-control col-4" style="border-radius:20px" readonly>
               <option style="border-radius:10px" >{{$optionValue->option->name}}</option>
          </select>
     </div>
          <div class="form-group">
               <label for="exampleInputName">OptionValue Name:</label>
               <input type="text" class="form-control col-4 " style="border-radius:20px" name="name" value="{{$optionValue->name}}" readonly>

          </div>
</form>

@endsection