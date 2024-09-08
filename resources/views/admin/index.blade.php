@extends('layouts.app_admin')

@section('contant')

<div class="container">



    <table class="table" style="        position: relative;
    top: 105px;
    left: 108px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>email_verified_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Admin as $Admins)
            <tr>
                <td>{{ $Admins->id }}</td>
                <td>{{ $Admins->name }}</td>
                <td>{{ $Admins->email }}</td>
                <td>{{ $Admins->utype }}</td>
                <td>{{ $Admins->email_verified_at }}</td>
                <td>
                    <a href="{{ route('admin.edit', $Admins->id) }}" class="btn btn-primary">Modifier</a>

                    <form action="{{ route('admin.destroy', $Admins->id) }}" method="POST" class="d-inline" id="delete-form">
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
    text: "Voulez-vous vraiment supprimer utilisateur?!",
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

