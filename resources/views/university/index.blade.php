@extends('layouts.appDashboard')
@section('title','| Universidad')
@section('nameTitleTemplate','Universidad')
@section('header')
@include('layouts.header.headerDashboard')
@endsection
@section('js')
<script>
  function show(id){
    $('#labelUniversity').html($('#td_University'+id).html());
    $('#labelAddress').html($('#td_Address'+id).html());
    $('#labelCreate').html($('#td_Create'+id).html());
    $('#labelEdit').html($('#td_Edit'+id).html());
  }
  function edit(id){
    $('#Modaluniversity').val($('#EditUniversity'+id).val());
    $('#Modaladdress_id').val($('#EditAddress'+id).val());
    $('#ModalId').val($('#id'+id).val());
  }
  $('#btnEdit').click(function(){
    id=$('#ModalId');
    university=$('#Modaluniversity');
    address=$('#Modaladdress_id');
    $.ajax({
      type: "PUT",
      url: APP_URL+"/University/"+id.val(),
      dataType: "json",
      data:{
          '_token': $('input[name=_token]').val(),
          'id':id.val(),
          'university':university.val(),
          'address_id':address.val(),
      },
      success: function (response) {
          $('#labelEditUniversity'+id.val()).html(response.university);
          $('#labelEditAddress'+id.val()).html(response.address_id);
      }
    });
  });
</script>
@endsection
@section('content')
@include('layouts.modales.University.modalCreateUniversity')
@include('layouts.modales.University.modalShowUniversity')
@include('layouts.modales.University.modalEditUniversity')
 <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="text-white mb-0">Universidades</h3>
                </div>
                <div class="col-4 text-right">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <a href="#" title data-original-title="Agregar Universidad" data-target='#createUniversity' data-toggle='modal' class='text-white'><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Universidad</th>
                    <th scope="col">Coordenadas</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($university as $item)
                    <tr id='{{$item->id}}'>
                      <td>
                        <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
                        {{ $item->id }}
                      </td>
                      <td id='td_University{{$item->id}}'>
                        <label id='labelEditUniversity{{$item->id}}'>{{ $item->university }}</label>
                        <input class='d-none' id="EditUniversity{{$item->id}}" value="{{$item->university}}">
                      </td>
                      <td id='td_Address{{$item->id}}'>
                        <label id='labelEditAddress{{$item->id}}'>{{ $item->address->addres }}</label>
                        <input class='d-none' id="EditAddress{{$item->id}}" value="{{$item->address_id}}">
                      </td>
                      <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
                      <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
                      <td>
                      	<a class="btn-primary btn" onclick="show({{$item->id}})" data-target='#showUniversity' data-toggle='modal' href="#!"><i class="fa fa-eye"></i></a>

                        <a class="btn-danger btn" href="{{route('University.destroy',$item->slug)}}"><i class="fa fa-remove"></i></a>
                      
                        <a class="btn-info btn" data-target='#editUniversity' data-toggle='modal'  id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection