<nav class="navbar navbar-expand-lg bg-dark mb-3" data-bs-theme="dark">
  <div class="container">

        <img class="me-3" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Bras%C3%A3o_de_Caucaia.png/1200px-Bras%C3%A3o_de_Caucaia.png" alt="Bootstrap" width="80" height="80" >

    <?=anchor("","Biblioteca",['class' => 'navbar-brand link-secondary text-light ' ])?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
        <?=anchor("Aluno/index","Aluno",['class' => 'nav-link active link-secondary text-light'])?>
        </li>
        <li class="nav-item">
        <?=anchor("Autor/index","Autor",['class' => 'nav-link active link-secondary text-light '])?>
        </li>
        <li class="nav-item">
        <?=anchor("Usuario/index","Usuario",['class' => 'nav-link active link-secondary text-light '])?>
        </li>
        <li class="nav-item">
          <?=anchor("Editora/index","Editora",['class' => 'nav-link active link-secondary text-light '])?>
        </li>
        <li class="nav-item">
          <?=anchor("Obra/index","Obra",['class' => 'nav-link active link-secondary text-light '])?>
        </li>
        <li class="nav-item">
          <?=anchor("Livro/index","Livro",['class' => 'nav-link active link-secondary text-light ', 'aria-current'=>'page'])?>
        </li>
        <li class="nav-item">
          <?=anchor("Emprestimo/index","Emprestimo",['class' => 'nav-link active link-secondary text-light ', 'aria-current'=>'page'])?>
        </li>
        <li class="text-light" style="margin-left: 50px; margin-top: 7px;">
          <?=session()->get('email');?>
        </li>
        <div style="margin-left: 500px;">
          <button class="btn btn-outline-danger" onclick="location.href='<?php echo base_url('login/logout') ?>'">
              <i class="fas fa-sign-out-alt"></i> Sair
          </button>
        </div>
    </div>
  </div>
</nav>