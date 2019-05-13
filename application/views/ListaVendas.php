        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Vendas</li>
                </ol>
            </nav>
            <div class="table-responsive">
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
        </div>
        
        