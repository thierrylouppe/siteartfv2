@extends('fronts.layouts.master')
@extends('fronts.apropos.layouts.main-apropos')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Réglementation</h1>
			</div>
			<div class="order-1 col-md-4 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">Réglementation</a></li>
					<li class="active "><a class="text-color-light">Lois</a></li>
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
				<h2 class="mt-2 font-weight-bold">LOIS </h2>
				<hr class="my-3">
				@if($nbrelois > 0)
				@foreach($lois as $loi)
				<section class="mb-5 call-to-action featured featured-primary">
					<div class="col-sm-9 col-lg-9">
						<div class="call-to-action-content">
							<h3><strong class="font-weight-extra-bold">{{$loi->title}}</strong></h3>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="call-to-action-btn">
							<a href="{{asset('storage/'.$loi->file)}}" download="{{$loi->title}}.pdf" target="_blank" class="btn btn-modern text-2 btn-primary">Télécharger <span><i class="fas fa-file-pdf"></i></span></a>
						</div>
					</div>
				</section>
				@endforeach
				<div class="row">
					<div class="col">
						<ul class="float-right pagination">
							{{ $lois->links()}}
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