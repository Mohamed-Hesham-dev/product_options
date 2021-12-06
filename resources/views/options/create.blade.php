@extends('home')
@section('content')


<form action="{{route('options.store')}}" method="post" enctype="multipart/form-data" id="fo1">
          {{ csrf_field() }}

          @if($errors->any())
          <div class="alert alert-danger">
               <p><strong>Opps Something went wrong</strong></p>
               <ul>
               @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
               @endforeach
               </ul>
          </div>
          @endif
          <div class="form-group">
               <label for="exampleInputName">Option Name:</label>
               <input type="text" class="form-control col-4 " style="border-radius:20px" name="name">

          </div>
          <div class="form-group">
            <button style="border-radius:20px" type="submit" class="btn btn-primary"><i class="fas fa-save">Save</i></button>
          </div>
</form>

@endsection