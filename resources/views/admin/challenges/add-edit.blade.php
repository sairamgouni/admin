@extends('layouts.admin.layout')

@section('content')

<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title bg-blue">
					<h6 class="title c-white">Create a New Challenge</h6>
					<div class="align-right">
						<a href="{{route('challenge_list')}}" class="btn btn-primary">Challenges</a>
					</div>
				</div>
				<div class="ui-block-content">
				
		@if($record)
		
            {{ Form::model($record, 
            array('url' => 'admin/challenges/edit/'.$record->slug, 
            'method'=>'patch','novalidate'=>'','name'=>'formUsers ', 'files'=>'true' )) }}

          @else

            {!! Form::open(array('url' => 'admin/challenges/add', 'method' => 'POST', 'name'=>'formUsers ', 'files'=>'true')) !!}
          @endif

						<div class="row">
                          <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Title</label>
									<?php
							             $title  = '';
							             if($record)
							             {
							              	if($record->title)
							              	$title  = $record->title;
							             }
             						?>
									<input class="form-control" type="text" name="title" placeholder="Title here" value="{{$title}}">
								</div>
							</div>
					
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
									<label class="control-label">Categories</label>
									<?php

							             if($record)
							             {
							              	if($record->category_id)
							              	$category_id  = $record->category_id;
							             }

             						?>
                    {!! Form::select('category_id', $category, old('category_id')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif

									
								</div>
								<?php
			             	if($record) {
     						?>
								<input type="hidden" name="id" value="{{$record->id}}"  class="form-control">
								<input type="hidden" name="slug" value="{{$record->slug}}"  class="form-control">
							<?php 
								}
							?>
							</div>
					
						
					
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Description</label>
									<?php
							             $about_user  = '';
							             if($record)
							             {
							              	if($record->about_user)
							              	$about_user  = $record->about_user;
							             }
             						?>
									<textarea class="form-control" style="height: 140px" name="about_user">{{$about_user}}</textarea>
								</div>
					
								
							</div>
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Image</label>
									<input class="form-control" type="file" name="image" placeholder="Choose Optional Tags">
								</div>
							</div>
					
							<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">Status</label>
									<?php
							             $status  = null;
							             if($record)
							             {
							              	if($record->status)
							              	$status  = $record->status;
							             }

							             $options = array('active'=>'Active','inactive'=>'Inactive');
             						?>
             						{!!Form::select('status', $options, $status)!!}
									
								</div>
								<?php
			             	if($record) {
     						?>
								<input type="hidden" name="id" value="{{$record->id}}"  class="form-control">
								<input type="hidden" name="slug" value="{{$record->slug}}"  class="form-control">
							<?php 
								}
							?>
							</div>
							
							
					
                            <div class="col col-xl-2 col-lg-2 col-md-3 col-sm-3 col-3">
								<button class="btn btn-blue  btn-small">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>

		
	</div>
</div>

<!-- ... end Window Popup Favourite Page -->
@endsection