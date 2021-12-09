@extends('fronts.layouts.master')
@extends('fronts.apropos.layouts.main-apropos')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Missions et prérogatives</h1>
			</div>
			<div class="order-1 col-md-4 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">A-propos</a></li>
					<li class="active "><a class="text-color-light">Missions et Prérogatives</a></li>
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
				<h2 class="mt-2 font-weight-bold">MISSIONS ET PREROGATIVES </h2>
				<hr class="my-3">

				<p>L’agence de régulation des transferts de fonds oriente et contrôle l’ensemble des activités en matière de transferts de fonds tant à l’intérieur qu’à l’extérieur du pays.
					</br> A ce titre elle est chargée notamment de :

				<ul class="mt-0">
					<li>réguler les activités relatives aux transferts de fonds ;</li>
					<li>contribuer à l’élaboration de la balance de paiements ;</li>
					<li>suivre la constitution et la liquidation des investissements directs étrangers ;</li>
					<li>veiller au bon fonctionnement des sociétés de transfert de fonds ;</li>
					<li>examiner les demandes d’agrément des sociétés de transfert de fonds ;</li>
					<li>étudier et mettre en œuvre les mesures visant à stimuler et à mieux réguler le secteur des sociétés de transfert de fonds ;</li>
					<li>contribuer à la lutte contre le blanchiment des capitaux et le financement du terrorisme.</li>
				</ul>
				</p>
			</div>
		</div>
	</div>

</div>
@endsection
