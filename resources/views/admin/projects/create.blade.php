@extends('layouts/admin')

@section('content')

    <div class="container px-5 my-5" >

        <form action="{{ route('admin.projects.store') }}" method="POST">
    
            @csrf

            <div class="mb-2 form-check" >
                <label class="form-label" for="title">Title</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">
                @error('title')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="mb-2 form-check" >
                <label class="form-label" for="repo">repo</label>
                <input class="form-control @error('repo') is-invalid @enderror" type="text" id="repo" name="repo" value="{{old('repo')}}">
                @error('repo')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>

            
    
            <div class="mb-2 form-check" >
                <label class="form-label" for="description">description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="mb-2 form-check" >
                <label class="form-label" for="languages">languages</label>
                <input class="form-control @error('languages') is-invalid @enderror" type="text" id="languages" name="languages" value="{{old('languages')}}">
                @error('languages')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="mb-2 form-check" >
                <label class="form-label" for="thumb">thumb</label>
                <input class="form-control @error('thumb') is-invalid @enderror" type="text" id="thumb" name="thumb" value="{{old('thumb')}}">
                @error('thumb')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <button class="btn btn-secondary ms-4 mt-3" type="submit">Crea progetto</button>
     
        </form>
    </div>

@endsection