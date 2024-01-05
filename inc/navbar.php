<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?vista=home">
      <img src="./img/logo.png" width="65" height="80" alt="logo">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> Usuarios</a>
        <div class="navbar-dropdown">
            <a class="navbar-item" href="index.php?vista=user_new"> Nuevo </a>
            <a class="navbar-item" href="index.php?vista=user_list"> Lista </a>
            <a class="navbar-item" href="index.php?vista=user_search"> Buscar </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> Categorias</a>
        <div class="navbar-dropdown">
            <a class="navbar-item"> Nueva categoria </a>
            <a class="navbar-item"> Lista de categorias </a>
            <a class="navbar-item"> Buscar por categorias </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> Productos </a>
        <div class="navbar-dropdown">
            <a class="navbar-item"> Nuevo producto </a>
            <a class="navbar-item"> Lista de productos </a>
            <a class="navbar-item"> Buscar por categorias </a>
            <a class="navbar-item"> Buscar </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary is-rounded">
            Mi cuenta
          </a>
          <a href="index.php?vista=logout" class="button is-link is-rounded">
            Salir
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>