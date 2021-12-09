@extends('layouts.main')
@extends('fronts.reglementations.layouts.main-reglementations')
@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Réglementation</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">Réglementation</a></li>
					<li class="active "><a class="text-color-light">Instructions</a></li>
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
				<h2 class="font-weight-bold mt-2">INSTRUCTIONS </h2>
				<hr class="my-3">
				@if($nbreinstructions > 0)
				@foreach($instructions as $instruction)
				<section class="call-to-action featured featured-primary mb-5">
					<div class="col-sm-9 col-lg-9">
						<div class="call-to-action-content">
							<h3><strong class="font-weight-extra-bold">{{$instruction->title}}</strong></h3>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="call-to-action-btn">
							<a href="{{asset('storage/'.$instruction->file)}}" download="{{$instruction->title}}.pdf" target="_blank" class="btn btn-modern text-2 btn-primary">Télécharger <span><i class="fas fa-file-pdf"></i></span></a>
						</div>
					</div>
				</section>
				@endforeach
				<div class="row">
					<div class="col">
						<ul class="pagination float-right">
							{{ $instructions->links()}}
						</ul>
					</div>
				</div>
				@else
				@include('layouts.nodata')
				@endif
			</div>
		</div>
	</div>
</div>
@endsection