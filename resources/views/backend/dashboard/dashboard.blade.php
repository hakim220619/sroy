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
        <div class="col-12 col-md-6 col-lg-3 mb-3">
          <div class="card flat-card card-border-none">      
              <div class="card-body br">
                  <div class="text-center">
                      <h5>Rata - Rata SROI</h5>
                      <h3>2.18%</h3>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <div class="card flat-card card-border-none">      
                <div class="card-body br">
                    <div class="text-center">
                        <h5>Pertumbuhan SROI</h5>
                        <h3>0.18% <span><i class="material-icons-two-tone text-danger">south</i></span></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <div class="card flat-card card-border-none">      
                <div class="card-body br">
                    <div class="text-center">
                        <h5>Total CSR</h5>
                        <h3>Rp 2.972.354,098</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <div class="card flat-card card-border-none">      
                <div class="card-body br">
                    <div class="text-center">
                        <h5>Total Benefit</h5>
                        <h3>Rp 2.972.354,098</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic Map With Markers</h5>
                </div>
                <div class="card-body">
                  <div id="world-map-markers"  style="height:600px;"></div>
                </div>
            </div>
        </div>
        
      </div>
@endsection
