@extends('layouts/admin')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body">
                      <h5 class="card-title">{{$type->name}}</h5>
                      <p class="card-text">{{$type->description}}</p>
                      <a href="{{ route('admin.types.edit', $type) }}" class="card-link">Modifica</a>
                      <a href="#" class="card-link">Eliminia</a>
                    </div>
                  </div>

            </div>
        </div>


    </div>
@endsection