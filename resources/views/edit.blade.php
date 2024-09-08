@extends('layouts.app_admin')

@section('contant')
<div class="container " >

<form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')

    <div>

        <label style="margin-top: 90px" for="cin">Cin</label>
        <input type="text" class="form-control" id="cin" name="cin" value="{{$employee->cin}}" readonly >
    </div>
    <div>
        <label for="nom">Name</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{$employee->nom}}">
    </div>
    <div>
        <label for="prenom">First name</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="{{$employee->prenom}}">
    </div>
    <div class="mb-3">
        <label for="poste">Department</label>
        <input type="text" class="form-control" id="poste" name="poste" value="{{$employee->poste}}">
    </div>
    <div class="mb-3">
        <label for="image">Picture :</label>
        <input type="file" class="form-control" name="photo"  id="image">
        <img  src="{{ asset('images/' . $employee->photo) }}" alt="{{ $employee->nom }}" width="100">
    </div>

    <button type="submit" class="btn bg-warning">Update</button>
</form>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>
@endsection
