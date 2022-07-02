<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Desain kiri -->
            <div class="col-md-5 left">
                <div brand></div>
            </div>
            <div class="col-md-1"></div>
            <!-- form kanan -->
            <div class="col-md-5 kanan">
                <div brand>
                    <img class="logo img-responsive" src="image/logo.png" alt="logo" />
                </div>
                <h2>Login</h2>
                @if (session()->has('nonaktif'))
                    <div class="alert alert-danger" role="alert">
                        <p class="m-2">
                            {{ session('nonaktif') }}
                        </p>
                    </div>
                @endif
                <form class="needs-validation" action="{{ route('login-post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address<div class="asterisk">*</div></label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                            placeholder="example@domain.com" aria-describedby="emailHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password<div class="asterisk">*</div></label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password"
                            placeholder="password" aria-describedby="password" />
                    </div>
                    <button type="submit" id="button" class="btn btn-warning">
                        <strong>Submit</strong>
                    </button>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
