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
					<h6 class="title c-white">Challenge List</h6>
					<div class="align-right">
						<a href="{{route('challenges_add')}}" class="btn btn-primary btn-md-2">New Challenge</a>
					</div>
				</div>
				<div class="ui-block-content">
				 <table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
                      <th scope="col">Image</th>
                      <th scope="col">Category</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				   @foreach ($challenges as $challenge)

				   <tr>
				      <th scope="row">1</th>
				      <td>{{ $challenge->title }}</td>
				      <td><img src="{{ $challenge->getImage() }}" /></td>
                      <td>{{ $challenge->cagetory() }}</td>
				      <td>{{ $challenge->status }}</td>
				      <td><a href="{{$challenge->getEditPath()}}" class="btn btn-success">Edit</a>
				      	 <a href="javascript:void(0)" class="btn btn-primary" onClick="deleteCategory('{{$challenge->slug}}')">Delete</a>

				      </td>
				    </tr>
				        
				    @endforeach
				    
				  </tbody>
				</table>
				   {{ $challenges->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection

<script type="text/javascript">
	function deleteCategory(slug)
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
		        url: "{{URL_CHALLENGES_DELETE}}",
		        data:{
		        	"_token": "{{ csrf_token() }}",
		        	"slug": slug
	        	}
	        }).done(function( msg ) {
       	
		        if(msg.status == true){
		            swal(msg.message, {
				      icon: "success",
				    });
		            window.location.href = '{{URL_CHALLENGES_LIST}}';
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