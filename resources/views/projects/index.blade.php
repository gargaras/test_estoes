@extends('layouts.app')

@section('buttons')

<div class="row justify-content-between">
    <div class="col-4"><h2 class="text-center mb-5"><b>My Proyects</b> </h2></div>
    <div class="col-4"><a href="{{ route('projects.create') }}" class="btn btn-danger mr-2 text-white"><i class="fa fa-plus-circle" aria-hidden="true"></i><b>&nbsp; Add</b></a></div>
  </div>

@endsection

@section('content')
    

    <div class="col-md-10 d-none d-sm-block mx-auto bg-white p-3">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-danger text-light">
                    <tr>
                        <th scope="col">Project info</th>
                        <th scope="col">Description</th>
                        <th scope="col">Project Manager</th>
                        <th scope="col">Assigned to</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projets as $project)
                    <tr>
                        <td>{{ $project->project_info }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->manager->name }}</td>
                        <td>{{ $project->employe->name }}</td>
                        <td>
                            @foreach ($proyectStatuss as $proyectStatus)
                                @if($project->fk_idstatus == $proyectStatus->id)
                                    {{ $proyectStatus->status }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-white"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{ route('projects.delete', $project->id) }}" class="btn btn-white"><i class="fa fa-trash" aria-hidden="true"></i></a>                 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 d-md-none d-lg-none bg-white p-3">

        @foreach ($projets as $project)

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="dropdown">
                            <button class="btn btn-danger" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-white"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{ route('projects.delete', $project->id) }}" class="btn btn-white"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <h5 class="card-title">{{ $project->project_info }}</h5>
                        <p class="card-text">create date: {{ $project->created_at }} </p>
                        <p class="card-text"><small class="text-muted">{{ $project->manager->name }}</small></p>
                        
                        <img width="10%" class="rounded-circle" src="data:image/jpeg;base64,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" alt="profile image">
                    </div>
                
                </div>
            </div>    
        </div>
        

        @endforeach

        

    </div>









@endsection

@section('scripts')

<script src="https://use.fontawesome.com/4c56725b8d.js"></script>

@endsection

@section('style')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" rel="stylesheet" />


@endsection