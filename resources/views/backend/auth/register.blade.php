@include('backend.layouts.headerAuth')

<div class="auth-main v2">
    <div class="bg-overlay bg-dark"></div>
    <div class="auth-wrapper">
      <div class="auth-sidecontent">
        <div class="text-start px-3 px-md-5">
          <a href="../index.html" class="d-block mt-5"><img src="../assets/images/logo-white.svg" alt="img"></a>
          <p class="text-white mt-2 mt-md-4">Flat Able is one of unique dashboard template which come with tons of ready to use feature.</p>
        </div>
      </div>
      <div class="auth-form">
        <div class="card my-5 mx-3">
          <div class="card-header bg-dark">
            <h4 class="text-center text-white mb-0 f-w-500">Sign up with your work email.</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group mb-3">
                  <input type="text" class="form-control" placeholder="First Name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mb-3">
                  <input type="text" class="form-control" placeholder="Last Name">
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <input type="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group mb-3">
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group mb-3">
              <input type="password" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="d-flex mt-1 justify-content-between">
              <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                <label class="form-check-label text-muted" for="customCheckc1">I agree to all the Terms &amp; Condition</label>
              </div>
            </div>
            <div class="d-grid mt-4">
              <button type="button" class="btn btn-primary">Login</button>
            </div>
            <div class="saprator my-3">
              <span>OR</span>
            </div>
            <div class="row g-2">
              <div class="col-4">
                <div class="d-grid">
                  <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                    <img src="../assets/images/authentication/google.svg" alt="img"> <span class="d-none d-sm-inline-block"> Google</span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                    <img src="../assets/images/authentication/twitter.svg" alt="img"> <span class="d-none d-sm-inline-block">
                      Twitter</span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                    <img src="../assets/images/authentication/facebook.svg" alt="img"> <span class="d-none d-sm-inline-block">
                      Facebook</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer border-top">
            <div class="d-flex justify-content-between align-items-end">
              <div>
                <h6 class="f-w-500 mb-0">Already have an Account?</h6>
                <a href="{{route('login')}}" class="link-primary">Log in</a>
              </div>
              <a href="../index.html"><img src="../assets/images/logo-dark-sm.svg" alt="img"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('backend.layouts.footerAuth')
