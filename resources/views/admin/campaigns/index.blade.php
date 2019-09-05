@extends('layouts.admin.layout')
@section('content')
 <div class="container">
 	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			@if(session('message'))
			<div class="flash-message">
			    @if(Session::has('type'))
			      <p class="alert alert-{{session('type')}}">{{session('message')}} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			      @endif
		  	</div> <!-- end .flash-message -->
		  	@endif
			<div class="ui-block">
				<div class="ui-block-title bg-blue">
					<h6 class="title c-white">Campaigns List</h6>
					<div class="align-right">
						<a href="{{URL_CAMPAIGNS_ADD}}" class="btn btn-primary btn-md-2">New Campaign</a>
					</div>
				</div>
				<div class="ui-block-content">
				 <table class="table">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Campaign</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				   @foreach ($campaigns as $index => $campaign)

				       
				   <tr>
				      <th scope="row">{{$campaign->id}}</th>
				      <td>{{ $campaign->campaign }}</td>
				      <td><a href="{{action('CampaignController@edit',$campaign->id)}}" class="btn btn-success" >Edit</a>
				      	<a href="javascript:void(0)" class="btn btn-primary" onClick="deletecampaign('{{$campaign->slug}}')">Delete</a>
				      </td>
				    </tr>
				       
				    @endforeach
			
				  </tbody>
				</table>
				   {{ $campaigns->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection

<script type="text/javascript">
	function deletecampaign(slug)
	{
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this Category!",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {

		  	$.ajax({
		        method: "POST",
		        url: "{{URL_CAMPAIGNS_DELETE}}",
		        data:{
		        	"_token": "{{ csrf_token() }}",
		        	"slug": slug
	        	}
	        }).done(function( msg ) {
       	
		        if(msg.status == true){
		            swal(msg.message, {
				      icon: "success",
				    });
		            window.location.href = '{{URL_CAMPAIGNS_LIST}}';
		        }else{
		        	swal(msg.message, {
				      icon: "error",
				    });
		        }
		    });
		  } 
		});
	}
</script>