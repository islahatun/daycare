<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Halaman</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/profile">
                <i class="bi bi-person"></i>
                <span>Profil</span>
            </a>
        </li><!-- End Profile Page Nav -->

        @if (Auth()->user()->role == 'Parent')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/reportStudent/assessment">
                    <i class="bi bi-person"></i>
                    <span>Penilaian Anak</span>
                </a>
            </li><!-- End Profile Page Nav -->
        @elseif(Auth()->user()->role == 'Admininstrator')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/students">
                    <i class="bi bi-person"></i>
                    <span>Daftar Anak</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/user">
                    <i class="bi bi-card-list"></i>
                    <span>Daftar Pengguna</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/teacher">
                    <i class="bi bi-card-list"></i>
                    <span>Daftar Guru</span>
                </a>
            </li><!-- End Contact Page Nav -->



            {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="/class">
          <i class="bi bi-envelope"></i>
          <span>List Class</span>
        </a>
      </li> --}}
            <!-- End Contact Page Nav -->

           
        @elseif(Auth()->user()->role == 'Teacher')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/activityChildern">
                    <i class="bi bi-card-list"></i>
                    <span>Aktivitas Anak</span>
                </a>
            </li><!-- End Register Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/DevelopmentChildern">
                    <i class="bi bi-card-list"></i>
                    <span>Master Perkembangan</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/trans-DevelopmentChildern">
                    <i class="bi bi-card-list"></i>
                    <span>Penilaian Anak</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/report">
                    <i class="bi bi-envelope"></i>
                    <span>Report</span>
                </a>
            </li><!-- End Login Page Nav -->
        @elseif(Auth()->user()->role == 'Headmaster')
        <li class="nav-item">
            <a class="nav-link collapsed" href="/validate">
                <i class="bi bi-envelope"></i>
                <span>Validasi penilaian Anak</span>
            </a>
        </li><!-- End Login Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/report">
                    <i class="bi bi-envelope"></i>
                    <span>Report</span>
                </a>
            </li><!-- End Login Page Nav -->

        @endif




    </ul>

</aside>
