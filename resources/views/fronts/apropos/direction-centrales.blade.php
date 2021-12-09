@extends('fronts.layouts.master')
@extends('fronts.apropos.layouts.main-apropos')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Directions centrales</h1>
			</div>
			<div class="order-1 col-md-4 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">A-propos</a></li>
					<li class="active "><a class="text-color-light">Direction centrales</a></li>
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
				<h2 class="mt-2 font-weight-bold">DIRECTION CENTRALES </h2>
				<hr class="my-3">
				<p>La direction générale de l'Agence de regulation de transfert de fonds comprend 5 directions centrales:</p>
				<ol class="list list-ordened list-ordened-style-2">
					<li><a href="{{ route('apropos.dise') }}">La direction de l’inspection, des statistiques et des études</a></li>
					<li><a href="{{ route('apropos.dr') }}">La direction de la régulation </a></li>
					<li><a href="{{ route('apropos.dajic') }}">La direction des affaires juridiques, des investigations et de la et de la coopération </a></li>
					<li><a href="{{ route('apropos.df') }}">La direction financière </a></li>
					<li><a href="{{ route('apropos.drhl') }}">La direction des ressources humaines et de la logistique </a></li>
				</ol>

			</div>
		</div>
	</div>
</div>
@endsection
