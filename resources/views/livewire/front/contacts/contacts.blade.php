<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!-- Main -->
<div role="main" class="main">

	<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
		<div class="container">
			<div class="row">
				<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
					<h1 class="text-dark">Contact</h1>
				</div>
				<div class="col-md-4 order-1 order-md-2 align-self-center">
					<ul class="breadcrumb d-block text-md-right">
						<li><a class="aperso" href="#">Accueil</a></li>
						<li class="active "><a class="text-color-light">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	@if (session()->has('success'))
	<div class="alert alert-success" id="alrte">
		{{ session()->get('success')}}
	</div>
	@endif
	<section class="section  section-no-border my-0">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="row text-left">
						<div class="col-md-4 mb-2">
							<div class="card border-0 py-3">
								<div class="card-body px-2 py-2">
									<h4 class="font-weight-semibold text-uppercase text-center  mb-6">Agence de pointe-noire</h4>
									<p>
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-map icons"></i></span> Adresse</h4> : 16, Av Raymond paillet, Pointe-Noire,<br />République du Congo<br /><br />
									<h4 class="met_bold_one" style="display:inline;color:#000;"><strong>Directrice </strong></h4> : Lusika NGOUONIMBA
									<br />
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-envelope-open icons"></i></span> </h4> <a href="mailto:departement.pointe-noire@artf.cg" style="color:#b84232;">departement.pointe-noire@artf.cg</a>
									</br>
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-call-out icons"></i></span> Tél. portable</h4> : 00 242 22 294 07 80
									<br />
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-phone icons"></i></span> Tél. fixe</h4> : 00 242 22 294 07 80
									</p>

								</div>
							</div>
						</div>
						<div class="col-md-4 mb-2">
							<div class="card bg-color-light border-0 py-3">
								<div class="card-body px-2 py-2">
									<h4 class="font-weight-semibold text-uppercase text-center  mb-6">directions inter-départementale Niari-Bouenza-Lékoumou</h4>
									<p>
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-map icons"></i></span> Adresse</h4> : Sis 7, Rue Favre Centre-ville, Dolisie,<br />République du Congo<br /><br />
									<h4 class="met_bold_one" style="display:inline;color:#000;"><strong>Directeur </strong></h4> : Guy MONGONDZA
									<br />
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-envelope-open icons"></i></span> Email </h4> : <a href="mailto:departement.dolisie@artf.cg" style="color:#b84232;">departement.dolisie@artf.cg</a>

									<br />
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-call-out icons"></i></span> Tél. portable</h4> : 00 242 05 557 42 02 
									<br />
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-phone icons"></i></span> Tél. fixe</h4> : 00 242 22 005 03 73
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-2">
							<div class="card bg-color-light border-0 py-3">
								<div class="card-body px-2 py-2">
									<h4 class="font-weight-semibold text-uppercase text-center mb-6">Agence de Ouesso</h4>

									<p>
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-map icons"></i></span> Adresse</h4> : 00, Rue Maguessa Falanga, Ouesso,<br />République du Congo<br /><br />
									<h4 class="met_bold_one" style="display:inline;color:#000;"><strong>Directeur </strong></h4> : Alband MADIAZA TOUNGOU
									<br />
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-envelope-open icons"></i></span> Email </h4> : <a href="mailto:departement.ouesso@artf.cg" style="color:#b84232;">departement.ouesso@artf.cg</a>
									</br>
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-call-out icons"></i></span> Tél. portable</h4> : 00 242 06 903 59 15
									<br />
									<h4 class="met_bold_one" style="display:inline;"><span><i class="icon-phone icons"></i></span> Tél. fixe</h4> : 00 242 05 301 01 08
									</p>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="container">

		<div class="row">
			<div class="col-lg-8">

				<h4 class="text-color-black mt-4">Envoyer un Message</h4>
				<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus.</p> -->

				<form action="/contact" method="POST">
					@csrf
					<div class="contact-form-success alert alert-success d-none mt-4">
						<strong>Success!</strong> Your message has been sent to us.
					</div>

					<div class="contact-form-error alert alert-danger d-none mt-4">
						<strong>Error!</strong> There was an error sending your message.
						<span class="mail-error-message text-1 d-block"></span>
					</div>
					<input type="hidden" value="Contact Form" name="subject" id="subject">
					<div class="form-row">
						<div class="form-group col-lg-6">
							<label>Votre nom *</label>
							<input type="text" disabled="disabled" value="{{ old('name') }}" placeholder="Votre nom" maxlength="100" class="form-control @error('name') is-invalid @enderror" name="name">
							@error('name')
							<div class="invalid-feedback">
								{{ $errors->first('name')}}
							</div>
							@enderror
						</div>
						<div class="form-group col-lg-6">
							<label>Votre adresse email *</label>
							<input type="email" disabled="disabled" value="{{ old('email') }}" placeholder="Votre email" maxlength="100" class="form-control @error('email') is-invalid @enderror" name="email">
							@error('email')
							<div class="invalid-feedback">
								{{ $errors->first('email')}}
							</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label>Message *</label>
							<textarea maxlength="5000" disabled="disabled" placeholder="Votre message" rows="5" class="form-control @error('message') is-invalid @enderror" name="message">{{ old('message')}}</textarea>
							@error('message')
							<div class="invalid-feedback">
								{{ $errors->first('message')}}
							</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<input type="submit" disabled="disabled" value="Envoyé le Message" class="btn btn-primary mb-4" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-md-6 col-lg-12 mt-lg-4 order-1">
						<h4 class="text-color-black text-uppercase">Siège de l'ARTF</h4>
						<ul class="list list-icons mt-3">
							<li>
								<a href="#">
									<i class="icon-map icons"></i> 70 bis , avenue nelson mandela
								</a>
							</li>
							<li>
								<a href="mailto:contact@artf.cg">
									<i class="icon-envelope-open icons"></i> contact@artf.cg
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon-call-out icons"></i> (+242) 06 950 69 69
								</a>
							</li>
							<li>
								<a href="https://twitter.com/artf_congo">
									<i class="icon-social-twitter icons"></i> Twitter
								</a>
							</li>
							<li>
								<a href="https://www.facebook.com/artfcongo/">
									<i class="icon-social-facebook icons"></i> Facebook
								</a>
							</li>
						</ul>
					</div>
					<div class="col order-2 order-md-3 order-lg-2">
						<hr class="solid">
					</div>
					<div class="col-md-6 col-lg-12 order-3 order-md-2 order-lg-3">
						<h4 class="text-color-black">Jours/Heures Ouvrables</h4>
						<ul class="list list-icons mt-3">
							<li><i class="far fa-clock"></i> Lundi - Vendredi - 7h00 à 15h00</li>
						</ul>
					</div>
				</div>
			</div>

		</div>

	</div>

</div><!-- End #main -->
<div class="map-section">
	<iframe style="border:0; width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15914.96037219755!2d15.2812481!3d-4.2706772!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfcc2630a66771271!2sAgence%20de%20R%C3%A9gulation%20des%20Transferts%20de%20Fonds!5e0!3m2!1sfr!2scg!4v1607685294180!5m2!1sfr!2scg" frameborder="0" allowfullscreen></iframe>
</div>

<script>
	setTimeout(function() {
		$('#alrte').hide("fade");
		$('#alrte').remove();
	}, 2000);
</script>
</div>
