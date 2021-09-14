@extends('layouts.auth')

@section('container')
<div class="login-box" style="width:700px;">
  <div class="login-logo">
    <a href="#"><b>SITE</b>Admin</a>
  </div>
  <!-- /.login-logo -->
  {{-- card auth --}}
    <div class="card">
        <div class="card-body login-card-body">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 input-group">
                    <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <input type="password" class="form-control" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
