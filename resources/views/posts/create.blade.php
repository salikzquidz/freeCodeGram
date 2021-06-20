@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="POST">
    @csrf    
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Add New Post</h2>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Post caption') }}</label>

                        <input 
                        id="caption"
                        name="caption" 
                        type="text" 
                        class="form-control @error('caption') is-invalid @enderror"  
                        value="{{ old('caption') }}" 
                         autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('caption') }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Post Image') }}</label>
                    <input type="file", class="form-control-file" id="image" name="image" >

                        @error('image')
                                <strong>{{ $errors->first('image') }}</strong>
                        @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
