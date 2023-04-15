@extends('admin.layouts.app')

@section('title')
Colab List
@endsection

@section('content')


<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Colab List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Colab List</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">

                {{-- <form action="{{ route('colab.search') }}" id="search-form">
                    <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="">
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </div>
            </form> --}}
            {{-- @php
            $detail = json_decode($products[0]->details,true);
            // dd($detail);
            @endphp --}}
            <div class="form-group">
                <label for="name">Sort By</label>
                <select name="sort" id="">
                    <option value="" selected disabled>Plese select Sort by</option>
                    <option value="name">Name</option>
                    <option value="date">Date</option>
                    {{-- <option value="">Name</option> --}}
                </select>
                {{-- <input type="submit" class="btn btn-primary" value="Search"> --}}
            </div>
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <table id="dataTable" class="table table-bordered table-hover" data-show-print="true"
                  data-url="json/data1.json">
                    <thead>
                      <tr>
                        <th width="10px">SN</th>
                        <th scope="10px">Name</th>
                        <th scope="10px">Phone</th>
                        <th scope="10px">Email</th>
                        <th scope="10px">Created At</th>
                        <th scope="10px">Note</th>
                        <th scope="10px">Seen</th>
                        <th scope="10px">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @empty($products)
                            <tr>
                                Empty
                            </tr>
                        @else
                            @foreach($products as $a => $num)
                            {{-- {{ dd($num->details) }} --}}
                                <tr>
                                    @php

                                        $details = json_decode($num->details,true);
                                        // dd($details);
                                    @endphp
                                    {{-- {{ dd( }} --}}
                                    <td>{{$a+1}}</td>
                                    @if(!empty($details[0]['answer']))
                                    <td>{{ $details[0]['answer'] }}</td>
                                    @else
                                    <td>none</td>
                                    @endif
                                    @if(!empty($details[2]['answer']))
                                    <td>{{ $details[2]['answer'] }}</td>
                                    @else
                                    <td>none</td>
                                    @endif
                                    @if(!empty($details[4]['answer']))
                                    <td>{{ $details[4]['answer'] }}</td>
                                    @else
                                    <td>none</td>
                                    @endif
                                    <td data-editable="false">
                                      {{date_format($num->created_at, 'M d,Y H:i:s')}}
                                    </td>


                                    <td class="class" data-id="{{$num->id}}">
                                      {{($num->note)}}
                                    </td>
                                    <td>
                                        @if($num->seen=='1')
                                        <button class="btn btn-primary">seen</button>
                                        @else
                                        <button class="btn btn-secondary seen-btn">deliver</button>
                                        @endif
                                    </td>


                                    <td class="d-flex">
                                      <a href="javascript:void(0);" class="btn btn-primary view-colab" data-name="{{$num->name}}" data-phone_number="{{$num->phone_number}}" data-id="{{$num->id}}">
                                        <i class="fas fa-eye"></i>
                                      </a>
                                        <form  action="{{ route('colab.destroy' , $num->id)}}" method="POST">
                                          @csrf
                                          @method('delete')
                                          {{-- <input type="hidden" name="_method" value="DELETE" /> --}}
                                          <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">

          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')

    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>

      $('.view-colab').on('click',function(){
        $('#modal-default').modal('show');
        var name = $(this).attr('data-name');
        var phone_number = $(this).attr('data-phone_number');
        var cid = $(this).attr('data-id');
        // $('.modal-title').text(name + '-' + phone_number);
        var url = base_url + "/admin/colab/detail/" + cid;
        console.log(url);
        $.get(url, function(data) {
            $('.modal-body').html(data);
            $('.seen-btn').text('seen');
        });
      });

      $(document).ready( function () {

       $('table').editableTableWidget();

       $('table td').on('change', function(evt, newValue) {
        var type = "POST";


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

             $.ajax({
                type: type,
                url: base_url + "/admin/colab/saveNote",
                data: {
                    "cid": $(this).data('id'),
                    "note" : newValue
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    toastr.success('Success',"Note Saved");

                },
                error: function (data) {
                    console.log(data);
                    toastr.error('Error',data.responseText);
                }
            });
           });
    });

    </script>
@endsection
