@extends('home')
@section('content')

<form action="{{url('optionValues/'.$optionValue->id)}}" method="POST" enctype="multipart/form-data">
           @method('PUT')
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
                    <label>Option Name:</label>
                    <select name="option_id" class="form-control col-4" style="border-radius:20px">
                              <option></option>
                              @foreach($options as $option)
                              <option style="border-radius:10px"

                              @if($option->id==$optionValue->option_id)
                                selected  @endif
                              value="{{$option->id}}">{{$option->name}}</option>
                              @endforeach
                    </select>

          </div>

          <table class="datatable-table table table-bordered mt-2 ">
                    <thead class="datatable-head">
                              <tr class="datatable-row" style="left: 0px;">

                                        <th data-field="" class="datatable-cell  end-cell text-center">
                                                  <span>action</span></th>

                                        <th data-field="" class="datatable-cell"><span>OptionValue Name:</span></th>
                              </tr>
                    </thead>
                    <tbody class="datatable-body">
                              <tr class="datatable-row datatable-row-even" id="price-0">

                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                        <td class="datatable-cell  ">
                                                  <div class="a-col alternate">
                                                            <div class="input-field">
                                                                 <input type="text" class="form-control" name="name[0]"  value="{{$optionValue->name}}"/>
                                                            </div>
                                                  </div>
                                        </td>

                              </tr>
                              <tr class="datatable-row datatable-row-even">

                                        <td class="text-center end-td " id="increment">
                                                  <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button></td>


                              </tr>
                    </tbody>
          </table>
          <br>



          <div class="form-group">
                    <button style="border-radius:20px" type="submit" class="btn btn-primary"><i class="fas fa-save">Save</i></button>
          </div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
          function appendRow(num) {
                    $new_number = parseInt(num) + 1;
                    $appended_text = ` <tr class="datatable-row datatable-row-even" id="price-${$new_number}">

                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                            class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                        <td class="datatable-cell  ">
                                                  <div class="a-col alternate">
                                                            <div class="input-field">
                                                                      {{-- <label for="date-start">Start Date</label>
                                                                      --}}
                                                                      <input type="text" class="form-control"
                                                                                 name="name[${$new_number}]" value="{{$optionValue->name}}" />
                                                            </div>
                                                  </div>
                                        </td>


                              </tr>`;
                    $($appended_text).insertAfter(`#price-${num}`);
                    if (!document.getElementById(`price-${num}`)) {
                              $($appended_text).insertAfter(`#price-0`);
                    }

                    $(`#btn-${num}`).remove();
                    $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


          }

          function removeRow(num) {
                    $(`#price-${num}`).remove();

          }

</script>


@endsection
