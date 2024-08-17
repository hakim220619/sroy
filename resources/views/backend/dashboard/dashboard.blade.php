<!-- resources/views/home.blade.php -->

@extends('backend.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-header-icon', 'ph-duotone ph-house')
@section('page-header-one', 'Dashboard')
@section('page-header', 'Dashboard Admin')

@section('content')
    <!-- Konten Utama Halaman -->
    <div class="row">
        <!-- table card-1 start -->
        <div class="col-xxl-4 col-md-6">
          <div class="card flat-card card-border-none">
            <div class="row-table">
              <div class="col-sm-6 card-body w-50 br">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-success">visibility</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>10k</h5>
                    <span>Visitors</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 card-body w-50">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-danger">radio</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>100%</h5>
                    <span>Volume</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row-table">
              <div class="col-sm-6 card-body w-50 br">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-primary">description</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>2000 +</h5>
                    <span>Files</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 card-body w-50">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-warning">move_to_inbox</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>120</h5>
                    <span>Mails</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- table card-1 end -->
        <!-- table card-2 start -->
        <div class="col-xxl-4 col-md-6">
          <div class="card flat-card card-border-none">
            <div class="row-table">
              <div class="col-sm-6 card-body w-50 br">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-primary">local_florist</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>1000</h5>
                    <span>Shares</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 card-body w-50">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-primary">router</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>600</h5>
                    <span>Network</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row-table">
              <div class="col-sm-6 card-body w-50 br">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-primary">filter_vintage</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>3550</h5>
                    <span>Returns</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 card-body w-50">
                <div class="row">
                  <div class="col-4">
                    <i class="material-icons-two-tone text-primary">local_mall</i>
                  </div>
                  <div class="col-8 text-md-center">
                    <h5>100%</h5>
                    <span>Order</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- table card-2 end -->
        <!-- Widget primary-success card start -->
        <div class="col-md-12 col-xxl-4">
          
          <div class="row">
            <!-- widget primary card start -->
            <div class="col-xxl-12 col-md-6">
              <div class="card flat-card widget-primary-card">
                <div class="row-table row">
                  <div class="col-3 py-4">
                    <i class="material-icons-two-tone text-white">stars</i>
                  </div>
                  <div class="col-9 w-50">
                    <h4>4000 +</h4>
                    <h6>Ratings Receive</h6>
                  </div>
                </div>
              </div>
            </div>
            <!-- widget primary card end -->
            <!-- widget-success-card start -->
            <div class="col-xxl-12 col-md-6">
              <div class="card flat-card widget-purple-card">
                <div class="row-table row">
                  <div class="col-3 py-4">
                    <i class="material-icons-two-tone text-white">emoji_events</i>
                  </div>
                  <div class="col-9 w-50">
                    <h4>17</h4>
                    <h6>Achievement</h6>
                  </div>
                </div>
              </div>
            </div>
            <!-- widget-success-card end -->
          </div>
        </div>
        <!-- Widget primary-success card end -->

        <!-- account-section start -->
        <div class="col-xl-6 col-md-12">
          <div class="card">
            <div class="card-body">
              <h6 class="text-primary mb-3">Department wise annual recurring and profit</h6>
              <div class="row">
                <div class="col-auto">
                  <h3>$687,578</h3>
                  <h6 class="d-flex"><i class="feather icon-trending-down text-danger"></i> <span class="mx-2">Marketing Growth</span></h6>
                  <span>Measure How Fast You're Growing in<br>current Market.<span class="text-primary">Learn
                      More</span></span>
                </div>
                <div class="col">
                  <h3>30%</h3>
                  <h6 class="d-flex"><i class="feather icon-trending-up text-primary"></i> <span class="mx-2">Annual profit/stakeholders</span></h6>
                  <span>Ave 30% or more profite provide to investor as<br>Anual return.<span class="text-primary">Learn
                      More</span></span>
                </div>
              </div>
            </div>
            <div id="account-chart"></div>
          </div>
        </div>
        <!-- account-section end -->
        <!-- latest updates, Recent Tickets start -->
        <div class="col-xl-6 col-md-12">
          <div class="card latest-update-card">
            <div class="card-header">
              <h5>Latest Updates</h5>
            </div>
            <div class="card-body">
              <div class="latest-update-box">
                <div class="row p-t-20 p-b-30">
                  <div class="col-auto text-end update-meta">
                    <p class="text-muted m-b-0 d-inline-flex">2 hrs ago</p>
                    <i class="feather icon-twitter bg-info update-icon"></i>
                  </div>
                  <div class="col">
                    <a href="#!">
                      <h6>+ 1652 Followers</h6>
                    </a>
                    <p class="text-muted m-b-0">You’re getting more and more followers, keep it up!</p>
                  </div>
                </div>
                <div class="row p-b-30">
                  <div class="col-auto text-end update-meta">
                    <p class="text-muted m-b-0 d-inline-flex">4 hrs ago</p>
                    <i class="feather icon-briefcase bg-danger update-icon"></i>
                  </div>
                  <div class="col">
                    <a href="#!">
                      <h6>+ 5 New Products were added!</h6>
                    </a>
                    <p class="text-muted m-b-0">Congratulations!</p>
                  </div>
                </div>
                <div class="row p-b-30">
                  <div class="col-auto text-end update-meta">
                    <p class="text-muted m-b-0 d-inline-flex">1 day ago</p>
                    <i class="feather icon-check f-w-600 bg-success update-icon"></i>
                  </div>
                  <div class="col">
                    <a href="#!">
                      <h6>Database backup completed!</h6>
                    </a>
                    <p class="text-muted m-b-0">Download the <span class="text-primary"> <a href="#!"
                          class="text-primary">latest backup</a> </span>.</p>
                  </div>
                </div>
                <div class="row p-b-0">
                  <div class="col-auto text-end update-meta">
                    <p class="text-muted m-b-0 d-inline-flex">2 day ago</p>
                    <i class="feather icon-facebook bg-primary update-icon"></i>
                  </div>
                  <div class="col">
                    <a href="#!">
                      <h6>+2 Friend Requests</h6>
                    </a>
                    <p class="text-muted m-b-10">This is great, keep it up!</p>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <a href="#!" class="b-b-primary text-primary">View all Projects</a>
              </div>
            </div>
          </div>
        </div>
        <!-- liveline1-section start -->
        <div class="col-sm-12">
          <div id="stastic-slider-full4" class="carousel slide stastic-slider-full-card"
              data-bs-ride="carousel">
              <div class="carousel-inner">
                  <div class="carousel-item" data-interval="12000">
                      <div class="row g-0">
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-ethereum text-danger f-22 m-r-5"></i>Ethereum(ETH)</span>
                                      <h6 class="badge bg-light-danger float-end d-inline-block m-0 ms-1">+1.5278
                                      </h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-bitcoin text-warning f-22 m-r-5"></i>Bitcoin(BTC)</span>
                                      <h6 class="badge bg-light-warning float-end d-inline-block m-0 ms-1">
                                          -0.997896
                                      </h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-cloudsmith text-primary f-22 m-r-5"></i>Ripple(RPL)</span>
                                      <h6 class="badge bg-light-primary float-endd-inline-block m-0 ms-1">-7.66789
                                      </h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-asymmetrik text-warning f-22 m-r-5"></i>Neo(NEO)</span>
                                      <h6 class="badge bg-light-warning float-end d-inline-block m-0 ms-1">+5.78789
                                      </h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item active" data-interval="12000">
                      <div class="row g-0">
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-ethereum text-danger f-22 m-r-5"></i>Ethereum(ETH)</span>
                                      <h6 class="badge bg-light-danger float-end d-inline-block m-0 ms-1">-7.6648
                                      </h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-bitcoin text-warning f-22 m-r-5"></i>Bitcoin(BTC)</span>
                                      <h6 class="badge bg-light-warning float-end d-inline-block m-0 ms-1">+5.1024
                                      </h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-cloudsmith text-primary f-22 m-r-5"></i>Ripple(RPL)</span>
                                      <h6 class="badge bg-light-primary float-end d-inline-block m-0 ms-1">+4.5896
                                      </h6>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 col-xl-3">
                              <div class="card bg-dark rounded-0 shadow-none">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <span
                                          class="text-white d-flex justify-content-center align-items-center"><i
                                              class="fab fa-asymmetrik text-warning f-22 m-r-5"></i>Neo(NEO)</span>
                                      <h6 class="badge bg-light-warning float-end d-inline-block m-0 ms-1">+1.4563
                                      </h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
