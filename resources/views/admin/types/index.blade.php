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
                    <td scope="row">{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td><a href="{{route('admin.types.show', $type)}}">apri</a></td> 
                </tr>
                @endforeach
            </table>
        </tbody>

        
</div>

@endsection