<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositório </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/estilo.css')}}">
  </head>
  <body>

    <header>
      <div>

      </div>

      <nav class="navbar  navbar-expand-lg bg-primary navbar-primary ">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img class="logo-home" src="{{url('img-welcome/ric.png')}}" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="#"> Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{url('/ric/login')}}"> <strong>Login</strong> </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <strong> Percorrer por</strong>
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
                <a class="nav-link dropdown-toggle text-light text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <strong>Ajuda</strong>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Sobre o Repositório</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Copyrights</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn  bg-dark text-light" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>

    </header>



      <main>
        <div class="">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{url('img-welcome/foto3.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{url('img-welcome/foto2.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{url('img-welcome/foto1.jpg')}}" class="d-block w-100"  alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>


        <div class="container">

          <div class="row">
            <div class="col-sm-4">
              <div class="row"> <h1 class="text-center text-primary">Coleções</h1></div>

              <table class="table table-borderless">

                <tbody class="">
                  <tr>

                    <td class="padding-td"><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Sistema de Apoio a decisão</a>
                     </td>
                    <td class="padding-td">(12)</td>

                  </tr>
                  <tr>


                    <td><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Sistema de Apoio a decisão</a>
                    </td>
                    <td>(10)</td>

                  </tr>

                  <tr>
                    <td><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Sistema de Apoio a decisão</a>
                    </td>
                    <td>(20)</td>
                  </tr>

                  <tr>
                    <td><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Sistema de Apoio a decisão</a>
                    </td>
                    <td>(20)</td>
                  </tr>

                  <tr>
                    <td><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Sistema de Apoio a decisão</a>
                    </td>
                    <td>(20)</td>
                  </tr>

                  <tr>
                    <td><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Sistema de Apoio a decisão</a>
                    </td>
                    <td>(20)</td>
                  </tr>

                  <tr>
                    <td><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> Sistema de Apoio a decisão</a>
                    </td>
                    <td>(20)</td>
                  </tr>

                </tbody>
              </table>

            </div>
            sss
            <div class="col-sm-10">

            </div>
          </div>




        </div>
      </main>

      <footer>
        <div class="bg-primary">
          <p class="text-light"> Copyrights </p>
        </div>
      </footer>


      <script>
        const myCarouselElement = document.querySelector('#myCarousel')
          const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 1000,
            wrap: false
        })
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
