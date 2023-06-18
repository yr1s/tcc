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

                
                    <h1 class="display-4">Cadastrar Ordem de serviço</h1>
                    <form class="row" action="" >
            
                        
                        <div class="col-12">
                            <label class="form-label" for="cost">Custo</label> 
                            <input class="form-control" type="text" id="cost">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label"  for="brand">Marca</label>
                            <input  class="form-control" type="text" id="brand">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="model" >Modelo</label>
                            <input  class="form-control" type="text" id="model">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label"  for="color">Cor</label>
                            <input class="form-control" type="text" id="color">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="licensePlate">Placa</label>
                            <input  class="form-control" type="text" id="lincesePlate">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="mileage">Quilometragem</label>
                            <input class="form-control" type="text" id="mileage">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="complaint">Reclamação</label>
                            <textarea class="form-control" id="complaint"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="responsibleTechnician">Técnico responsavel</label>
                            <input class="form-control" type="text" id="responsibleTechnician">
                        </div>
                            
                        <div class="col-md-6">
                            <label class="form-label" for="situation">Situação</label>
                            <input class="form-control" type="text" id="situation">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="status">Status de andamento de serviço</label>
                            <select  class="form-control" id="status">
                                <option>Entrada</option>
                                <option>Diagnóstico pronto</option>
                                <option>Orçamento aprovado</option>
                                <option>Em execução</option>
                                <option>Finalizado</option>
                                <option>Testado</option>
                                <option>Cliente avisado (veiculo retirado)</option>
                                
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="priority">Prioridade</label>
                            <select  class="form-control" id="priority">
                                <option>Urgente</option>
                                <option>Medio</option>
                                <option>Leve</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="pickUpDate">Data de entrada</label>
                            <input  class="form-control" type="date" id="pickUpDate">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="closingDate">Prazo de entrega</label>
                            <input  class="form-control" type="date" id="closingDate">
                        </div>
                        
                    </form>

                <div class="d-grid mt-3">
                    <input class="btn btn-danger" type="button" type="submit" value="Cadastrar ordem de serviço" >
                </div>
                    
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        
</body>
</html>