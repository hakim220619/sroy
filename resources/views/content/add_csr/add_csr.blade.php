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
                                <input type="text" name="nama_program" id="nama_program" class="form-control" placeholder="Nama Program" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Entitas:</label>
                                <input type="text" class="form-control" name="entitas" id="entitas" placeholder="Entitas" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Region:</label>
                                <select name="region" id="region" class="form-control" required>
                                  <option value="">Pilih Region</option>
                                  <option value="Region 1 - Supporting Co - PTPN 2">Region 1 - Supporting Co - PTPN 2</option>
                                  <option value="Region 6 - Supporting Co (PTPN1)">Region 6 - Supporting Co (PTPN1)</option>
                                  <option value="Region 1 - Palm Co (PTPN 3)">Region 1 - Palm Co (PTPN 3)</option>
                                  <option value="Region 2 - Palm Co (PTPN 4)">Region 2 - Palm Co (PTPN 4)</option>
                                  <option value="Region 3 - Palm Co (PTPN 5)">Region 3 - Palm Co (PTPN 5)</option>
                                  <option value="Region 4 - Palm Co (PTPN 6)">Region 4 - Palm Co (PTPN 6)</option>
                                  <option value="Region 7 - Supporting Co (PTPN 7)">Region 7 - Supporting Co (PTPN 7)</option>
                                  <option value="Region 2 - Supporting Co (PTPN 8)">Region 2 - Supporting Co (PTPN 8)</option>
                                  <option value="Region 3 - Supporting Co (PTPN 9)">Region 3 - Supporting Co (PTPN 9)</option>
                                  <option value="Region 4 - Supporting Co (PTPN 10)">Region 4 - Supporting Co (PTPN 10)</option>
                                  <option value="Region 4 - Supporting Co (PTPN 11)">Region 4 - Supporting Co (PTPN 11)</option>
                                  <option value="Region 5 - Supporting Co (PTPN 12)">Region 5 - Supporting Co (PTPN 12)</option>
                                  <option value="Region 5 - Palm Co (PTPN 13)">Region 5 - Palm Co (PTPN 13)</option>
                                  <option value="Region 8 - Supporting Co (PTPN 14)">Region 8 - Supporting Co (PTPN 14)</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Anggaran:</label>
                                <input type="number" class="form-control" name="anggaran" id="anggaran" placeholder="anggaran" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Deskripsi Program:</label>
                          <div class="input-group search-form">
                            <textarea name="deskripsi_program" class="form-control" id="deskripsi_program" cols="30" rows="10" placeholder="Deskripsi CSR" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Tujuan Program:</label>
                          <div class="input-group search-form">
                            <textarea name="tujuan_program" class="form-control" id="tujuan_program" cols="30" rows="10" placeholder="Tujuan CSR" required></textarea>
                          </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Priode Program:</label>
                            <div class="input-group search-form">
                             
                                  <input type="date" name="priode_program_dari" id="priode_program_dari" class="form-control" placeholder="Pilih Tanggal" required>   
                              
                              <span class="mx-3 my-3">s/d</span>
                           
                                  <input type="date" name="priode_program_sampai" id="priode_program_sampai" class="form-control" placeholder="Pitih Tanggal" required>   
                              
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Jangka Waktu Manfaat:</label>
                            <div class="input-group search-form">
                          
                                  <input type="date" name="jangka_waktu_manfaat_dari" id="jangka_waktu_manfaat_dari" class="form-control" placeholder="Pilih Tanggal" required>   
                             
                              <span class="mx-3 my-3">s/d</span>
                            
                                  <input type="date" name="jangka_waktu_manfaat_sampai" id="jangka_waktu_manfaat_sampai" class="form-control" placeholder="Pitih Tanggal" required>   
                              
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
                                <input type="text" class="form-control" name="alamat_pelaksanaan" id="alamat_pelaksanaan" placeholder="Alamat Program" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Provinsi:</label>
                                <select name="provinsi" id="provinsi" class="form-control" required>
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
                                <select name="kabupaten" id="kabupaten" class="form-control" required>
                                    <option value="">Pilih kabupaten/kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kecamatan:</label>
                                <select name="kecamatan" id="kecamatan" class="form-control" required>
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
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                              </div>
                              <div>
                                {{-- Edit data stakeholder --}}
                                <div id="stakeholder-edit-modal" class="modal fade" tabindex="-1" aria-labelledby="viewStakeholderModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="viewStakeholderModalLabel">Data Stakeholder</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label>Nama Stakeholder:</label>
                                                  <input type="text" class="form-control" id="stakeholder-name-edit">                                                  
                                              </div>
                                              <div class="form-group">
                                                  <label>Peran:</label>
                                                  <input type="text" class="form-control" id="stakeholder-role-edit">  
                                              </div>
                                              <div class="form-group">
                                                  <label>Output:</label>
                                                  <input type="text" class="form-control" id="stakeholder-output-edit">  
                                              </div>
                                              <div class="form-group">
                                                  <label>Outcome:</label>
                                                  <input type="text" class="form-control" id="stakeholder-outcome-edit">  
                                              </div>
                                              <div class="form-group">
                                                  <label>Dana:</label>
                                                  <input type="text" class="form-control" id="stakeholder-dana-edit">  
                                              </div>
                                              <div class="form-group">
                                                  <label>Durasi:</label>
                                                  <input type="text" class="form-control" id="stakeholder-durasi-edit">
                                              </div>
                                              <div class="form-group">
                                                  <label>Barang:</label>
                                                  <input type="text" class="form-control" id="stakeholder-barang-edit">
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary" id="save-changes-btn">Simpan Perubahan</button>
                                        </div>
                                      </div>
                                  </div>
                              </div>

                                {{-- Lihat data stakeholder --}}
                                <div id="stakeholder-view-modal" class="modal fade" tabindex="-1" aria-labelledby="viewStakeholderModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="viewStakeholderModalLabel">Data Stakeholder</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label>Nama Stakeholder:</label>
                                                  <input type="text" class="form-control" id="stakeholder-name-view" readonly>                                                  
                                              </div>
                                              <div class="form-group">
                                                  <label>Peran:</label>
                                                  <input type="text" class="form-control" id="stakeholder-role-view" readonly>  
                                              </div>
                                              <div class="form-group">
                                                  <label>Output:</label>
                                                  <input type="text" class="form-control" id="stakeholder-output-view" readonly>  
                                              </div>
                                              <div class="form-group">
                                                  <label>Outcome:</label>
                                                  <input type="text" class="form-control" id="stakeholder-outcome-view" readonly>  
                                              </div>
                                              <div class="form-group">
                                                  <label>Dana:</label>
                                                  <input type="text" class="form-control" id="stakeholder-dana-view" readonly>  
                                              </div>
                                              <div class="form-group">
                                                  <label>Durasi:</label>
                                                  <input type="text" class="form-control" id="stakeholder-durasi-view" readonly>
                                              </div>
                                              <div class="form-group">
                                                  <label>Barang:</label>
                                                  <input type="text" class="form-control" id="stakeholder-barang-view" readonly>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                {{-- tambah stakeholder --}}
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
                                                      <input type="text" class="form-control" id="stakeholder-name" placeholder="Nama Stakeholder" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label" for="inputAddress2">Peran</label>
                                                      <input type="text" class="form-control" id="stakeholder-role" placeholder="Peran" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label" for="inputAddress2">Output</label>
                                                      <textarea name="output"  class="form-control" id="stakeholder-output" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                      <label class="form-label" for="inputAddress2">Outcome</label>
                                                      <textarea name="output"  class="form-control" id="stakeholder-outcome" cols="30" rows="10" required></textarea>
                                                    </div>
                                                    <div class="row">
                                                      <div class="form-group col-md-3">
                                                        <label class="form-label" for="inputCity">Dana</label>
                                                        <input type="text" class="form-control" id="stakeholder-dana"  required>
                                                      </div>
                                                      <div class="form-group col-md-2">
                                                        <label class="form-label" for="inputZip">Durasi</label>
                                                        <input type="text" class="form-control" id="stakeholder-durasi" required>
                                                      </div>
                                                      <div class="form-group col-md-3 mt-2">
                                                        <label class="form-label" for="inputZip"></label>
                                                        <select id="stakeholder-satuan-waktu" class="form-select" required>
                                                          <option value="" selected>select</option>
                                                          <option>Tahun</option>
                                                          <option>Bulan</option>
                                                          <option>Minggu</option>
                                                          <option>Hari</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                        <label class="form-label" for="inputCity">Barang</label>
                                                        <input type="text" class="form-control" id="stakeholder-barang" placeholder="Nama Barang" required>
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
                                    <button type="button" class="btn btn-info" id="add-stakeholder-btn" data-bs-toggle="modal" data-bs-target="#stakeholder-modal">Tambah Stakeholder</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
          // Ambil referensi elemen input
          const stakeholderForm = document.getElementById('stakeholder-modal');
          const name = document.getElementById('stakeholder-name');
          const role = document.getElementById('stakeholder-role');
          const output = document.getElementById('stakeholder-output');
          const outcome = document.getElementById('stakeholder-outcome');
          const dana = document.getElementById('stakeholder-dana');
          const durasi = document.getElementById('stakeholder-durasi');
          const satuan_waktu = document.getElementById('stakeholder-satuan-waktu');
          const barang = document.getElementById('stakeholder-barang');

          // Cek validitas form menggunakan Constraint Validation API
          if (!name.checkValidity() ||
              !role.checkValidity() ||
              !output.checkValidity() ||
              !outcome.checkValidity() ||
              !dana.checkValidity() ||
              !durasi.checkValidity() ||
              !satuan_waktu.checkValidity() ||
              !barang.checkValidity()) {
              // Tampilkan pesan error menggunakan Bootstrap atau SweetAlert
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Semua field di modal Stakeholder harus diisi!',
              });

              // Tampilkan validasi browser
              name.reportValidity();
              role.reportValidity();
              output.reportValidity();
              outcome.reportValidity();
              dana.reportValidity();
              durasi.reportValidity();
              satuan_waktu.reportValidity();
              barang.reportValidity();

              return;
          }

          // Ambil nilai dari input
          let stakeholderName = name.value.trim();
          let stakeholderRole = role.value.trim();
          let stakeholderOutput = output.value.trim();
          let stakeholderOutcome = outcome.value.trim();
          let stakeholderDana = dana.value.trim();
          let stakeholderDurasi = durasi.value.trim();
          let stakeholderSatuanWaktu = satuan_waktu.value;
          let stakeholderBarang = barang.value.trim();

          // Tambahkan Stakeholder ke tabel
          let newRow = `<tr>
              <td class="stakeholder-name">
                  <input type="hidden" name="stakeholders[][name]" id="stakeholder-name" value="${escapeHtml(stakeholderName)}">
                 ${escapeHtml(stakeholderName)}
              </td>
              <td class="stakeholder-role">
                  <input type="hidden" name="stakeholders[][peran]" id="stakeholder-role" value="${escapeHtml(stakeholderRole)}">
                  ${escapeHtml(stakeholderRole)}
              </td>
              <span>
                  <input type="hidden" name="stakeholders[][output]" id="stakeholder-output" value="${escapeHtml(stakeholderOutput)}">             
              </span>
              <span>
                  <input type="hidden" name="stakeholders[][outcome]" id="stakeholder-outcome" value="${escapeHtml(stakeholderOutcome)}">
              </span>
              <span>
                  <input type="hidden" name="stakeholders[][dana]" id="stakeholder-dana" value="${escapeHtml(stakeholderDana)}">                  
              </span>
              <span>
                  <input type="hidden" name="stakeholders[][durasi]" id="stakeholder-durasi" value="${escapeHtml(stakeholderDurasi)} ${escapeHtml(stakeholderSatuanWaktu)}">                  
              </span>
              <span>
                  <input type="hidden" name="stakeholders[][barang]" id="stakeholder-barang" value="${escapeHtml(stakeholderBarang)}">                 
              </span>
              <td>
                  <button type="button" class="btn btn-danger btn-sm delete-row">Hapus</button>
                  <button type="button" class="btn btn-info btn-sm view-data" 
                    data-name="${escapeHtml(stakeholderName)}" 
                    data-role="${escapeHtml(stakeholderRole)}" 
                    data-output="${escapeHtml(stakeholderOutput)}" 
                    data-outcome="${escapeHtml(stakeholderOutcome)}" 
                    data-dana="${escapeHtml(stakeholderDana)}" 
                    data-durasi="${escapeHtml(stakeholderDurasi)} ${escapeHtml(stakeholderSatuanWaktu)}" 
                    data-barang="${escapeHtml(stakeholderBarang)}">
                    Lihat Data
                  </button>
                  <button type="button" class="btn btn-warning btn-sm edit-data" 
                      data-name="${escapeHtml(stakeholderName)}" 
                      data-role="${escapeHtml(stakeholderRole)}" 
                      data-output="${escapeHtml(stakeholderOutput)}" 
                      data-outcome="${escapeHtml(stakeholderOutcome)}" 
                      data-dana="${escapeHtml(stakeholderDana)}" 
                      data-durasi="${escapeHtml(stakeholderDurasi)} ${escapeHtml(stakeholderSatuanWaktu)}" 
                      data-barang="${escapeHtml(stakeholderBarang)}">
                      Edit
                  </button>
              </td>
          </tr>`;

          document.querySelector('#pc-dt-simple tbody').insertAdjacentHTML('beforeend', newRow);
          $('#stakeholder-modal').modal('hide');

          // Reset modal input
          document.getElementById('stakeholder-modal').querySelectorAll('input, textarea, select').forEach(function(input) {
              input.value = '';
          });

          // Tambah event listener untuk tombol hapus
          document.querySelectorAll('.delete-row').forEach(btn => {
              btn.addEventListener('click', function () {
                  this.closest('tr').remove();
              });
          });
      });

      // Fungsi untuk menghindari XSS dengan escaping HTML
      function escapeHtml(text) {
          const map = {
              '&': '&amp;',
              '<': '&lt;',
              '>': '&gt;',
              '"': '&quot;',
              "'": '&#039;'
          };
          return text.replace(/[&<>"']/g, function(m) { return map[m]; });
      }

      // Fungsi untuk format angka
      function numberFormat(number) {
          return parseFloat(number).toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
      }
  });
