<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->
  
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Buku</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('halaman.kategoribuku') }}">
                    <i class="bi bi-circle"></i><span>Kategori Buku</span>
                </a>
            </li>
            <li>
                <a href="{{ route('halaman.buku') }}">
                    <i class="bi bi-circle"></i><span>Buku</span>
                </a>
            </li>
        </ul>
    </li>
  
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('halaman.admin') }}">
            <i class="bi bi-person"></i>
            <span>Admin</span>
        </a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('member.dashboard') }}">
            <i class="bi bi-gem"></i>
            <span>Member</span>
        </a>
    </li><!-- End Components Nav -->
  </ul>
  