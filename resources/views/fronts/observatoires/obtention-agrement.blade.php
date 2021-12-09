@extends('fronts.layouts.master')
@extends('fronts.observatoires.layouts.main-observatoires')

@section('page-header')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">
			<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
				<h1 class="text-dark">Observatoires</h1>
			</div>
			<div class="order-1 col-md-4 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-right">
					<li><a class="aperso" href="#">Accueil</a></li>
					<li><a class="aperso" href="#">Observatoires</a></li>
					<li class="active "><a class="text-color-light">Obtention d'agrement</a></li>
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
				<h2 class="mt-2 font-weight-bold">CONDITIONS D'OBTENTION D'AGREMENT </h2>
				<hr class="my-3">
				<div class="p-0 card-body">

					<div class="row">
						<div class="col">
							<h3 class="mt-5 text-center font-weight-bold">Composition du dossier de demande d'agrément</h3>
							<h4 class="mt-5 mb-2">Société de transfert de fonds</h4>

							<div class="py-4 process process-vertical">
								<div class="process-step appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
									<div class="process-step-circle">
										<strong class="process-step-circle-content">1</strong>
									</div>
									<div class="process-step-content">
										<h4 class="mb-1 text-4 font-weight-bold">Dossier de la structure sociale</h4>
										<p class="mb-0">
											</br>
										<ul class="mt-0">
											<li>Une demande timbrée par le représentant légal du requérant indiquant le lieu d’implantation de la société et son adresse ;</li>
											<li>Un numéro d’inscription au registre du commerce et du crédit mobilier (copie RCCM) ;</li>
											<li>La liste du personnel employé en précisant la fonction de chacun ;</li>
											<li>Le statut et le règlement intérieur ;</li>
											<samp>
												<p></p>
											</samp>
											<h6 class="custom-text-color-5">Le plan de développement ou business plan de l’activité envisagée, comprenant notamment :</h6>
											<li>Les prévisions d’activités, d’implantation et d’organisation ;</li>
											<li>Les détails des moyens techniques, matériels et financiers à mettre en œuvre ;</li>
											<li>Un résume des procédures de gestion comptable, de gestion des incidents de paiement, de contrôle interne permettant d’assurer la disponibilité et la sécurité des systèmes ;</li>
											<samp>
												<p></p>
											</samp>
											<h6 class="custom-text-color-5">Le projet du contrat cadre de transfert de fonds :</h6>
											<li>Le logo type de la société ;</li>
											<li>La justification de la souscription de la garantie autonome ;</li>
											<li>Les frais de dépôt ;</li>
											<li>Une déclaration fiscale de l’année précédente, le cas échéant.</li>
										</ul>
										</p>
									</div>
								</div>
								<div class="process-step appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
									<div class="process-step-circle">
										<strong class="process-step-circle-content">2</strong>
									</div>
									<div class="process-step-content">
										<h4 class="mb-1 text-4 font-weight-bold">Dossier du dirigeant ou des dirigeants</h4>
										<p class="mb-0">
											</br>
										<ul class="mt-0">
											<li>Une demande timbrée par le représentant légal du requérant indiquant le lieu d’implantation de la société et son adresse ;</li>
											<li>Une demande timbrée ;</li>

											<li>Une copie d’acte de naissance ;</li>

											<li>Un curriculum vitae ;</li>

											<li>Deux photos format identité ;</li>

											<li>Les copies des diplômes obtenus ;</li>

											<li>Une expédition du procès-verbal du conseil d’administration ou de l’organe en tenant lieu portant désignation de ou des intéressés ;</li>

											<li>Un extrait du casier judiciaire datant de moins de trois mois ;</li>

											<li>Un certificat de nationalité,</li>

											<li>Un certificat de séjour pour les étrangers ;</li>

											<li>Un certificat de moralité fiscale.</li>
										</ul>
										</p>
									</div>
								</div>
								<div class="process-step appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
									<div class="process-step-circle">
										<strong class="process-step-circle-content">3</strong>
									</div>
									<div class="process-step-content">
										<h4 class="mb-1 text-4 font-weight-bold">Dossier de demande du ou des commissaires aux comptes (facultatif)</h4>
										<p class="mb-0">
											</br>
										<ul class="mt-0">
											<li>Une demande timbrée ;</li>
											<li>Une copie d’acte de naissance ;</li>
											<li>Un curriculum vitae ;</li>
											<li>Deux photos format identité ;</li>
											<li>Les copies des diplômes obtenus ;</li>
											<li>Un extrait de casier judiciaire ;</li>
											<li>Une copie de l’acte d’agrément CEMAC en qualité de comptable ou d’expert-comptable ;</li>
											<li>Une copie d’inscription à l’ordre national des comptables ou experts comptables ou tout autre document en tenant lieu ;</li>
											<li>Un certificat de moralité fiscale.</li>
										</ul>
										</p>
									</div>
								</div>
								<h4 class="mt-0 mb-1 text-4 custom-text-color-5 font-weight-bold">Noté bien :</h4>
								<p class="mt-0 mb-0">
								<ul class="mt-0">
									<li>Le dossier de demande d’agrément concerne la structure sociale, ses dirigeants et ses commissaires aux comptes est déposé en double exemplaire contre récépissé auprès de l’agence de régulation des transferts de fonds. (Cf. article 4 du décret 2015-248 du 04 février 2015)</li>
									<li>100 000 FCFA, montant du récépissé des frais de dépôt du dossier de demande d’agrément en qualité de société de transfert de fonds. (Arrêté n° 3565/MFBPP-CAB du 11 mai 2017)</li>
									<li>L’Agence de Régulation des Transferts de Fonds, peut leur demander tous renseignements, informations, éclaircissements ou justificatifs utiles à l’exercice de sa mission. (Article n°45, alinéa 3, du décret 2015-248 du 04 février 2015)</li>
								</ul>
								</p>
								<div class="col-sm-6 col-lg-9">
									<div class="call-to-action-btn">
										<a href="{{asset('download/observatoires/composition-du-dossier-de-demande-agrement.pdf')}}" download="Composition du dossier de demande agrement.pdf" target="_blank" class="btn btn-modern text-2 btn-primary">Télécharger la composition du dossier de demande agrement &nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fas fa-file-pdf"></i></span></a>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection