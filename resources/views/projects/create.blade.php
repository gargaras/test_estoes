@extends('layouts.app')

@section('styles')
   
@endsection

@section('buttons')

<div class="row justify-content-between">
    
    <div class="col-4"><a href="{{ route('projects.index') }}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-circle-left w-6 h-6 icono"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg> Back</b></a></div>
  
  <div class="col-4"><h2 class="text-center mb-5"><b>Add Proyect</b> </h2></div>
</div>
@endsection

@section('content')
    

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form 
                action=" {{route('projects.store')}} "
                method="POST"
                novalidate
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form-group">
                    <label for="project_info">Project name</label>
                    <input
                        type="text"
                        name="project_info"
                        id="project_info"
                        placeholder="Project name"
                        class="form-control @error ('project_info') is-invalid @enderror"
                        value="{{ old('project_info') }}"
                        required
                    >
                    @error('project_info')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{$message}} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input
                        type="text"
                        name="description"
                        id="description"
                        placeholder="Description"
                        class="form-control @error ('description') is-invalid @enderror"
                        value="{{ old('description') }}"
                        required
                    >
                    @error('description')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{$message}} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fk_idproject_manager">Project Manager</label>
                    <select 
                        name="fk_idproject_manager"
                        id="fk_idproject_manager"
                        class="form-control @error('fk_idproject_manager') is-invalid @enderror"
                    >
                        <option value="">Select person</option>
                        @foreach ($managers as $manager)
                            <option 
                                value="{{ $manager->id }}"
                                {{ old('fk_idproject_manager') == $manager->id ? 'selected' : ''}}
                            >
                                {{$manager->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('fk_idproject_manager')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fk_idassigned_to">Assigned to</label>
                    <select 
                        name="fk_idassigned_to"
                        id="fk_idassigned_to"
                        class="form-control @error('fk_idassigned_to') is-invalid @enderror"
                    >
                        <option value=""> Select person </option>
                        @foreach ($employes as $employe)
                            <option 
                                value="{{ $employe->id }}"
                                {{ old('fk_idassigned_to') == $employe->id ? 'selected' : ''}}
                            >
                                {{$employe->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('fk_idassigned_to')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fk_idstatus">Status</label>
                    <select 
                        name="fk_idstatus"
                        id="fk_idstatus"
                        class="form-control @error('fk_idstatus') is-invalid @enderror"
                    >
                        <option value=""> Select status </option>
                        @foreach ($proyectStatuss as $proyectStatus)
                            <option 
                                value="{{ $proyectStatus->id }}"
                                {{ old('fk_idstatus') == $proyectStatus->id ? 'selected' : ''}}
                            >
                                {{$proyectStatus->status}}
                            </option>
                        @endforeach
                    </select>
                    @error('fk_idstatus')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="Create Proyect">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js" integrity="sha512-zEL66hBfEMpJUz7lHU3mGoOg12801oJbAfye4mqHxAbI0TTyTePOOb2GFBCsyrKI05UftK2yR5qqfSh+tDRr4Q==" crossorigin="anonymous" defer></script>
@endsection