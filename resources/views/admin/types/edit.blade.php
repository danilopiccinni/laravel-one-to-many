@extends('layouts/admin')

@section('content')

    <div class="container px-5 my-5" >

        <form action="{{ route('admin.types.update', $type) }}" method="POST">
    
            @csrf
            @method('PUT')

            <div class="mb-2 form-check" >
                <label class="form-label" for="name">Nome:</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name') ?? $type->name}}">
                @error('name')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="mb-2 form-check" >
                <label class="form-label" for="description">Descrizione:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description">{{old('description') ?? $type->name}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>

            <button class="btn btn-secondary ms-4 mt-3" type="submit">Attua modifiche</button>
     
        </form>
    </div>

@endsection