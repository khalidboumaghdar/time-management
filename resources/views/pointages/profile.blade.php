<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="{{asset('assets/images/urbine.jpg')}}" />
<link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
<link rel="stylesheet" href="{{asset('style.css')}}">
  <title>Document</title>
  <style>
    body{
      background-color: #10101E;
    }
    .container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #10101e;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  box-shadow: 2px 2px 5px #888888;
}

h2 {
  text-align: center;
  font-size: 24px;
  color: white;
  font-family: Boogaloo;
}

.profile-pic {
  text-align: center;
  margin-bottom: 20px;
}

.profile-pic img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  object-fit: cover;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-size: 18px;
  font-weight: 700;
  color: #283e4a;
  margin-bottom: 10px;
  color: white;
  font-family: Boogaloo;
}






button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: #283e4a;
  color: #fff;
  font-size: 18px;
  font-weight: 700;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  color: white;
  font-family: Boogaloo;
}

button[type="submit"]:hover {
  background-color: #165c7d;
}



  </style>
</head>
<body>
    <div class="container-build" id="c">
        <a href="{{route('pointages.pointage')}}">
        <h1 class="text-center">Pointing system</h1>
    </a>
      </div>


@include('pointages.update-profile-information-form')

    @include('pointages.update-password-form')





</body>
</html>
