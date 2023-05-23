@extends('layouts/admin')

@section('content')

<div class="container">

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
        <tr>
          <th scope="row">{{$type->name}}</th>
          <td>{{$type->description}}</td>
        </tr>
        @endforeach
    </tbody>
      </table>

</div>

@endsection