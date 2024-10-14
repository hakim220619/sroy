@include('backend.layouts.headerAuth')
<style>
    .loading {
        border: 4px solid rgba(255, 255, 255, 0.3);
        /* Light grey */
        border-top: 4px solid white;
        /* White spinner color */
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
        display: inline-block;
        margin-left: 10px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .d-none {
        display: none;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h4 class="text-center text-white mb-0 f-w-500">Sign up with your work email.</h4>
                </div>
                <div class="card-body">
                    <form id="registerForm">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Full Name" id="fullName" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" placeholder="Email Address" id="email"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" id="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" placeholder="Confirm Password"
                                id="confirmPassword" required>
                        </div>
                        <div class="d-flex mt-1 justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="termsCheck"
                                    checked="">
                                <label class="form-check-label text-muted" for="termsCheck">I agree to all the Terms
                                    &amp;
                                    Condition</label>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary" id="registerButton">
                                <div id="spinner" class="loading d-none"></div>
                                Register
                                <!-- Custom spinner -->
                            </button>
                        </div>
                    </form>

                    <div class="saprator my-3">
                        <span>OR</span>
                    </div>
                    <div class="row g-2">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="d-grid">
                                <a href="{{ route('login.redirectToGoogle') }}"
                                    class="btn mt-2 btn-light-primary bg-light text-muted">
                                    <img src="../assets/images/authentication/google.svg" alt="img"> <span
                                        class="d-none d-sm-inline-block"> Google</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
                <div class="card-footer border-top">
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h6 class="f-w-500 mb-0">Already have an Account?</h6>
                            <a href="{{ route('login') }}" class="link-primary">Log in</a>
                        </div>
                        <a href="../index.html"><img src="../assets/images/logo-dark-sm.svg" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('backend.layouts.footerAuth')

<!-- Include SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Get the CSRF token from the meta tag
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#registerForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way

            // Show the spinner and disable the button to prevent multiple submissions
            $('#spinner').removeClass('d-none');
            $('#registerButton').prop('disabled', true);

            // Collect form data
            const fullName = $('#fullName').val();
            const email = $('#email').val();
            const password = $('#password').val();
            const confirmPassword = $('#confirmPassword').val();
            const termsCheck = $('#termsCheck').prop('checked');

            // Validate form inputs
            if (!termsCheck) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You must agree to the terms and conditions.',
                });
                $('#spinner').addClass('d-none');
                $('#registerButton').prop('disabled', false);
                return;
            }

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Passwords do not match.',
                });
                $('#spinner').addClass('d-none');
                $('#registerButton').prop('disabled', false);
                return;
            }

            // Send POST request using jQuery AJAX with CSRF token
            $.ajax({
                url: '/registerAction',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    fullName: fullName,
                    email: email,
                    password: password
                }),
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Attach CSRF token here
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    });

                    // Hide spinner and enable button
                    $('#spinner').addClass('d-none');
                    $('#registerButton').prop('disabled', false);

                    // Redirect after success
                    setTimeout(function() {
                        window.location.href = '/login'; // Redirect to login page
                    }, 1500);
                },
                error: function(xhr) {
                    const errorMessage = xhr.responseJSON?.message ||
                        'Registration failed.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage,
                    });

                    // Hide spinner and enable button
                    $('#spinner').addClass('d-none');
                    $('#registerButton').prop('disabled', false);
                }
            });
        });
    });
</script>
