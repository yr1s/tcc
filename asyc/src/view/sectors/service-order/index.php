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
                <button type="button" class="btn btn-danger"  >
                    <a href="asyc-formCliente.php" class="text-reset link-underline link-underline-opacity-0">Nova Ordem de Serviço</a>
                </button>
        
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