@extends('layouts.app_admin')

@section('contant')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('pointages.create') }}" style="margin-top: 94px;" class="btn btn-primary mb-3">Add score</a>
                <form method="GET" action="{{ route('pointages.search') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="employee_name" class="form-control" placeholder="Rechercher par nom...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>


                <table class="table" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Date</th>
                            <th scope="col">Hour</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pointages as $pointage)
                            <tr>
                                <th scope="row">{{ $pointage->id }}</th>
                                <td>{{ $pointage->employee->nom }} {{ $pointage->employee->prenom }}</td>
                                <td>{{ $pointage->Date }}</td>
                                <td>{{ $pointage->time }}</td>
                                <td>{{ $pointage->Type }}</td>
                                <td> <form action="{{ route('pointage.destroy', $pointage->id) }}" method="POST"  class="d-inline" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" id="delete-button">Delete</button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
            document.getElementById('delete-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le formulaire d'être soumis immédiatement
        Swal.fire({
            title: 'Es-tu sûr?',
            text: "Voulez-vous vraiment supprimer poointage d'employé ?!",
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

