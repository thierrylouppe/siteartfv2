@extends('fronts.layouts.master')
@extends('fronts.apropos.layouts.main-apropos')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Mot du Directeur Général</h1>
			</div>
			<div class="order-1 col-md-4 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">Apropos</a></li>
					<li class="active "><a class="text-color-light">Mot du Directeur Général</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection

@section('content')
<div class="col-lg-9">

	<article>
		<div class="mb-5 border-0 card border-radius-0 box-shadow-1">
			<div class="p-4 card-body z-index-1">
				<div class="post-content">

					<img src="{{ asset('assets/img/directeurs/motdgi.png')}}" class="float-right mb-1 mb-3 img-fluid ml-sm-4 ml-lg-5" alt="Philippe NGOMA - DGI ARTF Congo" style="width: 230px; height: 230px;">

					<p class="lead">Aux Personnel, Régulés et Partenaires Cette année sera davantage consacrée à la consolidation des activités de l’ARTF. Nous déploierons une importante stratégie de communication nécessaire à l’accomplissement des missions de l’ARTF, tout en maintenant la bonne collaboration avec nos partenaires.
						La question éthique demeure toujours fondamentale au cœur du système de gestion de la ressource humaine de notre entreprise. Je voudrais ici présenter les valeurs de l’ARTF, valeurs que l’agence défend continuellement en son sein ainsi que dans ses rapports avec les tiers. Elles s’articulent autour de l’acronyme « ESPRIT ».
					</p>

					<p><strong class="font-weight-extra-bold">EQUILIBRE</strong> : un travail d’équipe efficace autour d’une relation saine, respectueuse de chacun. </br>
						<strong class="font-weight-extra-bold">SECURITE</strong> : indispensable à la vie d’entreprise, et l’aidant à l’exercice de sa mission ; la sécurité conduisant à l’élaboration des normes sécuritaires afin de veiller à tous les aspects de « sécurité économique ». </br>
						<strong class="font-weight-extra-bold">PARTAGE (MBONGUI)</strong> : la valeur du partage permet de mettre en commun les différentes expériences, ce qui fondera le processus de grandes décisions. </br>
						<strong class="font-weight-extra-bold">RIGUEUR</strong> : la rigueur est une auto-évaluation constante qui conduit à un travail bien fait. </br>
						<strong class="font-weight-extra-bold">INTEGRITE</strong> : synonyme de droiture, qui permet de garantir la qualité de toute action menée par notre institution. </br>
						<strong class="font-weight-extra-bold">TRANSPARENCE</strong> : elle conduit à une meilleure gouvernance, garantissant la qualité d’un bon système d’information d’une part et un niveau élevé de protection des investisseurs et de l’efficacité des marchés de transferts de fonds d’autre part.
					</p>

					<p>C'est en dirigeant de l’ARTF représentant de l’ARTF que je porte l'étendard qui symbolise inlassablement notre succès, notre prospérité, notre expansion avec énergie traduisant le rayonnement tant national qu’international de notre institution.
						Je vous promets de poursuivre le chemin tracé par notre regretté Directeur Général Robert Jean-Raphaël MASSAMBA-DEBAT qui sans ambages à réussi à mettre l’ARTF sur l’orbite de l’excellence.
						Bonne et heureuse année 2021.
					</p>

					<p>

						<small style="font-weight: 500; font-size: 15px; font-style: italic; text-align: right !important;">
							Philippe NGOMA<br>
							Directeur Général Par Intérim
						</small>
						<hr class="my-3 ">

					<div class="pt-2 pb-1">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style">
							<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
							<a class="addthis_button_tweet"></a>
							<a class="addthis_button_pinterest_pinit"></a>
							<a class="addthis_counter addthis_pill_style"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
						<!-- AddThis Button END -->
					</div>
				</div>
			</div>
		</div>
	</article>

</div>
@endsection
