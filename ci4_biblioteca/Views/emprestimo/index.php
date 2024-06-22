
<div class="container" >
    <div class="text-light">
        <h2>Emprestimo</h2>
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
            <td>DATA DE INICIO</td>
            <td>DATA DO FIM</td>
            <td>DATA DO PRAZO</td>
            <td>LIVRO</td>
            <td>ALUNO</td>
            <td>USUARIO</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
            <?php foreach($listaEmprestimo as $em) :?>
                <?php
                        $data_inicio = $em['data_inicio'];
                        $data_inicio = explode('-',$data_inicio);
                        $data_inicio = mktime(0,0,0,$data_inicio[1],$data_inicio[2],$data_inicio[0]);
                        $data_fim = $em['data_fim'];
                        $data_fim = explode('-',$data_fim);
                        $data_fim = mktime(0,0,0,$data_fim[1],$data_fim[2],$data_fim[0]);
                        $prazo = $em['data_prazo']*24*60*60;
                        $prazo += $data_inicio;
                ?>
                    
                <tr>
                    <td>
                        <?=$em['id']?>
                    </td>
                    <td>
                        <?=anchor("Emprestimo/editar/".$em['id'],date('d/m/Y',$data_inicio))?>
                    </td>
                    <td>
                        <?=date('d/m/Y',$data_fim)?>
                    </td>
                    <td>
                    <?=date('d/m/Y',$prazo)?>
                    </td>
                    <td>
                    <?php
                        foreach($listaObra as $ob){
                            $obras[$ob['id']] = $ob['titulo'];
                        }
                        foreach($listaLivro as $livro){
                            $livros[$livro['id']] = $obras[$livro['id_obra']];
                        }
                    ?>
                        <?=$livros[$em['id_livro']]?>
                    </td>
                    <td>
                    <?php
                        foreach($listaAluno as $aluno){
                            $alunos[$aluno['id']] = $aluno['nome'];
                        }
                        ?>
                        <?=$alunos[$em['id_aluno']]?>
                    </td>
                    <td>
                    <?php
                        foreach($listaUsuario as $usuario){
                            $usuarios[$usuario['id']] = $usuario['nome'];
                        }
                        ?>
                        <?=$usuarios[$em['id_usuario']]?>
                    </td>
                    <td>
                    <?php foreach($listaEmprestimo as $em) :?>
                        <?=anchor("Emprestimo/devolucao/".$em['id'],"Devolução",['class' => 'btn  btn-dark'])?>
                     <?php endforeach ?>
                    </td>
                    <td>
                        <?php
                        if($data_fim - $prazo <= 0){
                            echo '<p class="text-dark">Dentro do prazo</p>';
                        }else{echo '<p class="text-danger">Fora do Prazo</p>';}
                        ?>
                    </td>
                </tr>
            <?php endforeach ?>  
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open("Emprestimo/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Emprestimo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="data_inicio">Data de Inicio:</label>
                    <input class='form-control' type="text" id='data_inicio' name='data_inicio'>
                </div>
                <div class="form-group">
                    <label for="data_fim">Data do Fim:</label>
                    <input class='form-control' type="text" id='data_fim' name='data_fim'>
                </div>
                <div class="form-group">
                    <label for="data_prazo">Data do Prazo:</label>
                    <input class='form-control' type="text" id='data_prazo' name='data_prazo'>
                </div>
                <div class="form-group">
                    <label for="telefone">Livro:</label>
                    <?php
                        foreach($listaObra as $ob){
                            $obras[$ob['id']] = $ob['titulo'];
                        }
                    ?>
                    <select class='form-select' name="id_livro" id="id_livro" required>
                        <option>Selecione um Livro</option>
                        <?php foreach($listaLivro as $livro):?>
                            <?php if($livro['disponivel'] == 1):?>
                                <option value="<?=$livro['id']?>"><?=$obras[$livro['id_obra']]?></option>
                            <?php endif?>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefone">Aluno:</label>
                    <select class='form-select' name="id_aluno" id="id_aluno" required>
                        <option>Selecione um Aluno</option>
                        <?php foreach($listaAluno as $aluno) : ?>
                            <option value="<?=$aluno['id']?>"><?=$aluno['nome']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefone">Usuario:</label>
                    <select class='form-select' name="id_usuario" id="id_usuario" required>
                        <option>Selecione um Usuario</option>
                        <?php foreach($listaUsuario as $usuario) : ?>
                            <option value="<?=$usuario['id']?>"><?=$usuario['nome']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
            </div>
        </div>
    </div>
        <?=form_close()?>
    </div>
</div>