<!DOCTYPE html>
<html lang="fr">

{{-- head --}}
@include('fronts.layouts.head')

<body>
    <div class="body">
        {{-- Header Navbar--}}
        @include('fronts.partials.navbar')

        @yield("body")
    </div>
    {{-- footer --}}
    @include('fronts.layouts.footer')
</body>

</html>