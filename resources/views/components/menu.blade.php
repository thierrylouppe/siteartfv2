<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{ route('dashboard')}}" class="nav-link {{ setMenuActive('home') }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
          
          @can("admin")
          <li class="nav-item {{ setMenuClass("admin.habilitations.", 'menu-open') }}" >
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Habilitations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                href="{{ route("admin.habilitations.users.index")}}"
                class="nav-link {{ setMenuClass("admin.habilitations.", 'active') }}"
                >
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
          @can('gestion-actualite')
            <li class="nav-item {{ setMenuClass("admin.gestionarticles.", 'menu-open') }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Gestion articles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("admin.gestionarticles.articles.index")}}" 
                class="nav-link {{ setMenuClass("admin.gestionarticles.", 'active') }}">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>Articles</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">CHIFFRES CLES</li>
          <li class="nav-item">
            <a href="{{ route("admin.gestionchiffrecles.chiffrecles.index")}}" class="nav-link {{ setMenuClass("admin.gestionchiffrecles.", 'active') }}">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
                Gest des chiffres clés
              </p>
            </a>
          </li>

          <li class="nav-header">PUBLICATIONS</li>
          <li class="nav-item">
            <a href="{{ route("admin.gestionpublications.publications.index")}}" class="nav-link {{ setMenuClass("admin.gestionpublications.", 'active') }}">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Gest publications
              </p>
            </a>
          </li>

          <li class="nav-header">REGLEMENTATIOLNS</li>
          <li class="nav-item">
            <a href="{{ route("admin.gestionreglementations.reglementations.index")}}" class="nav-link {{ setMenuClass("admin.gestionreglementations.", 'active') }}">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Gest reglementations
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </nav>