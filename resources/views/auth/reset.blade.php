@extends('auth.layouts.welcome')
@section('authsection')

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Demo Admin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset Your Password</h5>
                    <p class="text-center small">Enter your New Password</p>
                  </div>

                  <!--For Message-->
                  @include('auth.layouts.message')
                  <form class="row g-3 needs-validation" action="" method="POST">
                    @csrf
                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter Password</div>
                    </div>
                    <div class="col-12">
                      <label for="cpassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                      <div class="invalid-feedback">Please enter Confirm Password</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Reset</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0 mt-3">you have account ?<a href="!#}"> Login</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="https://www.facebook.com/shartho.kundu">Sonaton Kundu</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
@endsection