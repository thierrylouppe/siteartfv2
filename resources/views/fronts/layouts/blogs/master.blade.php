<!DOCTYPE html>
<html lang="fr">

{{-- head --}}
@include('fronts.layouts.blogs.head')

<body>
    <div class="body">
        {{-- Header Navbar--}}
        @include("fronts.layouts.blogs.navbar")

        @yield("body")
    </div>
    {{-- footer --}}
    @include("fronts.layouts.blogs.footer")
</body>

</html>