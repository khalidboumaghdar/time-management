@extends('layouts.app_admin')

@section('contant')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Add a score
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger" style="    margin-top: 50px;">
                        {{ session('error') }}
                        </div>
                        @endif
                    <div class="card-body">

                        <form method="POST" action="{{ route('pointage.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee:</label>
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

                            <div class="mb-3">
                                <label for="date" class="form-label">Date:</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="time" class="form-label">Time:</label>
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

                            <button type="submit" class="btn btn-primary">Add Pointage</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
