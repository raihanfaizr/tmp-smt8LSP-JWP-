<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login WO Jewepe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card border-dark p-5" style="margin-top: 20vh;">
                <div class="card-body text-center">
                    <form action="login-process" method="post">
                        @csrf
                        <h4>Wedding Organizer Jewepe</h4>
                        <br><br>
                        <h5>Username</h5>
                        <input type="text" class="form-control border-dark" name="username" required>
                        <br>
                        <h5>Password</h5>
                        <input type="text" class="form-control border-dark" name="password" required>
                        @if (session('galat'))
                            <br>
                            <p class="text-danger">{{ session('galat') }}</p>
                        @endif
                        <br><br>
                        <button type="submit" class="btn btn-primary px-5" style="border-radius: 50px;"> Login </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>