@extends('admin.main')

@section('title', '| Edit Page')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Who are you ?, please <a href="/login/">login</a> to continue.</p>

		@else
			<div class="blog-header">
		        <h1 class="blog-title">Edit Page <a class="btn btn-sm btn-primary" href="{{ route('pages.show', $page->id) }}">Preview Changes</a></h1>
		    </div>

			<div class="row">
				<div class="col-12">

					{{--
						Check route:list for `posts.update` for more info
						URL is posts/{page}, `{page}` meaning that we have to supply ID
					--}}
					<form enctype="multipart/form-data" action="{{ route('pages.update', $page->id) }}" method="POST" id="save-Upage">
						{{ csrf_field() }}

						{{--
							HTML forms do not support PUT, PATCH or DELETE actions.
							So, when defining PUT, PATCH or  DELETE routes that are called from an HTML form,
							you will need to add a hidden _method field to the form.
						--}}
						{{ method_field('PUT') }}

						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title">Title</label> <br/>
							<input type="text" name="title" id="title" value="{{ $page->title }}" class="form-control col-5" />

							@if ($errors->has('title'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('title') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
							<label for="slug">Slug</label> <br/>
							<input type="text" name="slug" id="slug" value="{{ $page->slug }}" class="form-control col-5" />

							@if ($errors->has('slug'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('slug') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
							<label for="content1">Content</label> <br/>

                            <textarea id="my-editor" class="form-control" name="content" rows="10" cols="80">{{ $page->content }}</textarea>

							@if ($errors->has('content'))
	                            <span class="help-block">
	                                <small class="red-text">{{ $errors->first('content') }}</small>
	                            </span>
	                        @endif
                        </div>

                        <label for="status">Status</label> <br/>
                        <div class="btn-group {{ $errors->has('status') ? ' has-error' : '' }}" data-toggle="buttons">
                            <label class="btn btn-sm btn-secondary form-check-label">
                                <input class="form-check-input" type="radio" checked autocomplete="off" name="status" value="published" {{ $page->status == 'published' ? 'checked' : '' }}> Published
                            </label>

                            <label class="btn btn-sm btn-secondary form-check-label">
                                <input class="form-check-input" type="radio" autocomplete="off" name="status" value="drafted" {{ $page->status == 'drafted' ? 'checked' : '' }}> Drafted
                            </label>
                        </div>

                        <hr>

						<div class="form-group">
							<button type="submit" class="btn btn-indigo" value="Update">Update</button>
							<a class="btn btn-elegant" href="{{ route('pages.index') }}">Cancel</a>
						</div>
					</form>

				</div>
			</div>

		@endif

	</div>

@endsection
