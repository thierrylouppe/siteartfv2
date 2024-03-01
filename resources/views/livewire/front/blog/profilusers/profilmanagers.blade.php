<div>
    <div class="p-4 col-md-12">
        {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
        <div class="card mx-auto" style="width: 50%;">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    @if (currentRouteIs('blog.changepassword'))
                        <i class="fas fa-user mr-1"></i>
                        Mot de passe
                    @elseif (currentRouteIs('blog.profils'))
                        <i class="fas fa-user mr-1"></i>
                        Votre profil
                    @endif
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('blog.profils') }}"
                                class="nav-link {{ currentRouteIs('blog.profils') ? 'active' : '' }}">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.changepassword') }}"
                                class="nav-link {{ currentRouteIs('blog.changepassword') ? 'active' : '' }}">Changement
                                de mot de passe</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">

                    @if (currentRouteIs('blog.changepassword'))
                        <livewire:profilusers.changepassword />
                    @elseif (currentRouteIs('blog.profils'))
                        <livewire:profilusers.profilusers />
                    @endif
                </div>
            </div>
            @if (currentRouteIs('blog.profils') || currentRouteIs('blog.changepassword'))
                <div class="card-footer">
                    <a href="{{ route('blog.liste') }}" class="btn btn-danger float-right">Annuler</a>
                </div>
            @endif
        </div>
    </div>

</div>
