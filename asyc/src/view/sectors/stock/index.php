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

    <title>ASYC - Contas</title>

</head>  
<body>

    

        <div class="d-flex justify-content-center justify-content-around mt-5">
                <button type="button" class="btn btn-warning"  >
                    <a href="asyc-formProduto.php" class="text-reset link-underline link-underline-opacity-0">Registrar novo produto</a>
                </button>

                <button type="button" class="btn btn-danger"  >
                    <a href="asyc-formUsarproduto.php" class="text-reset link-underline link-underline-opacity-0">Usar um produto</a>
                </button>
        </div>
    
    
    <div class="card mt-5 col-md-9 ms-auto me-auto">
        <div class="card-header text-center text-white bg-dark">
            Produtos
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Codigo de barras</th>
                        <th scope="col">Descrição/nome</th>
                        <th scope="col">Preço de venda</th>
                        <th scope="col">Quantidade no estoque</th>
                        <th scope="col">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">9998814799542</td>
                        <td>Roda</td>
                        <td>R$ 2</td>
                        <td>4</td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-up-right-from-square" style="color: #000000;"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                    <td scope="row">9998814799542</td>
                        <td>Roda</td>
                        <td>R$ 2</td>
                        <td>4</td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-up-right-from-square" style="color: #000000;"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                    <td scope="row">9998814799542</td>
                        <td>Roda</td>
                        <td>R$ 2</td>
                        <td>4</td>
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