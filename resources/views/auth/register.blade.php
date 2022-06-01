<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('mycss/my.css') }}">
    <title>Document</title>
</head>

<body>
<div class="login">
    <h2 class="text-center mb-5">Welcome to the home bookkeeping</h2>
    <div class="form">
        <form class="login-form" action="{{route("auth.create")}}"method="post">
            @csrf
            <div class="result">
                @if(Session::get("success"))
                    <div class="alert alert-success">
                        {{Session::get("success")}}
                    </div>
                @endif
                @if(Session::get("fail"))
                    <div class="alert alert-danger">
                        {{Session::get("fail")}}
                    </div>
                @endif
            </div>
            <span class="material-icons">create</span>
            <input type="text" placeholder="name" name="name" value="{{old("name")}}" required>
            <span class="text-danger">@error("name") {{$message}} @enderror</span>
            <input type="text" placeholder="email"name="email" value="{{old("email")}}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
            <span class="text-danger">@error("email") {{$message}} @enderror</span>
            <input type="password" placeholder="password"name="password" value="{{old("password")}}" required />
            <span class="text-danger">@error("password") {{$message}} @enderror</span>

            <button>register</button>
            <br>
            <a href="login">I already have account</a>
        </form>
    </div>
</div>

</body>
</html>

