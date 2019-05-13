        <div class="container mt-3">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Clientes</li>
                </ol>
            </nav>
                <?php
                $mensagem = $this->session->flashdata('mensagem');
                echo (isset($mensagem) ? '<div class="alert alert-success" role="alert">'. $mensagem . '</div>' : '');
                ?>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($clientes as $c) {
                        echo '<tr>';
                        echo '<td>' . $c->nome . '</td>';
                        echo '<td>' . $c->rg . '</td>';
                        echo '<td>' . $c->cpf . '</td>';
                        echo '<td class="text-right">'
                        . '<a class="btn btn-sm btn-outline-secondary mr-2" href="' . $this->config->base_url() . 'Cliente/alterar/' . $c->id
                        . '"><i class="fas fa-pen"></i> Alterar </a>'
                        . '<a class="btn btn-sm btn-outline-secondary" href="' . $this->config->base_url()//busca nas configurções a base da url
                        . 'Cliente/deletar/' . $c->id . '"><i class="fas fa-trash"></i> Deletar </a>'
                        . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
