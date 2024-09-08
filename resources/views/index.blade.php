@extends('layouts.app_admin')

@section('contant')

<div class="container">

    <h1>Employees</h1>
    <a href="{{ route('employees.create') }}" style="margin-top: 50px" class="btn btn-primary mt-50">Ajouter Employee</a>
    <form action="{{ route('employees.search') }}" method="GET" class="my-4">
        <div class="input-group">
            <input type="text" class="form-control" name="name" placeholder="Search by name">


                <button type="submit" class="btn btn-primary">Search</button>

        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>CIN</th>
                <th>Name</th>
                <th>First name</th>
                <th>Department</th>
                <th>Pictures</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)

            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->cin }}</td>
                <td>{{ $employee->nom }}</td>
                <td>{{ $employee->prenom }}</td>
                <td>{{ $employee->poste }}</td>
                <td><img src="{{ asset('images/' . $employee->photo) }}" alt="{{ $employee->nom }}" width="50"></td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline" id="delete-form">
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger" id="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
      document.getElementById('delete-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le formulaire d'être soumis immédiatement
        Swal.fire({
            title: 'Es-tu sûr?',
            text: "Voulez-vous vraiment supprimer l'employé ?!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimez-le!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                // Ajouter ici le code pour supprimer effectivement le fichier en appelant la route de suppression
                document.getElementById('delete-form').submit(); // Soumettre le formulaire de suppression une fois confirmé
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Annulé',
                    'Votre dossier est en sécurité :)',
                    'error'
                )
            }
        })
    })
</script>
@endsection

