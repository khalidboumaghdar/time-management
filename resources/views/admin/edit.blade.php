@extends('layouts.app_admin')

@section('contant')

<div class="container">
    <form action="{{ route('admin.update', $Admins->id) }}" method="POST" style="position: relative;
        top: 146px;">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="utype">User Type</label>
            <select id="utype" name="utype" class="form-control">
                <option value="USR" @if($Admins->utype === 'USR') selected @endif>User</option>
                <option value="ADM" @if($Admins->utype === 'ADM') selected @endif>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
