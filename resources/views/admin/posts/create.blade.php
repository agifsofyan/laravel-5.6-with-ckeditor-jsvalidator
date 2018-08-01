@extends('admin.main')
{{--  @extends('admin.partials._textarea')  --}}

@section('title', '| Add New Post')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Please <a href="/login/">login</a> to add a new post.</p>

		@else

			<div class="blog-header">
		        <h1 class="blog-title">Add New Post</h1>
            </div>

            @include('alert.flash-message')

			<div class="row">
				<div class="col-12">

					<form enctype="multipart/form-data" action="{{ route('posts.store') }}" method="POST" id="save-post">
                        {{ csrf_field() }}
                        <?php $categories = Helper::get_categories(); ?>

                        <input type="hidden" name="author_ID" value="{{ Auth::id() }}" />
                        <input type="hidden" name="post_type" value="post" />

						<div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
							<label for="post_title">Title</label> <br/>
							<input type="text" name="post_title" id="post_title" value="{{ old('post_title') }}" class="form-control col-5" />

							@if ($errors->has('post_title'))
	                            <span class="help-block">
	                                <small class="red-text">{{ $errors->first('post_title') }}</small>
	                            </span>
	                        @endif
						</div>

						<div class="form-group{{ $errors->has('post_slug') ? ' has-error' : '' }}">
							<label for="post_slug">Slug</label> <br/>
							<input type="text" name="post_slug" id="post_slug" value="{{ old('post_slug') }}" class="form-control col-5"/>

							@if ($errors->has('post_slug'))
	                            <span class="help-block">
	                                <small class="red-text">{{ $errors->first('post_slug') }}</small>
	                            </span>
	                        @endif
						</div>

						<div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
							<label for="post_content">Content</label> <br/>

                            <textarea id="my-editor" class="form-control" name="post_content" rows="10" cols="80">{{ old('post_content') }}</textarea>

							@if ($errors->has('post_content'))
	                            <span class="help-block">
	                                <small class="red-text">{{ $errors->first('post_content') }}</small>
	                            </span>
	                        @endif
						</div>

						<div class="form-group">
							<label for="title">Category</label> <br/>


							<select name="category_ID" id="category_ID" class="custom-select browser-default col-5">
								<?php
									if( $categories ) {
										foreach( $categories as $category ) {
											?>
												<option value="{{ $category->id }}">{{ $category->category_name }}</option>
											<?php
										}
									}
								?>
							</select>
						</div>

						<div class="form-group">
                            <label class="btn btn-outline-primary" for="post_thumbnail">
                                <input type="file" class="custom-file-input" name="post_thumbnail" id="post_thumbnail" style="display:none;" onchange="$('#upload-file-info').html(this.files[0].name)">
                                Upload Thumbnail
                            </label>
                            <span class='label label-info brown-text' id="upload-file-info"></span>
                        </div>

						<div class="form-group">
							<button type="submit" class="btn btn-indigo" value="Publish">Create</button>
							<a class="btn btn-elegant" href="{{ route('posts.index') }}">Cancel</a>
						</div>
					</form>

				</div>
            </div>
        @endif
    </div>
@endsection
