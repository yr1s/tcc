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
    <link rel="stylesheet" href="assets/css/estiloFormCliente">

    <title>ASYC - sistema ERP</title>
</head>
<body>
    <section>
        <!-- formulario -->
        <div class="card  shadow-lg me-auto ms-auto col-md-7 h-75 mt-5 mb-5">
            <div class="card-body p-5 ">

                
                    <h1 class="display-4">cadastrar Produto</h1>
                    <form class="row" action="" >
            
                        
                        <div class="col-12"> <!-- sera necessario?? -->
                            <label class="form-label" for="name">Nome do Produto</label> 
                            <input class="form-control" type="text" id="">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"  for="productCode">Codigo do produto</label>
                            <input  class="form-control" type="text" id="productCode">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Codigo de barras do produto</label> <!-- não tenho crtz se é isso -->
                            <input class="form-control" type="text" id="barcode">
                        </div>
                            


                        <div class="col-md-6">
                            <label class="form-label" for="model">Modelo</label>
                            <input class="form-control" type="text" id="model">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="brand" >Marca</label>
                            <input class="form-control" type="text" id="brand">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="description" >Descrição do produto</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="salePrice">Preço de venda</label>
                            <input  class="form-control" type="text" id="salePrice">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Peso</label>
                            <input class="form-control" type="text" id="weight">
                        </div>
                        

                        <div class="col-12"> 
                            <label class="form-label">validade</label> <!-- validade de data mesmo?? -->
                            <input class="form-control" type="date" id="validity">

                        </div>
                    </form>
                
                    <div class="d-grid mt-3">
                        <input class="btn btn-danger" type="button" type="submit" value="Cadastrar produto" >
                    </div>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>