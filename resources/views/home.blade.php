@extends('layouts.appDashboard')
@section('title','| Dashboard')
@section('nameTitleTemplate','Dashboard')
@section('header')
@include('layouts.header.headerDashboard')
@endsection
@section('js')
<script>
	$('#areaOp').click(function(){
		var career=$('#careerProfile');
		var area=$('#areaOp');
		selectHidden(area,career);

	});
	$('#careerProfile').click(function(){
		var career=$('#careerProfile');
		var matter=$('#matterOp');
		var area=$('#areaOp');
						      
    	// career.html('');
		// alert(APP_URL+"/Career/Show/"+area.val());
		$.ajax({
			method: "GET",
			url: APP_URL+"/Career/Show/"+area.val(),
			dataType: "json",
			success: function (response) {
				
				// console.log(respose);
				for (var i=0; i<response.length;i++) {
					$('#careerProfile').append('<option value="'+response[i].id+'">'+response[i].career+'</option>');
				}
			}
		});

    	selectHidden(area,matter);
	});
	$('#matterOp').click(function(){
		var career=$('#careerProfile');
		var matter=$('#matterOp');
		$.ajax({
			method: "GET",
			url: APP_URL+"/Matter/Show/"+career.val(),
			dataType: "json",
			success: function (response) {
				for (var i=0; i<response.length;i++) {
					matter.append('<option value="'+response[i].id+'">'+response[i].matter+'</option>');
				}
			}
		});

	});
	function selectHidden(atr1,atr2){
		if(atr1.val()==0){
			atr2.addClass('d-none');
			return false;
		}else{
			atr2.removeClass('d-none');
			atr2.val(0);
			return true;
		}
	}
	



</script>
@endsection
@section('content')
@if(Auth::user()->hasRole(1) && !isset($matter_user))  
	@include('layouts.modales.profile.profileModal')
@endif
<div class="row">
	
</div>
@endsection
