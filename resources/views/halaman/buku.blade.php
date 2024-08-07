<!DOCTYPE html>
<html lang="en">

<head> 
    @include('template.header')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    @include('template.headerbody')
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    @include('template.sidebar')
  </aside><!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabel Buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Buku</h5>
                    <div class="text-end">
                      <a href="{{ route('addbuku') }}" class="btn btn-success" title="Add" style="margin-bottom:10px;">
                        <i class="bi bi-plus"></i>
                    </a>
                  </div>
                  @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                  
                    <!-- Bordered Table -->
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Status</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Kategori</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="bukuTable">
                            @foreach($Buku as $b)
                            <tr>
                                <th scope="row"><a href="#">{{ $loop->iteration }}</a></th>
                                <td>{{ $b->judul }}</td>
                                <td>{{ $b->penulis }}</td>
                                <td>{{ $b->penerbit }}</td>
                                <td>{{ $b->tahun_terbit }}</td>
                                <td><span class="badge bg-success">{{ $b->status_ketersediaan }}</td>
                                <td>{{ $b->stok }}</td>
                                <td>{{ $b->kategori }}</td>
                                <th>
                                    <a href="{{ route('halaman.buku.detail', $b->id_buku) }}" class="btn light btn-secondary shadow btn-xs sharp mr-1"><i class="bi bi-info-circle"></i></a>
                                    <form id="editForm_{{ $b->id_buku }}" action="{{ route('halaman.buku.edit', $b->id_buku) }}" method="GET" style="display: inline;">
                                      @csrf
                                      <button type="submit" class="btn btn-warning shadow btn-xs sharp">
                                          <i class="bi bi-pencil-square"></i>
                                      </button>
                                  </form>
                                  <form action="{{ route('buku.forcedelete', $b->id_buku) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    <div class="d-flex justify-content-end">
                        {{ $Buku->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>
