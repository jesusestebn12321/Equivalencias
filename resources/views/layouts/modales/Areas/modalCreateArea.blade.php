<div class="modal fade" id="createArea">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-user"></span> 
                        Crear Area
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('Areas.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                        <input id="area" type="text" placeholder="Nombre de la Area" class="form-control" name="area" autofocus required >
                        @if ($errors->has('area'))
                        <span class="help-block">
                            <strong>{{ $errors->first('area') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('career_id') ? ' has-error' : '' }}">
                        <h4 style="text-align:center;">Carreras</h4><hr class="bg-blue mb-2 mt-2 display-3 col-2">
                        <div class="row">
                            @foreach($career as $item)
                            <div class="col">
                                <input type="checkbox" value="{{$item->id}}" class='custom-checkbox' name="career{{$item->id}}"><label>{{$item->career}}</label> 
                            </div>
                            @endforeach                   
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address_id') ? ' has-error' : '' }}">
                     <select id="address_id" class='form-control' value='0' name="address_id" size='1'>       
                        <option value="0">Direccriones</option>
                        @foreach($address as $item)
                        <option value="{{$item->id}}">{{$item->id}} - {{$item->addres}}</option>
                        @endforeach                   
                    </select>
                </div>
            </div>
            <div class="modal-footer"> 
                <div class='container'>
                    <div class="row">        
                        <div class="col-12">
                           <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
</div>