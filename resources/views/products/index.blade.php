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
                    <th>product Name</th>
                    <th>Show</th>
                    <th>Update</th>
                    <th>Delete</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)

                  <tr>
                    <td>{{$product->name}}</td>


                    <td>
                      <a  href="{{url('products/'.$product->id)}}" class="btn btn-outline-primary mr-1 ">
                        <i class="fa fa-eye"></i></a>
                    </td>



                    <td>
                      <a  href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-outline-primary mr-1 ">
                        <i class="fa fa-edit"></i></a>

                      </td>
                      <td>
                          <form action="{{url('products/'.$product->id)}}" method="POST">
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

          <a  href="{{ route('products.create') }}" class="btn btn-outline-primary mr-1 ">
                    New <i class="icon-lg la la-file-medical"></i></a>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


@endsection
