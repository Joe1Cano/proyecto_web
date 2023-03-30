<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Colorful Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom CSS -->
    <style>
      body {
        background-color: #f7f7f7;
      }
      
      .card {
        margin-top: 50px;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
      }
      
      .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      }
      
      .btn-primary {
        background-color: #2196f3;
        border-color: #2196f3;
      }
      
      .btn-primary:hover {
        background-color: #0d47a1;
        border-color: #0d47a1;
      }
      
      .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
      }
    </style>
  </head>
  <body>
  @if(session('error'))
    <script>
        Swal.fire(
    'Inicio de Sesión!',
    "{{ session('error') }}",
    'error'
    )
    </script>
    @endif
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h4>Login</h4>
            </div>
            <div class="card-body">
              <form action="./validar-login" method="post">
              @csrf
                <div  class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
            </div>
            <div class="card-footer">
              <a href="./register" class="btn btn-secondary btn-block">Create User</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
