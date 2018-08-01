@extends('admin.main')

@section('title', '| Add New Post')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

		@else
			<div class="blog-header">
		        <h1 class="blog-title">Edit Post <a class="btn btn-sm btn-primary" href="{{ route('posts.show', $post->id) }}">Preview Changes</a></h1>
            </div>

            @include('alert.flash-message')

			<div class="row">
				<div class="col-12">

					{{--
						Check route:list for `posts.update` for more info
						URL is posts/{post}, `{post}` meaning that we have to supply ID
					--}}
					<form enctype="multipart/form-data" action="{{ route('posts.update', $post->id) }}" method="POST" id="save-Upost">
						{{ csrf_field() }}

						{{--
							HTML forms do not support PUT, PATCH or DELETE actions.
							So, when defining PUT, PATCH or  DELETE routes that are called from an HTML form,
							you will need to add a hidden _method field to the form.
						--}}
						{{ method_field('PUT') }}

						<input type="hidden" name="author_ID" value="{{ Auth::id() }}" />
						<input type="hidden" name="post_type" value="post" />

						<div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
							<label for="post_title">Title</label> <br/>
							<input type="text" name="post_title" id="post_title" value="{{ $post->post_title }}" class="form-control col-5" />

							@if ($errors->has('post_title'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('post_title') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="form-group{{ $errors->has('post_slug') ? ' has-error' : '' }}">
							<label for="post_slug">Slug</label> <br/>
							<input type="text" name="post_slug" id="post_slug" value="{{ $post->post_slug }}" class="form-control col-5" />

							@if ($errors->has('post_slug'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('post_slug') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
							<label for="post_content">Content</label> <br/>
                            {{--  <textarea name="post_content" id="post_content" cols="65" rows="6">{{ $post->post_content }}</textarea>  --}}

                            <textarea id="my-editor" class="form-control" name="post_content" rows="10" cols="80">{{ $post->post_content }}</textarea>

							@if ($errors->has('post_content'))
	                            <span class="help-block">
	                                <small class="red-text">{{ $errors->first('post_content') }}</small>
	                            </span>
	                        @endif
						</div>

						<div class="form-group">
							<label for="title">Category</label> <br/>

							<?php $categories = Helper::get_categories(); ?>
							<select name="category_ID" id="category_ID" class="custom-select browser-default col-5">
								<?php
									if( $categories ) {
										foreach( $categories as $category ) {
											?>
												<option value="{{ $category->id }}" {{ $category->id == $post->category_ID ? 'selected="selected"' : '' }}>{{ $category->category_name }}</option>
											<?php
										}
									}
								?>
							</select>
						</div>

						<div class="form-group {{ $errors->has('post_thumbnail') ? ' has-error' : '' }}">
                            <label class="btn btn-outline-primary" for="post_thumbnail">
                                <input type="file" class="custom-file-input" name="post_thumbnail" id="post_thumbnail" style="display:none;" onchange="$('#upload-file-info').html(this.files[0].name)">
                                Upload Thumbnail
                            </label>
                            <span class='label label-info brown-text' id="upload-file-info">{{ $post->post_thumbnail }}</span>

                            @if ($errors->has('post_thumbnail'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('post_thumbnail') }}</strong>
	                            </span>
	                        @endif
                        </div>

						<div class="form-group">
							<button type="submit" class="btn btn-indigo" value="Update">Update</button>
							<a class="btn btn-elegant" href="{{ route('posts.index') }}">Cancel</a>
						</div>
					</form>

				</div>
			</div>

		@endif

	</div>

@endsection
