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
					<h6 class="title c-white">Category List</h6>
					<div class="align-right">
						<a href="{{URL_CATEGORIES_ADD}}" class="btn btn-primary btn-md-2">New Category</a>
					</div>
				</div>
				<div class="ui-block-content">
				 <table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Title</th>
				      <th scope="col">About</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				   @foreach ($categories as $index => $category)

                   
                      
				   <tr>
				      <td>{{ $category->title }}</td>
				      <td>{{ $category->about_user }}</td>
				      <td>{{ ucfirst($category->status) }}</td>
				      <td><a href="{{$category->getEditPath()}}" class="btn btn-success">Edit</a>
				      <a href="javascript:void(0)" class="btn btn-primary" onClick="deleteCategory('{{$category->slug}}')">Delete</a>

				      </td>
				    </tr>
				        
				    @endforeach

				    
				  </tbody>
				</table>
				   {{ $categories->links() }}
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
		        url: "{{URL_CATEGORIES_DELETE}}",
		        data:{
		        	"_token": "{{ csrf_token() }}",
		        	"slug": slug
	        	}
	        }).done(function( msg ) {
       	
		        if(msg.status == true){
		            swal(msg.message, {
				      icon: "success",
				    });
		            window.location.href = '{{URL_CATEGORIES_LIST}}';
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