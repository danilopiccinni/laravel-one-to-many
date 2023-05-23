@extends('layouts/admin')

@section('content')
<section class="section-admin-index">

    <div class="my-5">
        <ul>
            @foreach ($projects as $project)
                <li>
                    <a class="cont-card" href="{{ route('admin.projects.show', $project) }}">
                      <div class="card mb-3" style="width: 70%;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{$project->thumb}}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{ $project->title }}</h5>
                              <p class="card-text">{{$project->description}}</p>
                              <p class="card-text"><small class="text-body-secondary">{{ $project->languages }}</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                </li>
            @endforeach
        </ul>

    </div>

    <a href="{{route('admin.projects.create')}}">Crea nuovo progetto</a>
    
    


</section>

@endsection