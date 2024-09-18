<!-- resources/views/home.blade.php -->

@extends('backend.layouts.app')

@section('title', 'Add CSR')
@section('page-header-icon', 'ph-duotone ph-house')
@section('page-header-one', 'Home')
@section('page-header', 'Add CSR')

@section('content')
    <!-- Konten Utama Halaman -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h5>Tambah Program CSR</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                        <div>
                            <h5>Informasi Program</h5>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nama Program:</label>
                                <input type="text" class="form-control" placeholder="Nama Program">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Entitas:</label>
                                <input type="text" class="form-control" placeholder="Entitas">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Deskripsi Program:</label>
                          <div class="input-group search-form">
                            <textarea name="deskripsi_program" class="form-control" id="deskripsi_program" cols="30" rows="10" placeholder="Deskripsi CSR"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Tujuan Program:</label>
                          <div class="input-group search-form">
                            <textarea name="tujuan_program" class="form-control" id="tujuan_program" cols="30" rows="10" placeholder="Tujuan CSR"></textarea>
                          </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Priode Program:</label>
                            <div class="input-group search-form">
                              <span>
                                  <input type="date" name="priode_program_dari" class="form-control" placeholder="Pilih Tanggal">   
                              </span>
                              <span class="mx-3 my-3">s/d</span>
                              <span>
                                  <input type="date" name="priode_program_sampai" class="form-control" placeholder="Pitih Tanggal">   
                              </span>
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Jangka Waktu Manfaat:</label>
                            <div class="input-group search-form">
                              <span>
                                  <input type="date" name="jangka_waktu_manfaat_dari" class="form-control" placeholder="Pilih Tanggal">   
                              </span>
                              <span class="mx-3 my-3">s/d</span>
                              <span>
                                  <input type="date" name="jangka_waktu_manfaat_sampai" class="form-control" placeholder="Pitih Tanggal">   
                              </span>
                            </div>
                          </div>
                      </div>                      
                    </div>                    
                    <hr>
                    <div class="row">
                        <div>
                            <h5>Lokasi Pelaksanaan Program</h5>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Alamat Pelaksanaan Program:</label>
                                <input type="text" class="form-control" placeholder="Alamat Program">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Provinsi:</label>
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">Pilih provinsi</option>
                                    @foreach ($provinces as $p)
                                    <option value="{{ $p['name'] }}" data-id="{{ $p['id'] }}">{{ $p['name'] }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kabupaten/Kota:</label>
                                <select name="kabupaten" id="kabupaten" class="form-control">
                                    <option value="">Pilih kabupaten/kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kecamatan:</label>
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    <option value="">Pilih kecamatan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div>
                            <h5>Stakeholder</h5>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Alamat Pelaksanaan Program:</label>
                                <input type="text" class="form-control" placeholder="Alamat Program">
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
<!-- jQuery CDN (jika belum ditambahkan) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Ketika provinsi dipilih
        $('#provinsi').on('change', function() {
            var provinceId = $('#provinsi option:selected').data('id'); // Ambil ID provinsi dari atribut data-id
            
            if (provinceId) {
                // Kosongkan dropdown kabupaten/kota dan kecamatan sebelum mengisi ulang
                $('#kabupaten').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>'); // Kosongkan kecamatan juga
                
                // Hit API proxy untuk mendapatkan kabupaten/kota berdasarkan ID provinsi
                $.ajax({
                    url: '/proxy/regencies/' + provinceId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Tambahkan kabupaten/kota ke dropdown
                        $.each(data, function(key, value) {
                            $('#kabupaten').append('<option value="'+ value.name +'" data-id="'+value.id+'">'+ value.name +'</option>');
                        });
                    },
                    error: function(err) {
                        console.log("Error fetching regencies:", err);
                    }
                });
            } else {
                // Jika tidak ada provinsi yang dipilih, reset dropdown kabupaten/kota dan kecamatan
                $('#kabupaten').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
            }
        });

        // Ketika kabupaten/kota dipilih
        $('#kabupaten').on('change', function() {
            var regencyId = $('#kabupaten option:selected').data('id'); // Ambil ID kabupaten/kota dari atribut data-id
            
            if (regencyId) {
                // Kosongkan dropdown kecamatan sebelum mengisi ulang
                $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
                
                // Hit API proxy untuk mendapatkan kecamatan berdasarkan ID kabupaten/kota
                $.ajax({
                    url: '/proxy/districts/' + regencyId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Tambahkan kecamatan ke dropdown
                        $.each(data, function(key, value) {
                            $('#kecamatan').append('<option value="'+ value.name +'" data-id="'+value.id+'">'+ value.name +'</option>');
                        });
                    },
                    error: function(err) {
                        console.log("Error fetching districts:", err);
                    }
                });
            } else {
                // Jika tidak ada kabupaten/kota yang dipilih, reset dropdown kecamatan
                $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
            }
        });
    });
</script>
@endsection
