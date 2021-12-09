<!-- Footer -->
<footer id="footer" class="m-0 custom-footer bg-color-footer">
    <div class="container py-8">
        <div class="pt-5 pb-4 text-center row text-lg-left">
            <div class="mb-4 col-md-1 mb-lg-0">
                <a href="#" class="text-decoration-none">
                    <img src="{{ asset("assets/img/logo/logoFooter.png") }}"  class="img-fluid img-thumbnail-no-borders rounded-0"   alt />
                </a>
            </div>
            <div class="mb-4 col-md-3 mb-lg-0">
                <h5 class="mb-2 text-color-light font-weight-bold">Contact</h5>
                <ul>
                    <li>
                        <a class="custom-text-color-1" href="#" title="Adresse">
                            <span class="d-block font-weight-normal line-height-1 text-color-light">Adresse : </span>
                            70 bis avenue nelson mandela, </br> Centre ville, Brazzaville, CONGO
                        </a>
                    </li>
                    <li>
                        <a class="custom-text-color-1" href="tel:+242069506969" target="_blank" title="Téléphone">
                            <span class="d-block font-weight-normal line-height-1 text-color-light">Téléphone : </span>
                            +242 06 950 69 69
                        </a>
                    </li>
                    <li>
                        <a class="custom-text-color-1" href="mailto:contact@artf.cg" title="Email">
                            <span class="d-block font-weight-normal line-height-1 text-color-light">Email : </span>
                            contact@artf.cg
                        </a>
                    </li>

                    <li>
                        <a class="custom-text-color-1" href="#" target="_blank" title="Jours/Heures ouvrables">
                            <span class="d-block font-weight-normal line-height-1 text-color-light">Jours/Heures ouvrables : </span>
                            Lun - Ven / 7:00 - 15:00
                        </a>
                    </li>

                </ul>
            </div>
            <div class="mb-4 col-md-2 mb-lg-0">
                
            </div>
            <div class="mb-4 col-md-2 mb-lg-0">
                <h5 class="mb-1 text-color-light font-weight-bold">Liens utiles</h5>
                <ul>
                    <li><a class="custom-text-color-1 text-uppercase" href="https://www.finances.gouv.cg/">Ministère des finances</a></li>
                    <li><a class="custom-text-color-1 text-uppercase" href="https://www.arpce.cg/">ARPCE</a></li>
                    <li><a class="custom-text-color-1 text-uppercase" href="http://www.anif.cg/">ANIF</a></li>
                    <li><a class="custom-text-color-1 text-uppercase" href="https://dgden.cg/">DGDEN</a></li>
                    <li><a class="custom-text-color-1 text-uppercase" href="https://douanes.gouv.cg/">DOUANES</a></li>
                    <!-- <li><a class="custom-text-color-1 text-uppercase" href="#">IMPOTS</a></li> -->
                </ul>
            </div>

            <div class="mb-4 col-md-4 mb-lg-0">
                <h5 class="mb-1 text-color-light font-weight-bold">News letter</h5>
                <p class="mb-2 custom-text-color-1">Inscrivez-vous gratuitement à la Newsletter pour être informé des nouvelles décisions, lois, décrets, et toute l'actualité de Agence de Régulation des Transferts de Fonds.</p>
                <div class="alert alert-success d-none" id="newsletterSuccess">
                    <strong>Succès!</strong> Vous avez été ajouté à notre liste de diffusion.
                </div>
                <div class="alert alert-danger d-none" id="newsletterError"></div>
                <form id="newsletterForm" class="form-style-5 opacity-10" action="#" method="POST">
                    <div class="form-row">
                        <div class="form-group col">
                            <input class="form-control" disabled="disabled" placeholder="Adresse Email" name="newsletterEmail" id="newsletterEmail" type="text" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="text-left col-lg-4 text-lg-right">
                            <a href="#" class="btn btn-primary custom-btn-style-1 text-uppercase font-weight-semibold">S'ABONNER</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="pt-3 pb-3 m-0 footer-copyright bg-color-footer">
        <div class="container">

            <div class="row">
                <div class="pt-3 text-center col-lg-12">
                    <ul class="mb-3 social-icons social-icons-clean custom-social-icons">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-googleplus"><a href="http://www.google.com/" target="_blank" title="Google Plus"><i class="fab fa-google-plus-g"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    <p class="custom-text-color-1">© Copyright 2021. Tous droits réservés - ARTF.</p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- Footer  public\assets\js\vendor -->

<script src="{{asset('assets/js/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/popper/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/common/common.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/isotope/jquery.isotope.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/vide/jquery.vide.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/vivus/vivus.min.js')}}"></script>

@livewireScripts


<!--(remove-empty-lines-end)-->
<!--  Components and Settings -->
<script src="{{asset('assets/js/theme.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{asset('assets/js/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{asset('assets/js/view.contact.js')}}"></script>

<!--  -->
<script src="{{asset('assets/js/slider.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('assets/js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('assets/js/theme.init.js')}}"></script>




<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-12345678-1', 'auto');
ga('send', 'pageview');
</script>
-->