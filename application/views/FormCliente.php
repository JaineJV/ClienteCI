        <div class="container mt-3">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastro de Cliente</li>
                </ol>
            </nav>
                <?php
                $mensagem = $this->session->flashdata('mensagem');
                echo(isset($mensagem) ? '<div class="alert alert-success" role="alert">' . $mensagem .'</div>' : '');
                ?>
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= (isset($cliente)) ? $cliente->id : ''; ?>">
                        <div class="form-group">
                            <label for="nome"> Nome: </label>
                            <input type="text" class="form-control" name="nome" id="nome" value="<?= (isset($cliente)) ? $cliente->nome : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="rg"> RG: </label>
                            <input type="text" class="form-control" name="rg" id="rg" value="<?= (isset($cliente)) ? $cliente->rg : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="cpf"> CPF: </label>
                            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= (isset($cliente)) ? $cliente->cpf : ''; ?>">
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Enviar </button>
                        <button type="reset" class="btn btn-outline-secondary"><i class="fas fa-redo"></i> Limpar </button>
                    </form>
                </div>
            </div>
        </div>
      