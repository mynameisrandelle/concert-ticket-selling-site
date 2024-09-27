<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign In Account</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">

            <nav class="navbar navbar-light bg-light">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">Reservation</span>
                </a>

                <form action="" method="post">
                    <div class="col-md-3 text-end">    
                    <input type="submit" class="btn btn-primary" value="Create Account" name="register">
                    </div>
                </form>

            </nav>

            <div class="row justify-content-center">
                <div class="form-group col-md-4 col-md-offset-5 align-center mt-5">
                    <?= form_open("Users/index")?>
                        <h1 class="h3 mb-3 fw-normal text-center">Sign In</h1>
                    
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
                        <p class="mt-2 mb-3 text-muted text-center">Reservation - 2024</p>
                    <?= form_close()?>
                </div>
            </div> 
        </div>
          
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>