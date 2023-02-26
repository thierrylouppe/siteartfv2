<div>
    <div class="">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @can('admin-auteur')
            <div class="container-fluid">
                @if (session()->has('success'))
                <div class="alert alert-success" id="alrte">
                    {{ session()->get('success')}}
                </div>
                @endif
                @can('gestion-publication')
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Publications</h3>
                </div><!-- /.col -->
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @if($nbreseriestatistiques > 0)
                                <h3>{{$nbreseriestatistiques}}</h3>
                                @else
                                <p class="text-red">Aucune donnée</p>
                                @endif
                                <p>Serie statistique</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.gestionpublications.publications.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                @if($nbreetudes > 0)
                                <h3>{{$nbreetudes}}</h3>
                                @else
                                <p class="text-red">Aucune donnée</p>
                                @endif

                                <p>Etudes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.gestionpublications.publications.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @if($nbreavis > 0)
                                <h3>{{$nbreavis}}</h3>
                                @else
                                <p class="text-red">Aucune donnée</p>
                                @endif

                                <p>Avis</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.gestionpublications.publications.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @if($nbrebulletinregulateur > 0)
                                <h3>{{$nbrebulletinregulateur}}</h3>
                                @else
                                <p class="text-blue">Aucune donnée</p>
                                @endif

                                <p>Bulletin du régulateur</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.gestionpublications.publications.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark mb-2">Réglementations</h3>
                </div><!-- /.col -->
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @if($nbrelois > 0)
                                <h3>{{$nbrelois}}</h3>
                                @else
                                <p class="text-red">Aucune donnée</p>
                                @endif

                                <p>Lois</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.gestionreglementations.reglementations.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @if($nbreinstructions > 0)
                                <h3>{{$nbreinstructions}}</h3>
                                @else
                                <p class="text-blue">Aucune donnée</p>
                                @endif

                                <p>Instructions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.gestionreglementations.reglementations.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                @if($nbredecrets > 0)
                                <h3>{{$nbredecrets}}</h3>
                                @else
                                <p class="text-red">Aucune donnée</p>
                                @endif

                                <p>Decrets</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.gestionreglementations.reglementations.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @if($nbrecirculaires > 0)
                                <h3>{{$nbrecirculaires}}</h3>
                                @else
                                <p class="text-blue">Aucune donnée</p>
                                @endif

                                <p>Circulaires</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.gestionreglementations.reglementations.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @if($nbrearretes > 0)
                                <h3>{{$nbrearretes}}</h3>
                                @else
                                <p class="text-red">Aucune donnée</p>
                                @endif

                                <p>Arrêtés</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.gestionreglementations.reglementations.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                @endcan
                
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark mb-2">Actualité</h3>
                </div><!-- /.col -->
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des articles</h3>

                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.gestionarticles.articles.index') }}">
                                <i class="fas fa-eye">
                                </i>
                                Voir plus
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 30%">
                                        Titre Article
                                    </th>
                                    <th style="width: 20%">
                                        Auteur de l'article
                                    </th>

                                    <th style="width: 4%" class="text-center">
                                        Status
                                    </th>
                                    <th style="width: 45%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($this->actualites as $actualite)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            {{$actualite->titre}}
                                        </a>
                                        <br />
                                        <small>
                                            Crée {{Carbon\Carbon::parse($actualite->created_at)->diffForHumans()}}
                                        </small>
                                    </td>
                                    <td>
                                        <a>{{$actualite->user->name}}</a>
                                    </td>
                                    <td class="project-state">
                                        @if($actualite->status == 1)
                                        <span class="badge badge-success">En ligne</span>
                                        @else
                                        <span class="badge badge-warning">En redaction</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.gestionarticles.articles.show', $actualite->slug) }}">
                                            <i class="fas fa-eye">
                                            </i>
                                            Aperçu
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                    <div class="d-flex flex-row justify-content-end mt-2">
                        <div class="col">
                            <ul class="pagination float-right">
                                {{-- {{ $actualites->links()}} --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            @endcan

            @can('isUtilisateur')
            <h1>Ici sera le dashboard de l'utilisateur simple</h1>
            @endcan
        </section>
        <!-- /.content -->
    </div>
</div>
