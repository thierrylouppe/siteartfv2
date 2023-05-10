@extends('fronts.layouts.master')
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
				<h2 class="font-weight-bold mt-2 text-uppercase"> direction de la régulation</h2>
				<hr class="my-3 "> </br>
				<div class="row">
					<div class="col-md-7 order-3">
						<div class="overflow-hidden">
							<h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Roch Avit MBOUBI</h2>
						</div>
						<div class="overflow-hidden mb-3">
							<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Directeur de la régulation</p>
						</div>
						<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"></p>
						{{-- <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900"> --}}
						<div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
							{{-- <div class="col-sm-6 text-lg-right my-4 my-lg-0">
								<strong class="text-uppercase text-1 mr-3 text-red">suivez-moi</strong>
								<ul class="social-icons float-lg-right">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
									<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					{{-- <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
						<img src="{{ asset('assets/img/directeurs/dr.jpg')}}" class="img-fluid" alt="" style="width: 230px; height: 230px;">
					</div> --}}
				</div>
				<div class="card-body p-0">
					<h2 class="font-weight-bold mt-5">Son organisation</h2> </br>

					<p>La direction de la régulation est dirigée et animé par un directeur. <br> Elle est chargée, notamment, de :
					<ul class="mt-0">
						<li>Produire les rapports annuels d’activités de l’agence ;</li>

						<li>Assurer la régulation du secteur des transferts de fonds ;</li>
						<li>Etablir la cartographie et le fichier complet des sociétés de transferts de fonds, des intermédiaires agrées, des opérateurs mobiles money et en assurer la mise a jour ;</li>
						<li>Faire les diligences nécessaires a l’agreement des acteurs éligibles ;</li>
						<li>Tenir la banque de données relative à la gouvernance des sociétés de transferts de fonds ;</li>
						<li>Traiter les déclarations de transferts de fonds à l’extérieur ;</li>
						<li>Traiter les comptes rendus d’opérations reçus des intermédiaires agréés et les sociétés de transferts de fonds ainsi que toutes données nécessaires a la connaissance de l’activité de transfert de fonds ;</li>
						<li>Réaliser l’apurement des dossiers relatifs aux transferts de fonds à l’international ;</li>
						<li>Veiller au respect de la législation et de la réglementation en matière de transfert de fonds ;</li>
						<li>Contribuer a l’évolution du cadre normatif en matière de transfert de fonds ;</li>
						<li>Suivre la constitution, la gouvernance et la liquidation des investissements directs étrangers et émettre tout avis en rapport de sécurité économique ;</li>
						<li>Contribuer à une gestion efficace des réserves de changes ;</li>
						<li>Mener toute investigation nécessaire a une meilleur régulation des activités de transfert de fonds ;</li>
						<li>Contribuer à la lutte contre le blanchiment des capitaux et le financement du terrorisme.</li>
					</ul>
					</p>

					<h2 class="font-weight-bold mt-2">Sa composition</h2> </br>

					<p>La direction de la régulation comprend :
					<ul class="mt-0">
						<li>Le service des transactions courantes ;</li>
						<li>Le service des opérations en capital ;</li>
						<li>Le service des agréments et de la régulation.</li>
					</ul>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection