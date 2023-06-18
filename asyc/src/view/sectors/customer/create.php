
<?php
include('asyc-topo.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- estilo customizado -->
   

    <title>ASYC - sistema ERP</title>
</head>
<body>
    <section>
        <!-- formulario -->
        <div class="card  shadow-lg me-auto ms-auto col-md-7 h-75 mt-5 mb-5">
            <div class="card-body p-5 ">
                <h1 class="display-4">cadastrar cliente</h1>

                <form class="row" action="">

                    <div class="col-12">
                        <label class="form-label" for="name">Nome</label> 
                        <input class="form-control" type="text" id="name">
                    </div>
    
                    
                    <div class="col-md-6">
                        <label class="form-label" for="telephone">Telefone</label>
                        <input  class="form-control" type="text" id="telephone">
                    </div>
    
                    <div class="col-md-6">
                        <label class="form-label" for="cellphone" >Celular</label>
                        <input  class="form-control" type="text" id="cellphone">
                    </div>
    
                    <div class="col-12">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" id="email">
                    </div>
    
                    
                    <div class="col-md-6">
                        <label class="form-label" for="address">Endereço</label>
                        <input  class="form-control" type="text" id="address">
                    </div>
    
                    <div class="col-md-3">
                        <label class="form-label" for="houseNumber">Numero</label>
                        <input class="form-control" type="text" id="houseNumber">
                    </div>
    
                    <div class="col-md-3">
                        <label class="form-label" id="cep">CEP</label>
                        <input class="form-control" type="text" id="cep">
                    </div>
                    
    
                    
                    <div class="col-md-4">
                        <label class="form-label" >Bairro</label>
                        <input class="form-control" type="text" id="neighborhood">
                    </div>
    
                    <div class="col-md-4">
                        <label class="form-label">Cidade</label>
                        <input class="form-control" type="text" id="city">
                    </div>
    
                    <div class="col-md-4">
                        <label class="form-label">Estado</label>
                        <input class="form-control" type="text" id="state">
                    </div>
                        
                    <div class="col-12">
                        <label class="form-label">Ponto de Referencia</label>
                        <input class="form-control" type="text" id="reference">
                    </div>
    
                    <div class="col-12">
                        <label class="form-label">Status Civil</label>
                        <input class="form-control" type="text" id="civilStatus">
                    </div>
    
                    <div class="col-12">
                        <label class="form-label">Nacionalidade</label>
                        <input class="form-control" type="text" id="nationaliy">
                    </div>
                        
            
                    
                    <div class="col-md-6">
                        <label class="form-label">RG</label>
                        <input class="form-control" type="text" id="rg">
                    </div>
    
                    <div class=" col-md-6">
                        <label class="form-label">CPF</label>
                        <input class="form-control" type="text" id="cpf">
                    </div>
    
                        
                    <div class="col-md-6">
                        <label class="form-label">data de nascimento</label>
                        <input class="form-control" type="date" id="birthdate">
                    </div>
    
                    <div class="col-md-6">
                        <label class="form-label" for="gender">Genero</label>
                            <select  class="form-control" id="gender">
                                <option>Feminino</option>
                                <option>Masculino</option>
                            </select>
                    </div>
                </form>
                
                <div class="d-grid mt-3">
                    <input class="btn btn-danger" type="button" type="submit" value="Cadastrar Cliente" >
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
</body>
</html>