</script>


<script>
  @if (session('success'))
      Swal.fire({
          title: 'Success!',
          text: "{{ session('success') }}",
          icon: 'success',
          confirmButtonText: 'OK'
      });
  @endif
</script>

<script>
    document.addEventListener('click', function(event) {
      if (event.target.classList.contains('view-data')) {
          // Ambil data dari atribut tombol
          const name = event.target.getAttribute('data-name');
          const role = event.target.getAttribute('data-role');
          const output = event.target.getAttribute('data-output');
          const outcome = event.target.getAttribute('data-outcome');
          const dana = event.target.getAttribute('data-dana');
          const durasi = event.target.getAttribute('data-durasi');
          const barang = event.target.getAttribute('data-barang');

          // Masukkan data ke dalam modal
          document.getElementById('stakeholder-name-view').value = name;
          document.getElementById('stakeholder-role-view').value = role;
          document.getElementById('stakeholder-output-view').value = output;
          document.getElementById('stakeholder-outcome-view').value = outcome;
          document.getElementById('stakeholder-dana-view').value = dana;
          document.getElementById('stakeholder-durasi-view').value = durasi;
          document.getElementById('stakeholder-barang-view').value = barang;

          // Tampilkan modal menggunakan Bootstrap 5
          const modal = new bootstrap.Modal(document.getElementById('stakeholder-view-modal'));
          modal.show();
      }
  });
