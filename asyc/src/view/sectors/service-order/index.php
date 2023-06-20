<?php
include('../../assets/components/header.php');
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

<body>

    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars fa-xl" style="color: #ffffff;"></i> Menu</button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class=" m-3" >
                <span class="fs-4">M E N U</span>
            </div>
            <hr>
        
            <ul class="nav flex-column ">
                <li class="nav-item m-2">
                    <a class="nav-link active fs-5 text-reset" aria-current="page" href="asyc-pageOrdemdeservico.php">
                        <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
                        Visão Geral
                    </a>
                </li>
                <hr>
                <li class="nav-item m-2">
                    <a class="nav-link fs-5 text-reset" href="#">
                        <i class="fa-solid fa-money-check-dollar" style="color: #000000;"></i>
                        Orçamento
                    </a>
                </li>
                <hr>
                <li class="nav-item m-3">
                    <a class="nav-link fs-5 text-reset" href="ordemdeservicoLocalizar.php">
                        <i class="fa-solid fa-magnifying-glass-location" style="color: #000000;"></i>
                        Localizar
                    </a>
                </li>
                <hr>
                <li class="nav-item m-3">
                    <a class="nav-link fs-5 text-reset" href="asyc-formOrdemdeservico.php">
                        <i class="fa-solid fa-plus" style="color: #000000;"></i>
                        Criar
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="d-flex justify-content-end mt-5 col-md-9 ms-auto me-auto">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#aa">
            Nova ordem de serviço
        </button>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="aa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nova ordem de serviço</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            <label class ="form-label" for="priority">Prioridade</label>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
                    <button type="button" class="btn btn-primary">Cadastrar nova ordem de serviço</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="card mt-5 col-md-9 ms-auto me-auto">
        <div class="card-header text-center text-white bg-dark">
            Serviços em aberto
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Nº O.S</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Veiculo</th>
                        <th scope="col">Entrada</th>
                        <th scope="col">Previsão de entrega</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detalhes</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Clovis</td>
                        <td>Fiat</td>
                        <td>05/07/2013</td>
                        <td>06/10/2029</td>
                        <td>Em andamento</td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-up-right-from-square" style="color: #000000;"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td>Clovis</td>
                        <td>Fiat</td>
                        <td>05/07/2013</td>
                        <td>06/10/2029</td>
                        <td>Em andamento</td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-up-right-from-square" style="color: #000000;"></i>
                            </a>
                        </td>
                    </tr>
        
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
