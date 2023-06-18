<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="yris">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/global.css">
  <title>Sistema ERP Asyc | Cadastro</title>
</head>
<body>
<?php

require_once (dirname(__FILE__)."/../controller/FormChecker.php");

unset($_POST["submit"]); // removing it as it does not make part of form's sent information.

$formChecker = FormChecker::getInstance();
$formChecker->setAll(
  $_POST,
  ["name", "identifier", "password", "confirmPassword"],
  ["name"=>"", "identifier"=>"", "password"=>"", "confirmPassword"=>""],
  ["name"=>75, "identifier"=>150, "password"=>100, "confirmPassword"=>100],
  "preencha este campo!",
  "User"
);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!$formChecker->checkRequired()) {
    $formChecker->sanitize();
    $formChecker->checkLength();
    $formChecker->validate();
  }
}
?>

  <section class="d-flex flex-column justify-content-between align-items-center">
    <div class="card shadow-lg me-auto ms-auto col-md-6 h-75 mt-5 mb-5">
      <div class="card-body p-3 ">
        <h1 class="display-6">Realizar Cadastro</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="mb-3">
            <label  class="form-label">nome <span class="required">*</span></label>
            <span class="error"><?php echo $formChecker->getErrorMessage("name");?></span>
            <input class="form-control" type="text" name="name" maxlength="75" placeholder="digite seu nome" value="<?php if(isset($_POST["name"])) {echo $_POST["name"];}?>">
          </div>
          <div class="mb-3">
            <label class="form-label">email ou celular <span class="required">*</span></label>
            <span class="error"><?php echo $formChecker->getErrorMessage("identifier");?><span>
            <input class="form-control" type="text" name="identifier" maxlength="150" placeholder="digite seu email ou celular" value="<?php if(isset($_POST["identifier"])) {echo $_POST["identifier"];}?>">
          </div>
          <div class="mb-3">
            <label  class="form-label">senha <span class="required">*</span></label>
            <span class="error"><?php echo $formChecker->getErrorMessage("password")?></span>
            <input class="form-control" type="password" name="password" maxlength="100" placeholder="digite sua senha" value="<?php if(isset($_POST["password"])) {echo $_POST["password"];}?>">
          </div>
          <div class="mb-4">
            <label class="form-label">confirmar senha <span class="required">*</span></label>
            <span class="error"><?php echo $formChecker->getErrorMessage("confirmPassword")?></span>
            <input class="form-control" type="password" name="confirmPassword" maxlength="100" placeholder="confirmar senha" value="<?php if(isset($_POST["confirmPassword"])) {echo $_POST["confirmPassword"];}?>">
          </div>
          <div class="d-flex justify-content-center align-items-center mb-3">
            <input class="btn btn-danger submit" type="submit" name="submit" value="cadastrar-se">
          </div>
        </form>
        <a href="./login.php">Já possui cadastro? Entrar</a>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>