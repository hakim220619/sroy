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
                <form action="{{ route('csr.store') }}" method="POST" id="csr-form">
                    @csrf
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5>Tambah Program CSR</h5>
                    <div>
                        <button type="submit" class="btn btn-info">Simpan Data</button>
                    </div>
                </div>
                <div class="card-body">
                 
                    <div class="row">
                        <div>
                            <h5>Informasi Program</h5>
                        </div>                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nama Program:</label>
                                <input type="text" name="nama_program" id="nama_program" class="form-control" placeholder="Nama Program">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Entitas:</label>
                                <input type="text" class="form-control" name="entitas" id="entitas" placeholder="Entitas">
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
                             
                                  <input type="date" name="priode_program_dari" id="priode_program_dari" class="form-control" placeholder="Pilih Tanggal">   
                              
                              <span class="mx-3 my-3">s/d</span>
                           
                                  <input type="date" name="priode_program_sampai" id="priode_program_sampai" class="form-control" placeholder="Pitih Tanggal">   
                              
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Jangka Waktu Manfaat:</label>
                            <div class="input-group search-form">
                          
                                  <input type="date" name="jangka_waktu_manfaat_dari" id="jangka_waktu_manfaat_dari" class="form-control" placeholder="Pilih Tanggal">   
                             
                              <span class="mx-3 my-3">s/d</span>
                            
                                  <input type="date" name="jangka_waktu_manfaat_sampai" id="jangka_waktu_manfaat_sampai" class="form-control" placeholder="Pitih Tanggal">   
                              
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
                                <input type="text" class="form-control" name="alamat_pelaksanaan" id="alamat_pelaksanaan" placeholder="Alamat Program">
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
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                  <thead>
                                    <tr>
                                      <th>Nama Stakeholder</th>
                                      <th>Peran</th>
                                      <th>Output</th>
                                      <th>Outcome</th>
                                      <th>Dana</th>
                                      <th>Durasi</th>
                                      <th>Barang</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                              </div>
                              <div>
                                    <div id="stakeholder-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Stakeholder</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="row">
                                                      <div class="col-12">
                                                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                                                          <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                                                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                                              <path
                                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                                                              </path>
                                                            </symbol>
                                                          </svg>
                                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                                                            <use xlink:href="#info-fill"></use>
                                                          </svg>
                                                          <div> Silahkan isi dengan benar. </div>
                                                        </div>
                                                      </div>                                                      
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label" for="inputAddress">Nama Stakeholder</label>
                                                      <input type="text" class="form-control" id="stakeholder-name" placeholder="Nama Stakeholder">
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label" for="inputAddress2">Peran</label>
                                                      <input type="text" class="form-control" id="stakeholder-role" placeholder="Peran">
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label" for="inputAddress2">Output</label>
                                                      <textarea name="output"  class="form-control" id="stakeholder-output" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label" for="inputAddress2">Outcome</label>
                                                      <textarea name="output"  class="form-control" id="stakeholder-outcome" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="row">
                                                      <div class="form-group col-md-3">
                                                        <label class="form-label" for="inputCity">Dana</label>
                                                        <input type="text" class="form-control" id="stakeholder-dana" >
                                                      </div>
                                                      <div class="form-group col-md-2">
                                                        <label class="form-label" for="inputZip">Durasi</label>
                                                        <input type="text" class="form-control" id="stakeholder-durasi">
                                                      </div>
                                                      <div class="form-group col-md-3 mt-2">
                                                        <label class="form-label" for="inputZip"></label>
                                                        <select id="stakeholder-satuan-waktu" class="form-select">
                                                          <option value="" selected>select</option>
                                                          <option>Bulan</option>
                                                          <option>Minggu</option>
                                                          <option>Hari</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                        <label class="form-label" for="inputCity">Barang</label>
                                                        <input type="text" class="form-control" id="stakeholder-barang" placeholder="Nama Barang">
                                                      </div>                                                      
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="save-stakeholder-btn">Save changes</button>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-info" id="add-stakeholder-btn" data-bs-toggle="modal" data-bs-target="#exampleModalLive">Tambah Stakeholder</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-stakeholder-btn').addEventListener('click', function () {
        $('#stakeholder-modal').modal('show');
    });

    document.getElementById('save-stakeholder-btn').addEventListener('click', function () {
        let name = document.getElementById('stakeholder-name').value;
        let role = document.getElementById('stakeholder-role').value;
        let output = document.getElementById('stakeholder-output').value;
        let outcome = document.getElementById('stakeholder-outcome').value;
        let dana = document.getElementById('stakeholder-dana').value;
        let durasi = document.getElementById('stakeholder-durasi').value;
        let satuan_waktu = document.getElementById('stakeholder-satuan-waktu').value;
        let barang = document.getElementById('stakeholder-barang').value;

        // Tambahkan stakeholder ke tabel
        let newRow = `<tr>
            <td><input type="hidden" name="stakeholders[][name]" value="${name}">${name}</td>
            <td><input type="hidden" name="stakeholders[][role]" value="${role}">${role}</td>
            <td><input type="hidden" name="stakeholders[][output]" value="${output}">${output}</td>
            <td><input type="hidden" name="stakeholders[][outcome]" value="${outcome}">${outcome}</td>
            <td><input type="hidden" name="stakeholders[][dana]" value="${dana}">${dana}</td>
            <td><input type="hidden" name="stakeholders[][durasi]" value="${durasi} ${satuan_waktu}">${durasi} ${satuan_waktu}</td>
            <td><input type="hidden" name="stakeholders[][barang]" value="${barang}">${barang}</td>
            <td><button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button></td>
        </tr>`;

        document.querySelector('#pc-dt-simple tbody').insertAdjacentHTML('beforeend', newRow);
        $('#stakeholder-modal').modal('hide');

        // Tambah event listener untuk tombol hapus
        document.querySelectorAll('.delete-row').forEach(btn => {
            btn.addEventListener('click', function () {
                this.closest('tr').remove();
            });
        });
    });
});
</script>
@endsection
