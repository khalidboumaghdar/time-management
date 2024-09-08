<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Système de pointage</title>
    <!-- Ajouter le lien vers Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/urbine.jpg')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
.kk{
  width: 331px;
    padding: 0;
    margin: 27px;
    margin-left: -36px;
    margin-top: 40px;
    background-color: #10101E;
    box-shadow: none;
}
.form-label {
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #2196F3;
}
.form-control {
color: white

}
.form-control:focus{
    color: white
}

	</style>
  </head>

  <body onload="inclock()">
    <div class="container-build" id="c">
    <h1 class="text-center">Pointing system</h1>
  </div>
  <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

      <li class="nav-item dropdown">
        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
          aria-expanded="false"  style="    position: relative;
          top: -76px;
          left: -100px;">
          <img src="{{asset('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
          <div class="message-body">
            <a href="{{route('profile.editt')}}" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-user fs-6"></i>
              <p class="mb-0 fs-3">{{Auth::user()->name}}</p>
            </a>


            {{-- <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a> --}}
            <form action="{{route('logout')}}" method="post">
                @csrf
            <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault(); this.closest('form').submit();">logout</a></li>
        </form>

          </div>
        </div>
      </li>
    </ul>
  </div>


    <div class="time">
      <span id="hour">00 </span>:
      <span id="minutes">00</span>:
      <span id="secondes">00 </span>
      <span id="period">AM</span>
    </div>
  </div>
  <div class="datetime">
    <div class="date">
      <span id="dayname">Day </span>,
      <span id="daymun">00 </span>,
      <span id="month"> Month</span>,
      <span id="year">Year</span>
  </div>
    <div class="container" id="b">
        @if (session('error'))
        <script>
          Swal.fire({
            title: 'Error',
            text: '{{ session('error') }}',
            icon: 'error'
          })
        </script>
      @endif
      <form method="POST" class="form" action="{{ route('pointage.storee') }}">
        @csrf
        <div class="form-group">
          <label for="employe">Employee:</label>
          <select name="employee_id" id="employee_id" class="form-control" required>
           @foreach($employees as $employee)
          @php $match_found = false @endphp
          @foreach($vacanes as $vacane)
              @if ($employee->id == $vacane->employee_id)
                  @php $match_found = true @endphp
                  @break
              @endif
          @endforeach
          @unless($match_found)
              <option value="{{ $employee->id }}" {{ (old('employee_id') == $employee->id) ? 'selected' : '' }}>
                  {{ $employee->nom }} {{ $employee->prenom }}
              </option>
          @endunless
      @endforeach
        </select>
        </div>
        <div class="form-group">
          <label for="date">Date:</label>
          <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="heure_entree">Time:</label>
          <input type="time" name="time" id="time" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Type:</label>
          @if(isset($employee) && $employee->Type === "Entrer" && $employee->Date === $date)
          <div class="form-check" style="display:none">
              <input class="form-check-input" type="radio" name="type" id="type-in" value="Entrer" checked>
              <label class="form-check-label" for="type-in">
                Enter
              </label>
          </div>
      @else
          <div class="form-check">
              <input class="form-check-input" type="radio" name="type" id="type-in" value="Entrer" required>
              <label class="form-check-label" for="type-in">
                Enter
              </label>
          </div>
      @endif
          <div class="form-check">
              <input class="form-check-input" type="radio" name="type" id="type-out" value="Sortie" required>
              <label class="form-check-label" for="type-out">
                Exit
              </label>
          </div>
      </div>
        <button type="submit"  class="btn btn-primary btn-lg btn-block " id="t">Enregistrer</button>
      </form>
    </div>
    <!-- Ajouter les liens vers les fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function updateClock(){
        var now=new Date();
        var dname=now.getDay(),
        mo=now.getMonth(),
        dnum=now.getDate(),
        yr=now.getFullYear(),
        hou=now.getHours(),
        min=now.getMinutes(),
        sec=now.getSeconds(),
        pe="AM";
        if (hou==0) {
          hou=12;
        }

        if (hou>12) {
          hou=hou-12;
          pe="PM";
        }
        Number.prototype.pad=function(digits){
        for (var n=this.toString();n.length <digits;n=0+n);
        return n;
        }

        var Month=["Janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
        var jour=["demarche","lundi","	mardi","mercredi","jeudi","vendredi","samedi"];
        var ids=["dayname","month","daymun","year","hour","minutes","secondes","period"];
        var vl=[jour[dname], Month[mo],dnum,yr,hou.pad(2),min.pad(2),sec.pad(2),pe];
        for (var i = 0; i <ids.length ; i++) {
          document.getElementById(ids[i]).firstChild.nodeValue=vl[i];

        }

      }
      function inclock(){
        updateClock();
        window.setInterval("updateClock()",1)
      }

    </script>
      <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
      <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
      <script src="{{asset('assets/js/app.min.js')}}"></script>
      <script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
      <script src="{{asset('assets/js/dashboard.js')}}"></script>


  </body>
</html>
