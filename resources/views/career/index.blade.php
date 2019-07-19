@extends('layouts.appDashboard')
@section('title','| Carreras')
@section('nameTitleTemplate','Carreras')
@section('header')
@include('layouts.header.headerDashboard')
@endsection
@section('js')
<script>
  function show(id){
    $('#labelArea').html($('#td_Area'+id).html());
    $('#labelAddress').html($('#td_Address'+id).html());
    $('#labelCareer').html($('#td_Career'+id).html());
    $('#labelModalidad').html($('#td_Modalidad'+id).html());
    $('#labelCreate').html($('#td_Create'+id).html());
    $('#labelEdit').html($('#td_Edit'+id).html());
  }
</script>
@endsection
@section('content')
@include('layouts.modales.Career.modalCreateCareer')
@include('layouts.modales.Career.modalShowCareer')
@include('layouts.modales.Career.modalEditCareer')
 <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="text-white mb-0">Carreras</h3>
                </div>
                <div class="col-4 text-right">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <a href="#" title data-original-title="Agregar Carreras" data-target='#createCareer' data-toggle='modal' class='text-white'><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Area</th>
                    <th scope="col">Carreras</th>
                    <th scope="col">Modalidades</th>
                    <th scope="col">Localizacion</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($career as $item)
                    <tr id='{{$item->id}}'>
                      <td>
                        <input type="hidden" id='id{{$item->id}}' value='{{$item->id}}'>
                        {{ $item->id }}
                      </td>
                      <td id='td_Area{{$item->id}}'>
                        <label id='labelEditArea{{$item->id}}'>{{ $item->area->area }}</label>
                        <input class='d-none' id="EditArea{{$item->id}}" value="{{$item->area->area }}">
                      </td>
                      <td id='td_Career{{$item->id}}'>
                        <label id='labelEditArea{{$item->id}}'>{{ $item->career }}</label>
                        <input class='d-none' id="EditArea{{$item->id}}" value="{{$item->career}}">
                      </td>
                      <td id='td_Modalidad{{$item->id}}'>
                        <label id='labelEditCareer{{$item->id}}'>{{ $item->modalidad }}</label>
                        <input class='d-none' id="EditCareer{{$item->id}}" value="{{$item->modalidad}}">
                      </td>
                      <td id='td_Address{{$item->id}}'>
                        <label id='labelEditCareer{{$item->id}}'>{{ $item->area->address->addres }}</label>
                        <input class='d-none' id="EditCareer{{$item->id}}" value="{{$item->area->address->addres}}">
                      </td>
                      <td id='td_Create{{$item->id}}'>{{ $item->created_at }}</td>
                      <td id='td_Edit{{$item->id}}'>{{ $item->updated_at }}</td>
                      <td>
                      	<a class="btn-primary btn" onclick="show({{$item->id}})" data-target='#showCareer' data-toggle='modal' href="#!"><i class="fa fa-eye"></i></a>

                        <a class="btn-danger btn" href="{{route('Careers.destroy',$item->slug)}}"><i class="fa fa-remove"></i></a>
                      
                        <a class="btn-info btn" data-target='#editCareer' data-toggle='modal'  id="btn-1_{{$item->id}}" onclick="edit({{$item->id}})" href="#!"><i class="fa fa-edit"></i></a>
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