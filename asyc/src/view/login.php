<!DOCTYPE html>
<html  lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="yris">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Sistema ERP Asyc | Login</title>
</head>
<body>
  <section class=" d-flex align-items-center justify-content-around mt-4 p-5">
    <div class="d-fle justify-content-center">
      <img class="img-fluid" src="./assets/images/asyc-emblema-login.png">
    </div>
    <div class="card shadow-lg h-50 col-md-6 col-sm-9 ">
      <div class="card-body p-3">
        <h1 class="display-6">Realizar Login</h1>
        <form action="">
          <div class="mb-3">
            <i class="fa-solid fa-user"></i>
            <label class="form-label" for="identification">email ou celular</label>
            <input class="form-control" type="text" id="identification" placeholder="digite seu email ou telefone">
          </div>
          <div class="mb-3">
            <i class="fa-solid fa-key"></i>
            <label class="form-label" for="password">senha</label>
            <input class="form-control" type="password" id="password" placeholder="digite sua senha">
          </div>
        </form>
        <div class="d-grid gap-2 mb-3">
          <input class="btn btn-danger" type="button" type="submit" value="Logar">
        </div>
        <a class="mt-2" href="index.php">Não possui conta? Cadastre-se</a>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
