{{-- falta el editar --}}
@extends('layouts.appDashboard')
@section('title','| Areas')
@section('nameTitleTemplate','Areas')
@section('header')
@include('layouts.header.headerDashboard')
@endsection
@section('js')
<script>
  function show(id){
    $('#labelArea').html($('#td_Area'+id).html());
    $('#labelAddress').html($('#td_Address'+id).html());
    $('#labelCreate').html($('#td_Create'+id).html());
    $('#labelEdit').html($('#td_Edit'+id).html());
  }
</script>
@endsection
@section('content')
@include('layouts.modales.Areas.modalCreateArea')
@include('layouts.modales.Areas.modalShowArea')
@include('layouts.modales.Areas.modalEditArea')
 <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="text-white mb-0">Areas</h3>
                </div>
                <div class="col-4 text-right">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <a href="#" title data-original-title="Agregar Universidad" data-target='#createArea' data-toggle='modal' class='text-white'><i class="fa fa-plus"></i></a>
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
                    <th scope="col">Areas</th>
                    <th scope="col">Coordenadas</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($area as $item)
                    <tr id='{{$item->id}}'>
                      <td>
                        <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
                        {{ $item->id }}
                      </td>
                      <td id='td_Area{{$item->id}}'>
                        <label id='labelEditUniversity{{$item->id}}'>{{ $item->university->university }}</label>
                        <input class='d-none' id="EditArea{{$item->id}}" value="{{$item->university->university}}">
                      </td>
                      <td id='td_Area{{$item->id}}'>
                        <label id='labelEditArea{{$item->id}}'>{{ $item->area }}</label>
                        <input class='d-none' id="EditArea{{$item->id}}" value="{{$item->area}}">
                      </td>
                      
                      <td id='td_Address{{$item->id}}'>
                        <label id='labelEditAddress{{$item->id}}'>{{ $item->address->addres }}</label>
                        <input class='d-none' id="EditAddress{{$item->id}}" value="{{$item->address_id}}">
                      </td>
                      <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
                      <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
                      <td>
                      	<a class="btn-primary btn" onclick="show({{$item->id}})" data-target='#showArea' data-toggle='modal' href="#!"><i class="fa fa-eye"></i></a>

                        <a class="btn-danger btn" href="{{route('Areas.destroy',$item->slug)}}"><i class="fa fa-remove"></i></a>
                      
                        <a class="btn-info btn" data-target='#editArea' data-toggle='modal'  id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
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