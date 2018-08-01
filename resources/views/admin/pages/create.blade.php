@extends('admin.main')

@section('title', '| Add New Page')

@section('content')

	<div class="container">

		{{-- Check if current user is logged-in or a guest --}}
		@if (Auth::guest())

			<p class="mt-5">Please <a href="/login/">login</a> to add a new Page.</p>

        @else

			<div class="blog-header">
		        <h1 class="blog-title">Add New Page</h1>
		    </div>

			<div class="row">
				<div class="col-12">

					<form enctype="multipart/form-data" action="{{ route('pages.store') }}" method="POST" id="save-page">
						{{ csrf_field() }}
                        {{-- <input type="hidden" name="author_ID" value="{{ Auth::id() }}" /> --}}

						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title">Title</label> <br/>
							<input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control col-5" />

							@if ($errors->has('title'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('title') }}</strong>
	                            </span>
	                        @endif
                        </div>

						<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
							<label for="slug">Slug</label> <br/>
							<input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control col-5" />

							@if ($errors->has('slug'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('slug') }}</strong>
	                            </span>
	                        @endif
                        </div>

						<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content1">Content</label> <br/>
                            {{--  <textarea name="content" id="content1" cols="65" rows="6">{{ old('content') }}</textarea>  --}}

                            <textarea id="my-editor" class="form-control" name="content" rows="10" cols="80">{{ old(htmlspecialchars('content')) }}</textarea>

							@if ($errors->has('content'))
	                            <span class="help-block">
	                                <small class="red-text">{{ $errors->first('content') }}</small>
	                            </span>
	                        @endif
                        </div>

                        <label for="status">Status</label> <br/>

                        <div class="btn-group {{ $errors->has('status') ? ' has-error' : '' }}" data-toggle="buttons">
                            <label class="btn btn-sm btn-secondary form-check-label">
                                <input class="form-check-input" type="radio" checked autocomplete="off" name="status" value="published"> Published
                            </label>

                            <label class="btn btn-sm btn-secondary form-check-label">
                                <input class="form-check-input" type="radio" autocomplete="off" name="status" value="drafted"> Drafted
                            </label>
                        </div>

                        <hr>

						<div class="form-group">
							<button type="submit" class="btn btn-indigo" value="CREATE">Create</button>
							<a class="btn btn-elegant" href="{{ route('pages.index') }}">Cancel</a>
						</div>
					</form>

				</div>
			</div>

		@endif

	</div>

@endsection
