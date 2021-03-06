<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <style>
        .login {
  min-height: 100vh;
}

.bg-image {
  background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  background-color: #3955B8;
  border-color: #fff
}

.btn-login:hover{
      background-color: #FF428A;
        border-color: #fff

}
body{
    background-color: #f4f4f4
}

    </style>
</head>
<body>
    <div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
                            <h1>Bem-vindo ao Moobank</h1>

              <h3 class="login-heading mb-4">Cadastre-se</h3>

              <!-- Sign In Form -->
              <form action="registration" method="post">
                 <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="johndoe123" required>
                  <label for="floatingInput">Nome completo</label>
                </div>
                 <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="deposito" step=".01" name="deposito" placeholder="johndoe123" required>
                  <label for="floatingInput">Depósito inicial</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="username" name="username" placeholder="johndoe123" required>
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword">Criar senha</label>
                </div>
                   <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Password" required>
                  <label for="floatingPassword">Confirme a senha</label>
                </div>

                <input type="hidden" name="numero" value="1234">

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Cadastrar</button>
                  <div class="text-center">
                    Já tem conta? 
                    <a class="small" href="<?php echo base_url('login');?>">Entrar</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>