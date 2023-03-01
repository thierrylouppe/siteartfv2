<div class="p-4 col-md-12">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card mx-auto" style="width: 50%;">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                @if (currentRouteIs('profils.changepassword'))
                <i class="fas fa-user mr-1"></i>
                Mot de passe
                @elseif (currentRouteIs('profils.profils'))
                <i class="fas fa-user mr-1"></i>
                Votre profil
                @endif
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('profils.profils') }}" class="nav-link {{ currentRouteIs('profils.profils') ? 'active' : '' }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profils.changepassword') }}" class="nav-link {{ currentRouteIs('profils.changepassword') ? 'active' : '' }}">Changement de mot de passe</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
    
                @if (currentRouteIs('profils.changepassword'))
                <livewire:profilusers.changepassword />
                @elseif (currentRouteIs('profils.profils'))
                <livewire:profilusers.profilusers />
                @endif
            </div>
        </div>
    </div>
</div>
