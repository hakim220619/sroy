@include('backend.layouts.headerAuth')
<div class="auth-main v2">
    <div class="bg-overlay bg-dark"></div>
    <div class="auth-wrapper">
        <div class="auth-sidecontent">
            <div class="text-start px-3 px-md-5">
                <a href="../index.html" class="d-block mt-5"><img src="../assets/images/logo-white.svg" alt="img"></a>
                <p class="text-white mt-2 mt-md-4">Flat Able is one of unique dashboard template which come with tons of
                    ready to use feature.</p>
            </div>
        </div>
        <div class="auth-form">
            <div class="card my-5 mx-3">
                <div class="card-header bg-dark">
                    <h4 class="text-center text-white mb-0 f-w-500">Login with your email</h4>
                </div>

                <div class="card-body">
                    <form id="formAuthentication" method="POST" action="{{ route('login.action') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required id="floatingInput" name="email"
                                placeholder="Enter your email" autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                id="floatingInput1"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="d-flex mt-1 justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                            </div>
                            
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="saprator my-3">
                        <span>OR</span>
                    </div>
                    <div class="row g-2">
                        <div class="col-4">
                            <div class="d-grid">
      
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-grid">
                                <a href="{{ route('login.redirectToGoogle') }}" class="btn mt-2 btn-light-primary bg-light text-muted">
                                    <img src="../assets/images/authentication/google.svg" alt="img"> <span
                                        class="d-none d-sm-inline-block"> Google</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="d-grid">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top">
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                            <a href="{{route('register')}}" class="link-primary">Create Account</a>
                        </div>
                        <a href="../index.html"><img src="../assets/images/logo-dark-sm.svg" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.layouts.footerAuth')
