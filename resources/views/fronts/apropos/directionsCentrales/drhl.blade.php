@extends('layouts.main')
@extends('fronts.apropos.layouts.main-directions-centrales')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Directions centrales</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a href="#">Accueil</a></li>
					<li><a href="#">A-propos</a></li>
					<li class="active">Direction centrales</li>
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection

@section('content')
<div class="col-lg-9">

	<div class="card border-0 border-radius-0 mb-5 box-shadow-1">
		<div class="card-body p-4 z-index-1">

			<div class="card-body p-0">
				<h2 class="font-weight-bold mt-2 text-uppercase">Direction des ressources humaines et de la logistique</h2>
				<hr class="my-3 "> </br>
				<div class="row">
					<div class="col-md-7 order-3">
						<div class="overflow-hidden">
							<h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Rostand EPENIT KAZABAND</h2>
						</div>
						<div class="overflow-hidden mb-3">
							<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Directeur des ressources humaines et de la logistique</p>
						</div>
						<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"></p>
						<hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
						<div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
							<div class="col-sm-6 text-lg-right my-4 my-lg-0">
								<strong class="text-uppercase text-1 mr-3 text-red">suivez-moi</strong>
								<ul class="social-icons float-lg-right">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
									<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
						<img src="{{ asset('assets/img/directeurs/drhl.jpg')}}" class="img-fluid" alt="" style="width: 230px; height: 230px;">
					</div>
				</div>
				<div class="card-body p-0">
					<h2 class="font-weight-bold mt-5">Son organisation</h2> </br>

					<p>La direction des ressources humaines et de la logistique est dirigée et animée par un directeur. <br> Elle est chargée, notamment, de :
					<ul class="mt-0">
						<li>Gérer les ressources humaines ;</li>
						<li>Préparer et mettre en œuvre la stratégie de gestion des ressources humaines et en assurer l’application ;</li>
						<li>Gérer le patrimoine de l’agence ;</li>
						<li>Connaître du contentieux administratif ;</li>
						<li>Gérer les affaires documentaires de l’agence ;</li>
						<li>Produire le bilan social de l’agence.</li>
					</ul>
					</p>

					<h2 class="font-weight-bold mt-2">Sa composition</h2> </br>

					<p>La direction des ressources humaines et de la logistique comprend :
					<ul class="mt-0">
						<li>Le service des ressources humaines ;</li>
						<li>Le service de la logistique ;</li>
						<li>Le service de la législation du travail et de la conformité administrative.</li>
					</ul>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection