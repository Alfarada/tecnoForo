@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear post') }}</div>

                <div class="card-body">

                    {{-- Open Form --}}
                    
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        {{-- Field Title --}}
                        
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autofocus>

                                @error('title')
                                    <span dusk="title-error" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Field Comment --}}

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Contenido') }}</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}"  >

                                @error('content')
                                    <span dusk="content-error" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Button Container --}}
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Publicar') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
