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

    <title>ASYC - sistema ERP</title>
</head>
<body>
    <section>
        <!-- formulario -->
        <div class="card  shadow-lg ms-auto me-auto col-md-7 h-75 mt-5 mb-5">
            <div class="card-body p-5 ">

                
                <h1 class="display-4">Cadastrar mão de obra </h1>
                <form class="row" action="" >
            
                    <div class="col-12"> 
                        <label class="form-label" for="cost">Custo</label> 
                        <input class="form-control" type="text" id="cost">
                    </div>
                        
                    
                    <div class="col-md-6">
                        <label class="form-label" for="labourType">Tipo de serviço</label> 
                        <input class="form-control" type="text" id="labourType">
                                
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Tecnico responsavel</label> <!-- não tenho crtz se é isso -->
                        <input class="form-control" type="text" id="responsibleTechnician">
                    </div>
                        
                    <div class="col-12"> 
                        <label class="form-label" for="description">Descrição</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>

                </form>

                <div class="d-grid mt-3">
                    <input class="btn btn-danger" type="button" type="submit" value="Cadastrar Mão de obra" >
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        
</body>
</html>