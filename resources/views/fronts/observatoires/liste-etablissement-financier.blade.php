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
					<li class="active "><a class="text-color-light">établissements financier</a></li>
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
				<h2 class="mt-2 font-weight-bold">LISTE DES ETABLISSEMENTS FINANCIERS</h2>
				<hr class="my-3">

				<div class="mb-4 col-lg-12 mb-lg-0">
					<div class="toggle toggle-primary" data-plugin-toggle data-plugin-options="{ 'isAccordion': true }">
						<section class="toggle active">
							<a class="toggle-title text-uppercase">Liste des établissements de crédit</a>
							<div class="toggle-content">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table mb-0 table-bordered table-striped" id="datatable-details">
											<thead>
												<tr>
													<th class="text-red">N°</th>
													<th class="text-red">Designation</th>
													<th class="text-red">Adresse</th>
													<th class="text-red">Localisation</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-red">1</td>
													<td>BCH</td>
													<td>Avenue Amilcar Cabral</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">2</td>
													<td>BCI</td>
													<td>Avenue Amilcar Cabral</td>
													<td class="center">Pointe-Noire</td>
												</tr>
												<tr>
													<td class="text-red">3</td>
													<td>BPC</td>
													<td>Boulevard Denis sassou Nguesso - Rond point la poste</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">4</td>
													<td>BGFI</td>
													<td>Boulevard Denis sassou Nguesso</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">5</td>
													<td>BSCA</td>
													<td>Avenue de l'amitié</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">6</td>
													<td>CDC</td>
													<td>Avenue Emmanuel Dadet</td>
													<td class="center">Pointe-Noire</td>
												</tr>
												<tr>
													<td class="text-red">7</td>
													<td>ECOBANK</td>
													<td>Avenue Amilcar Cabral - Immeuble ARC</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">8</td>
													<td>LCB</td>
													<td>Avenue Amilcar Cabral</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">9</td>
													<td>SGC</td>
													<td>Avenue Amilcar Cabral</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr class="gradeU">
													<td class="text-red">10</td>
													<td>UBA Avenue</td>
													<td>William Guynet</td>
													<td class="center">Brazzaville</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</section>
						<section class="toggle">
							<a class="toggle-title text-uppercase">Liste des établissements de microfinances et sociétés de transferts de fonds</a>
							<div class="toggle-content">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table mb-0 table-bordered table-striped" id="datatable-details">
											<thead>
												<tr>
													<th class="text-red">N°</th>
													<th class="text-red">Designation</th>
													<th class="text-red">Adresse</th>
													<th class="text-red">Localisation</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-red">1</td>
													<td>AGENCE JESUS SEUL</td>
													<td>57, Rue avenue de la paix- Arret Marché Moungali</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">2</td>
													<td>AMIS FIDELES</td>
													<td>32 Rue Louingui - Marché Moungali</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">3</td>
													<td>BATCH CHANGE</td>
													<td>Avenue de la paix - Rond point Poto-Poto</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">4</td>
													<td>CAPPED</td>
													<td>Villa 43B Quartier Millice - Makélékélé</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">5</td>
													<td>CASH CHANGE OFFICE</td>
													<td>Avenue de la paix -Rond point Moungali</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">6</td>
													<td>CASH POINT SERVIVES </td>
													<td>30, Bangangulu Ouenzé</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">7</td>
													<td>CCD</td>
													<td>Boulevard Denis sassou Nguesso - Arret Ex Tresor</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">8</td>
													<td>COMPAGNIE FINANCIERE CONGO</td>
													<td>88, avenue Félix Eboué Centre- villePoto-Poto</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">9</td>
													<td>CFPR</td>
													<td>11, Rue Mbamou - Talangai</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">10</td>
													<td>CHANGE WORLD</td>
													<td>69 rue zanaga - Moungali</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">11</td>
													<td>COFINA</td>
													<td>67, Avenue Nelson Mandela</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">12</td>
													<td>AMIS FIDELES</td>
													<td>32 Rue Louingui - Marché Moungali</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">13</td>
													<td>COMIFI</td>
													<td>Rue Franceville - Moungali</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">14</td>
													<td>DIGI PAY</td>
													<td>Avenue Amilcar Cabral, Tours jumelle - en face du Radisson</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">15</td>
													<td>ELITE BUSINESS</td>
													<td>Avenue des 3 martyrs</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">16</td>
													<td>EQUATEUR VOYAGES</td>
													<td>Avenue Maréchal Foch- Centre ville</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">17</td>
													<td>EXAU-BUSINESS</td>
													<td>Port Autonome de Brazzaville -BEACH, vers Archipel</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">18</td>
													<td>EXCELLENCE CHANGE</td>
													<td>207, rue Djambala Ouenzé</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">19</td>
													<td>EXPRESS UNION CONGO</td>
													<td>Avenue de la paix - croisement Rue mbackas</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">20</td>
													<td>GLOBAL EXPRESS</td>
													<td>23, rue emil Faignond - mbackas - Poto-poto</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">21</td>
													<td>GROUPE CHARDEN FARELL</td>
													<td>Avenue de l'independance</td>
													<td class="center">Pointe-Noire</td>
												</tr>
												<tr>
													<td class="text-red">22</td>
													<td>GUEN'S MEDIA CONGO</td>
													<td>9, rue Bakoukouyas Poto-Poto</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">23</td>
													<td>HAFIA</td>
													<td>-</td>
													<td class="center">Pointe-Noire</td>
												</tr>
												<tr>
													<td class="text-red">24</td>
													<td>IDEAL EXPRESS</td>
													<td>01, Rue Permesso, Grand Marché</td>
													<td class="center">Pointe-Noire</td>
												</tr>
												<tr>
													<td class="text-red">25</td>
													<td>INTERCONTINENTAL FINANCE</td>
													<td>45, rue Haoussas Poto-Poto</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">26</td>
													<td>MAOUENE EXPRESS</td>
													<td>98, avenue Alger 7-7 de Dany arr 3 tsié-tsié</td>
													<td class="center">Pointe-Noire</td>
												</tr>
												<tr>
													<td class="text-red">27</td>
													<td>MCO</td>
													<td>Avenue de la paix - Rond point Poto-Poto</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">28</td>
													<td>MERCANTIL INTERNATIONAL</td>
													<td>Avenue des 3 martyrs - Arret Mampassi</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">29</td>
													<td>MONEY CASH</td>
													<td>31, rue Haoussa</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">30</td>
													<td>MUCODEC</td>
													<td>Boulevard Denis sassou Nguesso - Grande Gare</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">31</td>
													<td>NUMERICA MONEY</td>
													<td>Avenue Nelson Mandela</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">32</td>
													<td>PRE//SF</td>
													<td>Boulevard Denis sassou Nguesso - Immeuble City center</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">33</td>
													<td>SELIBESI FINANCE</td>
													<td>Boulevard Denis sassou Nguesso - Vers CFAO</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">34</td>
													<td>SERFIN</td>
													<td>67, Avenue Nelson Mandela - Hotel Mikhael's</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">35</td>
													<td>SIKAR FINANCE</td>
													<td>Avenue Marchal Lyautey - OCH</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">36</td>
													<td>SMART VALUES</td>
													<td>Avenue Jacques Opangault</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr>
													<td class="text-red">37</td>
													<td>SOPECO</td>
													<td>Boulevard Denis sassou Nguesso - Congo Pharmacie</td>
													<td class="center">Brazzaville</td>
												</tr>
												<tr class="gradeU">
													<td class="text-red">38</td>
													<td>TARGET</td>
													<td>Avenue de la paix - Arret Batéké</td>
													<td class="center">Brazzaville</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>
@endsection
