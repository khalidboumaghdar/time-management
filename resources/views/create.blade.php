@extends('layouts.app_admin')

@section('contant')
<div class="container">
    <h1>Add Employee</h1>
    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label style="margin-top: 90px" for="cin">CIN</label>
            <input type="text" name="cin" id="cin" class="form-control @error('cin') is-invalid @enderror" value="{{ old('cin') }}">
            @error('cin')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nom">Name</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
            @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">First name</label>
            <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}">
            @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="poste">Department</label>
            <input type="txt" name="poste" id="poste" class="form-control @error('poste') is-invalid @enderror" value="{{ old('poste') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="photo">Picture</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
</div>
@endsection
