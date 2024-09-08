
<div class="card">

    <h5 class="card-header">Profile Information</h5>
    <p class="card-header">  Update your account's profile information and email address.</p>
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
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" id="name" name="name" value="{{old('name', $user->name)}}" class="form-control"  aria-describedby="emailHelp">


                </div>
                <div class="mb-3">
                    <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" name="email" value="{{old('email', $user->email)}}" class="form-control" >
                </div>
                  @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                  <div class="mb-3">

                      <p class="card-header">
                          {{ __('Your email address is unverified.') }}

                          <button form="send-verification"  class="btn btn-danger">
                              {{ __('Click here to re-send the verification email.') }}
                          </button>
                      </p>

                      @if (session('status') === 'verification-link-sent')
                          <p class="mt-2 font-medium text-sm text-green-600">
                              {{ __('A new verification link has been sent to your email address.') }}
                          </p>
                      @endif
                  </div>
              @endif

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
  </div>
