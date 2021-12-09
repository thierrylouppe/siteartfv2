@extends('fronts.layouts.master')
@extends('fronts.apropos.layouts.main-apropos')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Organigramme</h1>
			</div>
			<div class="order-1 col-md-4 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">A-propos</a></li>
					<li class="active "><a class="text-color-light">Organigramme</a></li>
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
				<h2 class="mt-2 font-weight-bold">Organigramme</h2>
				<hr class="my-3">
				<div class="">
					<img src="{{ asset('assets/img/organigramme.png')}}" alt="organigramme artf" class="img-fluid" style="max-width: 100%; height: auto;">
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
