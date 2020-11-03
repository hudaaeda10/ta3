@include('layouts.header')

@include('layouts.sidebar')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        @yield('content')
    </section>
    @yield('modal')
</div>

@include('layouts.footer')