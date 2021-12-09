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
				<h2 class="font-weight-bold mt-2">DIRECTION DE L'INSPECTION, DES STATISTIQUES ET DES ETUDES </h2>
				<hr class="my-3 "> </br>
				<div class="row">
					<div class="col-md-7 order-3">
						<div class="overflow-hidden">
							<h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Philippe NGOMA</h2>
						</div>
						<div class="overflow-hidden mb-3">
							<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">DISE</p>
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
						<img src="{{ asset('assets/img/directeurs/motdgi.png')}}" class="img-fluid" alt="" style="width: 230px; height: 230px;">
					</div>
				</div>
				<div class="card-body p-0">
					<h2 class="font-weight-bold mt-5">Son organisation</h2> </br>

					<p>La direction de l’inspection, des statistiques et des études est dirigée et animé par un directeur. <br> Elle est chargée, notamment, de :
					<ul class="mt-0">
						<li>Produire les rapports annuels d’activités de l’agence ;</li>
						<li>Tenir le secrétariat du comité de direction de l’agence ;</li>
						<li>Elaborer et mettre en œuvre de concert avec les autres directions, la stratégie et le plan d’action de l’agence ;</li>
						<li>Evaluer les performances des directions ;</li>
						<li>Assurer l’inspection des directions de l’agence</li>
						<li>Assurer, dans le périmètre des compétences de l’agence, l’audit externe, l’analyse et la prévention des risques ;</li>
						<li>Assurer la gestion du système d’information de l’agence ;</li>
						<li>Faire des études d’impact économique des activités des sociétés de transferts de fonds ;</li>
						<li>Constituer la centrale de risques des changes ;</li>
						<li>Elaborer le tableau de bord d’agence ;</li>
						<li>Elaborer les manuels de procédures des métiers spécifiques et les mettre à jour ;</li>
						<li>Assurer l’inspection des sociétés de transferts de fonds et mener les investigations nécessaires ;</li>
						<li>Assurer l’audit et le contrôle externe des sociétés de transferts de fonds ;</li>
						<li>Evaluer l’impact des risques de identifiés sur les réserves de change et sur l’économie nationale ;</li>
						<li>Proposer des mesures de neutralisation des crimes économiques et en évaluer l’efficacité ;</li>
						<li>Elaborer les bases de données relatives à l’ensemble des activités de l’agence ;</li>
						<li>Tenir les statistiques relatives aux mouvements de fonds à l’intérieur du pays ;</li>
						<li>Traiter les statistiques sur les transactions financières, les opérations courantes et les mouvements des capitaux pour l’élaboration de la balance des paiements.</li>
					</ul>
					</p>

					<h2 class="font-weight-bold mt-2">Sa composition</h2> </br>

					<p>La direction de l’inspection, des statistiques et des études comprend :
					<ul class="mt-0">
						<li>Le service de l’inspection ;</li>
						<li>Le service des statistiques et analyses ;</li>
						<li>Le service des études.</li>
					</ul>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
