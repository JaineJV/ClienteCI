<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem de Vendas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light navbar-expand-md">
            <a class="navbar-brand" href="<?= $this->config->base_url(); ?>">
                <i class="fas fa-store text-info"></i>
                Sistema Comércio
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="menuClientes" class="nav-link dropdown-toggle" data-toggle="dropdown"> Clientes </a>
                        <div class="dropdown-menu" aria-labelledby="menuClientes">
                            <a href="<?= $this->config->base_url() . 'Cliente/listar'; ?>" class="dropdown-item"> Listar </a>
                            <a href="<?= $this->config->base_url() . 'Cliente/cadastrar'; ?>" class="dropdown-item"> Cadastrar </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $this->config->base_url() . 'Venda/listar'; ?>">Vendas</a>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $this->config->base_url() . 'Usuario/sair'; ?>">
                            Sair <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Vendas</li>
                </ol>
            </nav>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vendas as $v) {
                        echo '<tr>';
                            echo '<td>' . $v->nome . '</td>';
                            echo '<td>' . $v->data . '</td>';
                            echo '<td>' . $v->valor . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>
