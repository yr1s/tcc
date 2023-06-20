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

    <title>ASYC - Contas</title>

</head>  
<body>

    
        <div class="d-flex justify-content-around mt-5">
            <p class="fs-1">
            Funcionarios
            </p>
              <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#aa">
                    Cadastrar Funcionario
                </button>
              </div>
        </div>  

        <!-- Modal -->
    <div class="modal fade" id="aa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Funcionario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" action="" >

            <div class="col-12 ">
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
                <label class="form-label">Numero</label>
                <input class="form-control" type="text" id="houseNumber">
            </div>

            <div class="col-md-3">
                <label class="form-label" >CEP</label>
                <input class="form-control" type="text" id="cep">
            </div>
            
            <div class="col-md-4">
                <label class="form-label">Bairro</label>
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

            <div class="form-group col-md-6">
                <label class="form-label">CPF</label>
                <input class="form-control" type="text" id="cpf">
            </div>

            <div class=" col-md-6">
                <label class="form-label">data de nascimento</label>
                <input class="form-control" type="date" id="birthdate">
            </div>

            <div class="col-md-6">
                <label class="form-label" for="gender">Genero</label>
                <select  class="form-control" id="estados">
                    <option>Feminino</option>
                    <option>Masculino</option>
                </select>
            </div>
                
            <div class="form-group col-md-6">
                <label class="form-label" for="position">Posição/cargo</label>
                <input class="form-control" type="text" id="position">
            </div>

            <div class="form-group col-md-6">
                <label class="form-label" for="commission">Comissão</label>
                <input class="form-control" type="text" id="commission">
            </div>

                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
                    <button type="button" class="btn btn-primary">Cadastrar funcionario</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="card mt-5 col-md-9 ms-auto me-auto">
        <div class="card-header text-center text-white bg-dark">
            Funcionarios cadastrados
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Posição/Cargo</th>
                        <th scope="col">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Fulano</td>
                        <td>Mecanico geral</td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-up-right-from-square" style="color: #000000;"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Ciclano</td>
                        <td>Recepção/atendimento</td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-up-right-from-square" style="color: #000000;"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Ciclano</td>
                        <td>Recepção/atendimento</td>
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
