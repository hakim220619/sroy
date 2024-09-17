<style>
    /* Styling for the outer container to center the content */
    .center-container {
        display: flex;
        justify-content: center;
        /* Centers horizontally */
        align-items: center;
        /* Centers vertically */
        height: 5vh;
        /* Takes full viewport height */
    }

    .pc-item .add-csr-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #f1f1f1;
        /* Adjust the background color */
        padding: 10px 20px;
        /* Padding to create space inside */
        border-radius: 10px;
        /* Rounded corners */
        text-decoration: none;
        /* Remove underline from the link */
        color: #000;
        /* Text color */
        font-weight: 500;
        /* Make text a bit bolder */
        width: fit-content;
        /* Adjust width to content */
    }

    .pc-item .add-csr-btn .pc-mtext {
        margin-right: 10px;
        /* Space between text and icon */
    }

    .pc-item .add-csr-btn .pc-micon {
        background-color: #000;
        /* Icon background color */
        color: #fff;
        /* Icon color */
        padding: 5px;
        border-radius: 50%;
        /* Make it round */
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 24px;
        height: 24px;
    }

    .pc-item .add-csr-btn:hover {
        background-color: #e0e0e0;
        /* Change background on hover */
    }
    
</style>
<nav class="pc-sidebar" style="background: #157035">
    <div class="navbar-wrapper">
        <div class="m-header" style="background: #157035">
            <a href="../dashboard/index.html" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="../assets/images/logo-white.svg" alt="logo image" class="logo-lg">
                <span class="badge bg-primary rounded-pill ms-2 theme-version">v1.2</span>
            </a>
        </div>

        <div class="card pc-user-card" style="background: #157035">
            <div class="card-body">
                <div class="nav-user-image" style="background: #157035">
                    <a data-bs-toggle="collapse" href="#navuserlink">
                        <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                            class="user-avtar rounded-circle">
                    </a>
                </div>
                <div class="pc-user-collpsed collapse" id="navuserlink">
                    <h4 class="mb-0">Jonh Smith</h4>
                    <span>Administrator</span>
                    <ul>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-user"></i>
                                <span>My Account</span>
                            </a></li>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-gear"></i>
                                <span>Settings</span>
                            </a></li>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-lock-key"></i>
                                <span>Lock Screen</span>
                            </a></li>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-power"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar-content" style="background: #157035">
            <ul class="pc-navbar" style="background: #157035;">
                <div class="center-container">
                    <li class="pc-item">
                        <a href="../pages/settings.html" class="pc-link add-csr-btn">
                            <span class="pc-mtext">Add CSR</span>
                            <span class="pc-micon">
                                <i class="ph-duotone ph-plus"></i>
                            </span>
                        </a>
                    </li>
                </div>


                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item">
                  <a href="../pages/dashboard.html" class="pc-link">
                    <span class="pc-micon">
                      <i class="ph-duotone ph-house"></i> <!-- Ikon dashboard -->
                    </span>
                    <span class="pc-mtext">Dashboard</span>
                  </a>
                </li>
                <li class="pc-item">
                  <a href="../pages/data-csr.html" class="pc-link">
                    <span class="pc-micon">
                      <i class="ph-duotone ph-folder"></i> <!-- Ikon folder untuk Data CSR -->
                    </span>
                    <span class="pc-mtext">Data CSR</span>
                  </a>
                </li>
                <li class="pc-item">
                  <a href="../pages/analisis-sroi.html" class="pc-link">
                    <span class="pc-micon">
                      <i class="ph-duotone ph-arrow-counter-clockwise"></i> <!-- Ikon analisis untuk SROI -->
                    </span>
                    <span class="pc-mtext">Analisis SROI</span>
                  </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
