@extends('fronts.layouts.master')
@extends('fronts.apropos.layouts.main-apropos')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Direction générale</h1>
			</div>
			<div class="order-1 col-md-4 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">A-propos</a></li>
					<li class="active "><a class="text-color-light">Direction générale</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection

@section('content')
<div class="col-lg-9">
	<div class="mb-5 border-0 card border-radius-0 box-shadow-1">
		<div class="p-4 card-body z-index-1">

			<div class="p-0 card-body">
				<h2 class="mt-2 font-weight-bold text-uppercase">DIRECTION GENERALE </h2>
				<hr class="my-3 "> </br>
				<div class="row">
					<div class="order-3 col-md-7">
						<div class="overflow-hidden">
							<h2 class="pt-0 mt-0 mb-0 text-color-dark font-weight-bold text-8 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Basile Jean Claude BAZEBI</h2>
						</div>
						<div class="mb-3 overflow-hidden">
							<p class="mb-0 font-weight-bold text-primary text-uppercase appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Directeur Général</p>
						</div>
						<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"> </p>
						{{-- <hr class="my-4 solid appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900"> --}}
						<div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
							{{-- <div class="my-4 col-sm-6 text-lg-right my-lg-0">
								<strong class="mr-3 text-uppercase text-1 text-red">suivez-moi</strong>
								<ul class="social-icons float-lg-right">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
									<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<div class="mb-4 col-md-5 order-md-2 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
						{{-- <img src="{{ asset('assets/img/directeurs/motdgi.png')}}" class="img-fluid" alt="" style="width: 230px; height: 230px;"> --}}
					</div>
				</div>
				<h2 class="mt-5 font-weight-bold">Ses missions</h2> </br>

				<p>L'agence de régulation des transferts de fonds est dirigée et animée par un directeur général, nommé par décret en Conseil des ministres, sur proposition du ministre chargé des finances.
					</br> Elle est chargée, notamment, de :

				<ul class="mt-0">
					<li>préparer et organiser les sessions du comité de direction ;</li>
					<li>préparer et organiser les sessions du comité de direction ;</li>
					<li>exécuter les décisions ou les délibérations du comité de direction ;</li>
					<li>veiller au bon fonctionnement de l'agence ;</li>
					<li>mettre en œuvre les politiques, stratégies et programmes de l'agence ; </li>
					<li>exécuter le budget de l'agence ;</li>
					<li>appliquer les textes régissant l'organisation et le fonctionnement de l'agence ;</li>
					<li>passer les marchés, baux, conventions et contrats validé au nom de l’agence ;</li>
					<li>préparer et soumettre au comité de direction les plans, les programmes d'activités et les plans de financement de l'agence ;</li>
					<li>représenter l'agence dans tous les actes de la vie civile;</li>
					<li>nommer le personnel au sein de l’agence ;</li>
					<li>prendre tout acte à caractère financier engageant l’agence ;</li>
					<li>diffuser les informations résultant des activités essentielles de l’agence ;</li>
					<li>superviser les activités du dispositif d’intelligence économique de l’agence.</li>
				</ul>
				</br>
				Le directeur général de l’agence de régulation des transferts de fonds présente un rapport annuel sur les activités de l’agence au comité de direction à chaque session.
				</p>

				<h2 class="mt-2 font-weight-bold">Sa composition</h2> </br>

				<p>La direction générale, outre le secrétariat de direction, le service système d’information, le service audit interne et le contrôle de gestion et le service de la communication, comprend :

				<ul class="mt-0">
					<li>la direction de l’inspection, des statistiques et des études ;</li>
					<li>la direction de la régulation ;</li>
					<li>la direction des affaires juridiques, des investigations et de la coopération ;</li>
					<li>la direction financière ;</li>
					<li>la direction des ressources humaines et de la logistique ;</li>
					<li>la direction départementale Pointe Noire ;</li>
					<li>La direction départementale du Niari ;</li>
					<li>La direction départementale de la Sangha.</li>
				</ul>
				</p>
			</div>
		</div>
	</div>

</div>
@endsection