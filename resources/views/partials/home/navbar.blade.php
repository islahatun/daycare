<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="index.html" class="navbar-brand">
        <h1 class="m-0 text-primary"><img src="{!! asset('assets/img/logo.jpg') !!}" alt="" height="50px" width="50px"> PUSPAGA</h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="/index-home" class="nav-item nav-link active">Home</a>
            <a href="/about" class="nav-item nav-link">About Us</a>
            <a href="/classes" class="nav-item nav-link">Classes</a>
            <a href="/contact" class="nav-item nav-link">Contact Us</a>
        </div>
        <a href="{{ url('/register') }}"" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Join Us<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->


