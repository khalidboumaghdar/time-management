@extends('layouts.app_admin')

@section('contant')


<div class="container my-5">


    <div class="row justify-content-center">

        <div class="col-md-6" style="    margin-top: 79px;">
            @if (session('error'))
            <div class="alert alert-danger" style="    margin-top: 50px;">
            {{ session('error') }}
            </div>
            @endif
            <form method="POST" action="{{ route('countdown.store') }}" id="countdown-form">
                @csrf
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Employee:</label>
                    <select name="employee_id" id="employee_id" class="form-control" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ (old('employee_id') == $employee->id) ? 'selected' : '' }}>
                                {{ $employee->nom }} {{ $employee->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Enter the date:</label>
                    <input type="date" class="form-control"  name="date" id="countdown-date" required>
                </div>
                <div class="form-group">
                    <label for="time">Enter the time:</label>
                    <input type="time" class="form-control"  name="time" id="countdown-time" required>
                </div>
                <div class="form-group mb-3">
                    <label for="type">Type of holiday</label>
                    <input type="text" class="form-control"  name="type" id="type" required>
                </div>
                <button type="submit" class="btn btn-primary" id="countdown-button" >Ajouter</button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>

                <th >Employee</th>
                <th>Date</th>
                <th>Time</th>
                <th>Type Holidays</th>
                <th>Countdown Timer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="countdown-table-body">
            @foreach ($vacanes as $vacane)
            <tr>

                <td>
                    @if ($vacane->employee)
                        {{ $vacane->employee->nom }} {{ $vacane->employee->prenom }}
                    @endif
                </td>
                <td class="countdown-date">{{ $vacane->date }}</td>
                <td class="countdown-time">{{ $vacane->time }}</td>
                <td>{{ $vacane->type }}</td>
                <td>
                  <p class="demo"></p>
                </td>
                <td>
                    <form action="{{ route('vacances.destroy', $vacane->id) }}" method="POST" class="d-inline" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id="deleteBtn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script>
    function startCountdown() {
      var countdowns = document.querySelectorAll("tbody tr");
      countdowns.forEach(function(countdown) {
        var demo = countdown.querySelector(".demo");
        var countdownDateTime = countdown.querySelector(".countdown-date").textContent + " " + countdown.querySelector(".countdown-time").textContent;
        var endTime = new Date(countdownDateTime).getTime();
        var now = new Date().getTime();
        var distance = endTime - now;

        if (distance <= 0) {
  demo.innerHTML = "EXPIRED";
  var deleteBtn = document.getElementById("deleteBtn");

  deleteBtn.click();
}
 else {
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          var countdownStr = "";
          if (days > 0) countdownStr += days + "d ";
          if (hours > 0) countdownStr += hours + "h ";
          if (minutes > 0) countdownStr += minutes + "m ";
          countdownStr += seconds + "s ";
          demo.innerHTML = countdownStr;
        }
      });

      setTimeout(startCountdown, 1000);
    }

    setTimeout(startCountdown, (1000 - new Date().getTime() % 1000));





    document.getElementById('delete-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le formulaire d'être soumis immédiatement
        Swal.fire({
            title: 'Es-tu sûr?',
            text: "Voulez-vous vraiment supprimer vacances d'employé ?!",
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
