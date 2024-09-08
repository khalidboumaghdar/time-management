



<div class="card">

    <h5 class="card-header">Update Password</h5>
    <p class="card-header">  Ensure your account is using a long, random password to stay secure.</p>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card-body">
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

                <div class="mb-3">
                  <label for="current_password"class="form-label">Current Password</label>
                  <input type="password" id="current_password" name="current_password"  class="form-control"  aria-describedby="emailHelp">


                </div>
                <div class="mb-3">
                    <label for="current_password"class="form-label">New Password</label>
                    <input type="password" id="password" name="password"  class="form-control"  aria-describedby="emailHelp">


                  </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Confirm Password</label>
                  <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" >

                </div>

                <button type="submit" class="btn btn-primary">{{_('Save')}}</button>
                @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="alert alert-primary"
                >{{ __('password is updated.') }}</p>
            @endif

        </form>
    </div>
  </div>

