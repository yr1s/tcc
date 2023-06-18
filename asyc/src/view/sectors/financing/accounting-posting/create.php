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

                <h1 class="display-4">Novo lançamento</h1>

            <form action=""  class="row">
                    <div class="col-12">
                        <label class="form-label" for="">Tipo de lançamento</label>
                        <select  class="form-control" id="">
                            <option>Receita (Entrada)</option>
                            <option>Despesa (Saida)</option>
                        </select>
                    </div>
                

                <div class="col-12">
                    <label class="form-label" for="cost">Valor</label> 
                    <input class="form-control" type="text" id="cost">
                </div>

                <div class="col-12">
                    <label class="form-label" for="description">Descrição</label>
                    <textarea id="description" class="form-control"></textarea>
                </div>

                <div class="col-12">
                    <label class="form-label" for="destinationAccount">Conta de destino</label>
                    <input class="form-control" type="text" id="destinationAccount">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="creditor">Cobradora</label>
                    <input class="form-control" type="text" id="creditor">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="category">Categoria</label>
                    <input class="form-control" type="text" id="category">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label" for="status">Status</label>
                    <select  class="form-control" id="status">
                        <option>Aberta</option>
                        <option>Quitada</option>
                        <option>Vencida</option>
                        <option>Estornada(Cancelada)</option>
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


                <div class="col-12"> <!-- melhor com opções -->
                    <label class="form-label" for="formOfPayment">Forma de pagamento</label>
                    <input class="form-control" type="text" id="formOfPayment">
                </div>

                <div class="col-12">
                    <label class="form-label" for="isInstallment">Parcelado?</label>
                    <select class="form-control" id="isInstallment">
                        <option value="yes">Sim</option>
                        <option value="no">Não</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="qtdeInstallment">Quantidade de parcelas</label>
                    <input class="form-control" type="number" id="qtdeInstallment">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="installmentPrice">Valor da parcela</label>
                    <input class="form-control" type="text" id="installmentPrice">
                </div>
                
                <div class="col-12">
                    <label class="form-label" for="dueDate">Data de vencimento</label>
                    <input class="form-control" type="date" id="dueDate">
                </div>

            </form>

            <div class="d-grid mt-3">
                <input class="btn btn-danger" type="button" type="submit" value="Registrar novo lançamento" >
            </div>

            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        
</body>
</html>