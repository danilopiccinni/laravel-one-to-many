@extends('layouts/admin')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body">
                      <h5 class="card-title">{{$type->name}}</h5>
                      <p class="card-text">{{$type->description}}</p>
                      <a href="{{ route('admin.types.edit', $type) }}" class="card-link btn btn-primary">Modifica</a>
                      <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">ELIMINA</button>

                      </form>
                    </div>
                  </div>

            </div>
        </div>


    </div>
@endsection