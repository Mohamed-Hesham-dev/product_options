@extends('home')
@section('content')
         
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Option Name</th>
                    <th>Show</th>
                    <th>Update</th>
                    <th>Delete</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($options as $option)
                   
                  <tr>
                    <td>{{$option->name}}</td>
                    
                    <td>
                      <a  href="{{url('options/'.$option->id)}}" class="btn btn-outline-primary mr-1 ">
                        <i class="fa fa-eye"></i></a>
                    </td>


                    
                    <td>
                      <a  href="{{url('options/'.$option->id.'/edit')}}" class="btn btn-outline-primary mr-1 ">
                        <i class="fa fa-edit"></i></a>
                    
                      </td>
                      <td>
                          <form action="{{url('options/'.$option->id)}}" method="POST">
                          @method('DELETE')
                                    {{ csrf_field() }}
                                    <button  type="submit"><i class="fa fa-trash"></i></button>
                          </form>
                      </td>
                  </tr>
                  
                
                  @endforeach
                  </tbody>
                 
                 
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       
          <a  href="{{ route('options.create') }}" class="btn btn-outline-primary mr-1 ">
                    New <i class="icon-lg la la-file-medical"></i></a>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


@endsection