</script>
<script>
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('edit-data')) {

          editedRow = event.target.closest('tr');
              // Ambil data dari atribut tombol
              const name = event.target.getAttribute('data-name');
              const role = event.target.getAttribute('data-role');
              const output = event.target.getAttribute('data-output');
              const outcome = event.target.getAttribute('data-outcome');
              const dana = event.target.getAttribute('data-dana');
              const durasi = event.target.getAttribute('data-durasi');
              const barang = event.target.getAttribute('data-barang');

              // Masukkan data ke dalam input fields dan aktifkan pengeditan
              document.getElementById('stakeholder-name-edit').value = name;
              document.getElementById('stakeholder-role-edit').value = role;
              document.getElementById('stakeholder-output-edit').value = output;
              document.getElementById('stakeholder-outcome-edit').value = outcome;
              document.getElementById('stakeholder-dana-edit').value = dana;
              document.getElementById('stakeholder-durasi-edit').value = durasi;
              document.getElementById('stakeholder-barang-edit').value = barang;

             
              // Tampilkan modal menggunakan Bootstrap 5
              const modal = new bootstrap.Modal(document.getElementById('stakeholder-edit-modal'));
              modal.show();
          }
      });
</script>
<script>
    document.getElementById('save-changes-btn').addEventListener('click', function() {
      if (editedRow) {
        // Ambil nilai yang sudah diedit dari input fields di modal
        const newName = document.getElementById('stakeholder-name-edit').value;
        const newRole = document.getElementById('stakeholder-role-edit').value;
        const newOutput = document.getElementById('stakeholder-output-edit').value;
        const newOutcome = document.getElementById('stakeholder-outcome-edit').value;
        const newDana = document.getElementById('stakeholder-dana-edit').value;
        const newDurasi = document.getElementById('stakeholder-durasi-edit').value;
        const newBarang = document.getElementById('stakeholder-barang-edit').value;

        // Perbarui tampilan di tabel dengan nilai baru
        editedRow.querySelector('.stakeholder-name').innerText = newName;
        editedRow.querySelector('.stakeholder-role').innerText = newRole;

        document.getElementById('stakeholder-name').value = newName;
        document.getElementById('stakeholder-role').value = newRole;
        document.getElementById('stakeholder-output').value = newOutput;
        document.getElementById('stakeholder-outcome').value = newOutcome;
        document.getElementById('stakeholder-dana').value = newDana;
        document.getElementById('stakeholder-durasi').value = newDurasi;
        document.getElementById('stakeholder-barang').value = newBarang;

        // Perbarui data atribut pada tombol "Lihat Data" dan "Edit"
        editedRow.querySelector('.view-data').setAttribute('data-name', newName);
        editedRow.querySelector('.view-data').setAttribute('data-role', newRole);
        editedRow.querySelector('.view-data').setAttribute('data-output', newOutput);
        editedRow.querySelector('.view-data').setAttribute('data-outcome', newOutcome);
        editedRow.querySelector('.view-data').setAttribute('data-dana', newDana);
        editedRow.querySelector('.view-data').setAttribute('data-durasi', newDurasi);
        editedRow.querySelector('.view-data').setAttribute('data-barang', newBarang);

        editedRow.querySelector('.edit-data').setAttribute('data-name', newName);
        editedRow.querySelector('.edit-data').setAttribute('data-role', newRole);
        editedRow.querySelector('.edit-data').setAttribute('data-output', newOutput);
        editedRow.querySelector('.edit-data').setAttribute('data-outcome', newOutcome);
        editedRow.querySelector('.edit-data').setAttribute('data-dana', newDana);
        editedRow.querySelector('.edit-data').setAttribute('data-durasi', newDurasi);
        editedRow.querySelector('.edit-data').setAttribute('data-barang', newBarang);

        // Tutup modal setelah penyimpanan selesai
        const modal = bootstrap.Modal.getInstance(document.getElementById('stakeholder-edit-modal'));
        modal.hide();

        // Reset variabel editedRow
        editedRow = null;
    }
});
</script>

@endsection
