<!--Cabecalho-->
@include('pagina-inicial.header')
<!--Fim Cabecalho-->

<!--Menu do topo-->
    @include('pagina-inicial.menu')
<!-- END nav -->

  <!-- Texto inicial no topo junto com a barra de pesquisa -->
  <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="bread">Repositório Intitucional da Computação</h1>
          <p class="py-2">Obtenha como resultado todos os trabalhos científicos produzidos pelo departamento da
            computação, caso sejas parte, pense na ideia de publicares seu artigo científico</p>
          <form action="#" id="home_search_form_2"
            class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-center">
            <div class="d-flex flex-row align-items-center justify-content-center">
              <input type="search" class="home_search_input" placeholder="Palavra-chave" required="required">
              <select class="dropdown_item_select home_search_input">
                <option>Categoria</option>
                <option>Todas</option>
                <option>Base de dados</option>
                <option>Redes</option>
                <option>Análise de Sistemas</option>
              </select>
              <select class="dropdown_item_select home_search_input">
                <option>Ano de publicação</option>
                <option>Todos</option>
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
                <option>2020</option>
              </select>
              <button type="submit" class="home_search_button" onclick="return pesquisar();">pesquisar</button>
              <script>
                function pesquisar() {
                  window.location
                }
              </script>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--Fim Texto inicial no topo junto com a barra de pesquisa -->

  <!--Sobre o repositório institucional da computação -->
  <section class="ftco-section services-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
          <div class="w-100 mb-4 mb-md-0">
            <span class="subheading">Seja bem vindo ao RIC</span>
            <h2 class="mb-4">Repositório Intitucional para a Computação</h2>
            <p>O repositório institucional da computação - repositoório pertencente a Universidade Dr. António Agostinho
              Neto, mas específicamente a Faculdade de Ciências Naturais - Departamento de Ciências da Computação.</p>
            <p>Contitui a coleção de documentos que formam a produção intelectual, acadêmica e científica desta
              comunidade universitária. Tem como objectivos reunir, organizar, divulgar e preservar a produção
              ciêntífica do Departamento de Ciências da Computação da Universidade Agostinho Neto.</p>
            <div class="d-flex video-image align-items-center mt-md-4">
              <a href="blog.html" class="btn btn-primary py-2 px-3">Saiba mais</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tools"></span>
                </div>
                <div class="media-body">
                  <h3 class="heading mb-3">Teses e Dissertações</h3>
                  <p>A small river named Duden flows by their place and supplies</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon icon-2 d-flex align-items-center justify-content-center"><span
                    class="flaticon-instructor"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Artigos Científicos</h3>
                  <p>A small river named Duden flows by their place and supplies</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon icon-3 d-flex align-items-center justify-content-center"><span
                    class="flaticon-quiz"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Teses de Doutoramento</h3>
                  <p>A small river named Duden flows by their place and supplies</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon icon-4 d-flex align-items-center justify-content-center"><span
                    class="flaticon-browser"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Trabalhos de Conclusão de Curso</h3>
                  <p>A small river named Duden flows by their place and supplies</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fim do sobre o repositório institucional da computação-->

  <!--Trabalhos que entraram recentement-->
  @include('pagina-inicial.entradas')
  <!-- Fim trabalhos que entraram recentemente -->

  <!-- Resumo do total de trabalhos da instituição -->
  <section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url(images/uan_frente_reitoria.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-online"></span></div>
            <div class="text">
              <strong class="number" data-number="400">0</strong>
              <span>Teses e dissertações</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-graduated"></span></div>
            <div class="text">
              <strong class="number" data-number="4500">0</strong>
              <span>Trabalhos acadêmicos</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-instructor"></span></div>
            <div class="text">
              <strong class="number" data-number="1200">0</strong>
              <span>Periódicos</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-tools"></span></div>
            <div class="text">
              <strong class="number" data-number="300">0</strong>
              <span>Artigos científicos</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Fim Resumo do total de trabalhos da instituição -->

<!-- Footer da página -->
@include('pagina-inicial.footer')
<!-- Fim footer da página -->
