<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img id="page-logo" src="{{ url('template-pagina-inicial/images/logo_white.png') }}"
          style="width: 90px; padding: 0; margin: 0;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Página Inicial</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Precorrer por
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Coleções</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Títulos</a></li>
                <li><a class="dropdown-item" href="#">Autores</a></li>
                <li><a class="dropdown-item" href="#">Orientadores</a></li>
                <li><a class="dropdown-item" href="#">Assunto</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sobre
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Sobre o Repositório</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Copyrights</a></li>
            </ul>
          </li>
          <li class="nav-item" style="float:right;"><a href="{{ route('login') }}" class="nav-link">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
