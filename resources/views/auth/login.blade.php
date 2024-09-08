<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" href="https://yt3.ggpht.com/a/AATXAJzObe_CJUxjpVURnI1zzQyftxEPiy4uMFDylw=s900-c-k-c0xffffffff-no-rj-mo">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
   .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
.img{
        position: relative;
                  left: 223px;
    }
@media (max-width: 992px) {
    .img{
        position: relative;
    left: 0px;
    }

 }
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">

              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                  <img class="img" height="100px" width="100px" src="https://yt3.ggpht.com/a/AATXAJzObe_CJUxjpVURnI1zzQyftxEPiy4uMFDylw=s900-c-k-c0xffffffff-no-rj-mo" alt="">
                </div>

                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0"></p>
                </div>

                <!-- Email input -->

                <div class="form-outline mb-4">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  <input type="email" id="form3Example3" name="email" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>


                <!-- Password input -->
                <div class="form-outline mb-3">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  <input type="password" id="form3Example4" name="password"  class="form-control form-control-lg"
                    placeholder="Enter password" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>


                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" name="remember" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  @if (Route::has('password.request'))
                  <div class="forgot-password text-right">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                  </div>
                @endif
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                </div>

              </form>
            </div>
          </div>
        </div>

      </section>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
