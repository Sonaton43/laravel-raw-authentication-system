<!-- ======= Hrader Start ======= -->
@include('layouts.header')
<!-- =======  Hrader End  ======= -->

    <!-- ======= Navbar Start ======= -->
    @include('layouts.navbar')
    <!-- =======  Navbar End  ======= -->

    <!-- ======= Sidebar Start ======= -->
    @include('layouts.sidebar')
    <!-- =======  Sidebar End  ======= -->

  

  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

       @yield('section')

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Sidebar Start ======= -->
  @include('layouts.footer')
  <!-- =======  Sidebar End  ======= -->

<!-- ======= Sidebar Start ======= -->
@include('layouts.script')
<!-- =======  Sidebar End  ======= -->

