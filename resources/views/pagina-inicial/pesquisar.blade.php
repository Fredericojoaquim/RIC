<!--Cabecalho-->
@include('pagina-inicial.header')
<!--Fim Cabecalho-->

<!--Menu do topo-->
    @include('pagina-inicial.menu')
<!-- END nav -->

<!-- Texto no topo com a visualização da rota -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{url('template-pagina-inicial/images/biblioteca-agostinho.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Pagina Inicial <i class="fa fa-chevron-right"></i></a></span> <span>Pesquisar <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Pesquisar</h1>
            </div>
        </div>
    </div>
</section>
<!-- Fim texto no topo com a visualização da rota -->


<!-- Container ou seja corpo da página de pesquisas -->
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="sidebar-box bg-white ftco-animate">
						<form action="#" class="search-form">
							<div class="form-group">
								<span class="icon fa fa-search"></span>
								<input type="text" class="form-control" placeholder="pesquisar...">
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-3 sidebar">
					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Critério de pesquisa</h3>
						<form action="#" class="browse-form">
							<label for="option-critereo-1"><input type="checkbox" id="option-critereo-1" name="vehicle" value="" checked> Comunidades e Coleções</label><br>
							<label for="option-critereo-2"><input type="checkbox" id="option-critereo-2" name="vehicle" value=""> Por data de submissão</label><br>
							<label for="option-critereo-3"><input type="checkbox" id="option-critereo-3" name="vehicle" value=""> Por Autores</label><br>
							<label for="option-critereo-4"><input type="checkbox" id="option-critereo-4" name="vehicle" value=""> Por Títulos</label><br>
							<label for="option-critereo-5"><input type="checkbox" id="option-critereo-5" name="vehicle" value=""> Por Assunto</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Categoria</h3>
						<form action="#" class="browse-form">
							<label for="option-categoria-type-1"><input type="checkbox" id="option-categoria-type-1" name="vehicle" value="" checked> Artigos (11200)</label><br>
							<label for="option-categoria-type-2"><input type="checkbox" id="option-categoria-type-2" name="vehicle" value=""> Dissertações de mestrado (530)</label><br>
							<label for="option-categoria-type-3"><input type="checkbox" id="option-categoria-type-3" name="vehicle" value=""> Teses de doutoramento (12)</label><br>
							<label for="option-categoria-type-4"><input type="checkbox" id="option-categoria-type-4" name="vehicle" value=""> Trabalho de conclusão do curso (12)</label><br>
							<label for="option-categoria-type-5"><input type="checkbox" id="option-categoria-type-5" name="vehicle" value=""> Trabalhos de apresentação em eventos (12)</label><br>
							<label for="option-categoria-type-6"><input type="checkbox" id="option-categoria-type-6" name="vehicle" value=""> Ver mais</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Autores</h3>
						<form action="#" class="browse-form">
							<label for="option-autor-1"><input type="checkbox" id="option-autor-1" name="vehicle" value="" checked> Adams (1942)</label><br>
							<label for="option-autor-2"><input type="checkbox" id="option-autor-2" name="vehicle" value=""> Frederico, B (989)</label><br>
							<label for="option-autor-3"><input type="checkbox" id="option-autor-3" name="vehicle" value=""> Hrosky (10)</label><br>
							<label for="option-autor-4"><input type="checkbox" id="option-autor-4" name="vehicle" value=""> Suzana, G (201)</label><br>
							<label for="option-autor-5"><input type="checkbox" id="option-autor-5" name="vehicle" value=""> Ver mais</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Data de Lançamento</h3>
						<form action="#" class="browse-form">
							<label for="option-data-1"><input type="checkbox" id="option-data-1" name="vehicle" value="" checked> 2020 - 2023</label><br>
							<label for="option-data-2"><input type="checkbox" id="option-data-2" name="vehicle" value=""> 2015-2019</label><br>
							<label for="option-data-3"><input type="checkbox" id="option-data-3" name="vehicle" value=""> 2010-2014</label><br>
							<label for="option-data-4"><input type="checkbox" id="option-data-4" name="vehicle" value=""> 2007-2009</label><br>
							<label for="option-data-5"><input type="checkbox" id="option-data-5" name="vehicle" value=""> Ver mais</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Estatísticas</h3>
						<form action="#" class="browse-form">
							<label for="option-estatistica-1"><input type="checkbox" id="option-data-1" name="vehicle" value="" checked> Visualizar estatísticas</label><br>
						</form>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url('{{url('template-pagina-inicial/images/work-1.jpg')}}');">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url('{{url('template-pagina-inicial/images/work-2.jpg')}}');">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url('{{url('template-pagina-inicial/images/work-3.jpg')}}');">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url('{{url('template-pagina-inicial/images/work-4.jpg')}}');">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url('{{url('template-pagina-inicial/images/work-5.jpg')}}');">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch ftco-animate">
							<div class="project-wrap">
								<a href="#" class="img" style="background-image: url('{{url('template-pagina-inicial/images/work-6.jpg')}}');">
									<span class="price">Software</span>
								</a>
								<div class="text p-4">
									<h3><a href="#">Design for the web with adobe photoshop</a></h3>
									<p class="advisor">Advisor <span>Tony Garret</span></p>
									<ul class="d-flex justify-content-between">
										<li><span class="flaticon-shower"></span>2300</li>
										<li class="price">$199</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-5">
						<div class="col">
							<div class="block-27">
								<ul>
									<li><a href="#">&lt;</a></li>
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&gt;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- Fim container ou seja corpo da página -->

<!-- Footer da página -->
@include('pagina-inicial.footer')
<!-- Fim footer da página -->
