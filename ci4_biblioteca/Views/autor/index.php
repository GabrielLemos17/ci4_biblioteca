<div class="container ">
    <div class="text-light">
        <h2>Autor</h2>
    </div>
        <!-- Button do Modal -->
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Novo
        </button>
        <!-- Tabela de Usuario -->
    <table class="table table-secondary table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>NOME</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($listaAutor as $a) :?>
                <tr>
                    <td>
                        <?=$a['id']?>
                    </td>
                    <td>
                        <?=anchor("Autor/editar/".$a['id'],$a['nome'])?>
                    </td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?=form_open("Autor/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Autor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class='form-control' type="text" id='nome' name='nome'>
                </div>
            </div>
            <div class="modal-footer border-solid">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
            </div>
        </div>
    </div>
        <?=form_close()?>
    </div>
</div>