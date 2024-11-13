<!-- resources/views/home.blade.php -->

@extends('backend.layouts.app')

@section('title', 'Data CSR')
@section('page-header-icon', 'ph-duotone ph-house')
@section('page-header-one', 'Home')
@section('page-header', 'Data CSR')

@section('content')
    <!-- Konten Utama Halaman -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Detail Data Program CSR</h5>
                    <a href="#" type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalLive{{$detail_data_csr->id}}">Edit Program</a>
                    <div id="exampleModalLive{{$detail_data_csr->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel">Edit Data CSR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="my-3">
                                  <h4>Informasi Program</h4>
                              </div>                        
                            <form action="{{ route('update-data-csr',$detail_data_csr->id) }}" method="POST">
                              @csrf
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-label">Nama Program:</label>
                                      <input type="text" name="nama_program" id="nama_program" class="form-control" value="{{ $detail_data_csr->nama_program }}" placeholder="Nama Program" required>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-label">Entitas:</label>
                                      <input type="text" class="form-control" name="entitas" id="entitas" value="{{ $detail_data_csr->entitas }}" placeholder="Entitas" required>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-label">Region:</label>
                                      <select name="region" id="region" class="form-control" required>
                                        <option value="">Pilih Region</option>
                                        <option value="Region 1 - Supporting Co - PTPN 2" <?= ($detail_data_csr->region == 'Region 1 - Supporting Co - PTPN 2') ? 'selected' : '' ?>>Region 1 - Supporting Co - PTPN 2</option>
                                        <option value="Region 6 - Supporting Co (PTPN1)" <?= ($detail_data_csr->region == 'Region 6 - Supporting Co (PTPN1)') ? 'selected' : '' ?>>Region 6 - Supporting Co (PTPN1)</option>
                                        <option value="Region 1 - Palm Co (PTPN 3)" <?= ($detail_data_csr->region == 'Region 1 - Palm Co (PTPN 3)') ? 'selected' : '' ?>>Region 1 - Palm Co (PTPN 3)</option>
                                        <option value="Region 2 - Palm Co (PTPN 4)" <?= ($detail_data_csr->region == 'Region 2 - Palm Co (PTPN 4)') ? 'selected' : '' ?>>Region 2 - Palm Co (PTPN 4)</option>
                                        <option value="Region 3 - Palm Co (PTPN 5)" <?= ($detail_data_csr->region == 'Region 3 - Palm Co (PTPN 5)') ? 'selected' : '' ?>>Region 3 - Palm Co (PTPN 5)</option>
                                        <option value="Region 4 - Palm Co (PTPN 6)" <?= ($detail_data_csr->region == 'Region 4 - Palm Co (PTPN 6)') ? 'selected' : '' ?>>Region 4 - Palm Co (PTPN 6)</option>
                                        <option value="Region 7 - Supporting Co (PTPN 7)" <?= ($detail_data_csr->region == 'Region 7 - Supporting Co (PTPN 7)') ? 'selected' : '' ?>>Region 7 - Supporting Co (PTPN 7)</option>
                                        <option value="Region 2 - Supporting Co (PTPN 8)" <?= ($detail_data_csr->region == 'Region 2 - Supporting Co (PTPN 8)') ? 'selected' : '' ?>>Region 2 - Supporting Co (PTPN 8)</option>
                                        <option value="Region 3 - Supporting Co (PTPN 9)" <?= ($detail_data_csr->region == 'Region 3 - Supporting Co (PTPN 9)') ? 'selected' : '' ?>>Region 3 - Supporting Co (PTPN 9)</option>
                                        <option value="Region 4 - Supporting Co (PTPN 10)" <?= ($detail_data_csr->region == 'Region 4 - Supporting Co (PTPN 10)') ? 'selected' : '' ?>>Region 4 - Supporting Co (PTPN 10)</option>
                                        <option value="Region 4 - Supporting Co (PTPN 11)" <?= ($detail_data_csr->region == 'Region 4 - Supporting Co (PTPN 11)') ? 'selected' : '' ?>>Region 4 - Supporting Co (PTPN 11)</option>
                                        <option value="Region 5 - Supporting Co (PTPN 12)" <?= ($detail_data_csr->region == 'Region 5 - Supporting Co (PTPN 12)') ? 'selected' : '' ?>>Region 5 - Supporting Co (PTPN 12)</option>
                                        <option value="Region 5 - Palm Co (PTPN 13)" <?= ($detail_data_csr->region == 'Region 5 - Palm Co (PTPN 13)') ? 'selected' : '' ?>>Region 5 - Palm Co (PTPN 13)</option>
                                        <option value="Region 8 - Supporting Co (PTPN 14)" <?= ($detail_data_csr->region == 'Region 8 - Supporting Co (PTPN 14)') ? 'selected' : '' ?>>Region 8 - Supporting Co (PTPN 14)</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-label">Anggaran:</label>
                                      <input type="number" class="form-control" name="anggaran" id="anggaran" value="{{ $detail_data_csr->anggaran }}" placeholder="anggaran" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-label">Deskripsi Program:</label>
                                <div class="input-group search-form">
                                  <textarea name="deskripsi_program" class="form-control" id="deskripsi_program" cols="30" rows="10" placeholder="Deskripsi CSR" required>{{ $detail_data_csr->deskripsi_program }}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-label">Tujuan Program:</label>
                                <div class="input-group search-form">
                                  <textarea name="tujuan_program" class="form-control" id="tujuan_program" cols="30" rows="10" placeholder="Tujuan CSR" required>{{ $detail_data_csr->tujuan_program }}</textarea>
                                </div>
                              </div>
                            </div>                      
                          </div>
                          <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-label">Priode Program:</label>
                                      <div class="input-group search-form">
                                      
                                            <input type="date" name="priode_program_dari" id="priode_program_dari" value="{{ date('Y-m-d', strtotime($detail_data_csr->priode_program_dari)) }}" class="form-control" placeholder="Pilih Tanggal" required>   
                                        
                                        <span class="mx-3 my-3">s/d</span>
                                    
                                            <input type="date" name="priode_program_sampai" id="priode_program_sampai" class="form-control" value="{{ date('Y-m-d', strtotime($detail_data_csr->priode_program_sampai)) }}" placeholder="Pitih Tanggal" required>   
                                        
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="form-label">Jangka Waktu Manfaat:</label>
                                      <div class="input-group search-form">
                                    
                                            <input type="date" name="jangka_waktu_manfaat_dari" id="jangka_waktu_manfaat_dari" class="form-control" value="{{ date('Y-m-d', strtotime($detail_data_csr->jangka_waktu_manfaat_dari)) }}" placeholder="Pilih Tanggal" required>   
                                      
                                        <span class="mx-3 my-3">s/d</span>
                                      
                                            <input type="date" name="jangka_waktu_manfaat_sampai" id="jangka_waktu_manfaat_sampai" class="form-control" value="{{ date('Y-m-d', strtotime($detail_data_csr->jangka_waktu_manfaat_sampai)) }}" placeholder="Pitih Tanggal" required>   
                                        
                                      </div>
                                    </div>
                                </div>                      
                              </div>                    
                              <hr>
                              <div class="row">
                                  <div class="my-3">
                                      <h4>Lokasi Pelaksanaan Program</h4>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <label class="form-label">Alamat Pelaksanaan Program:</label>
                                          <input type="text" class="form-control" name="alamat_pelaksanaan" id="alamat_pelaksanaan" value="{{ $detail_data_csr->alamat_pelaksanaan }}" placeholder="Alamat Program" required>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <label class="form-label">Provinsi:</label>
                                          <select name="provinsi" id="provinsi" class="form-control" required>
                                              <option value="">Pilih provinsi</option>
                                              @foreach ($provinces as $p)
                                              <option {{ ($p['name'] == $detail_data_csr->provinsi) ? 'selected' : '' }} value="{{ $p['name'] }}" data-id="{{ $p['id'] }}">{{ $p['name'] }}</option>
                                                  
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <label class="form-label">Kabupaten/Kota:</label>
                                          <select name="kabupaten" id="kabupaten" class="form-control" required>
                                              <option value="">Pilih kabupaten/kota</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <label class="form-label">Kecamatan:</label>
                                          <select name="kecamatan" id="kecamatan" class="form-control" required>
                                              <option value="">Pilih kecamatan</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                        <div>
                          <h5><b>INFORMASI PROGRAM</b></h5>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                              <th style="width:16%">Nama Program</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->nama_program }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Entitas</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->entitas }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Region</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->region }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Anggaran</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->anggaran }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Deskripsi Program</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->deskripsi_program }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Tujuan Program</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->tujuan_program }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Priode Program</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->priode_program_dari." s/d ".$detail_data_csr->priode_program_sampai }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Jangka Waktu Manfaat</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->jangka_waktu_manfaat_dari." s/d ".$detail_data_csr->jangka_waktu_manfaat_sampai }}</td>
                            </tr>                            
                        </table>
                    </div>
                    <div class="row my-3">
                        <div>
                          <h5><b>LOKASI PELAKSANAAN PROGRAM</b></h5>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                              <th style="width:16%">Alamat Pelaksanaan Program</th>
                              <td style="width:0%">:</td>
                              <td>{{ $detail_data_csr->alamat_pelaksanaan }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Provinsi</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->provinsi }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Kabupaten/Kota</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->kabupaten }}</td>
                            </tr>                            
                            <tr>
                              <th style="width:16%">Kecamatan</th>
                              <td style="width:0%">:</td>
                              <td >{{ $detail_data_csr->kecamatan }}</td>
                            </tr>                           
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div>
                            <h5>STAKEHOLDER</h5>
                        </div>
                        <div class="col-lg-12">
                          <button type="button" class="btn btn-info btn-sm my-3" data-bs-toggle="modal" data-bs-target="#exampleModalLive1">Tambah</button>
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                  <thead>
                                    <tr>
                                      <th>No</th>
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
                                    @foreach ($detail_data_stakeholder as $index => $dds)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $dds->nama_stakeholder }}</td>
                                        <td>{{ $dds->peran }}</td>
                                        <td>{{ $dds->output }}</td>
                                        <td>{{ $dds->outcome }}</td>
                                        <td>{{ $dds->dana }}</td>
                                        <td>{{ $dds->durasi }}</td>
                                        <td>{{ $dds->barang }}</td>
                                        <td>
                                          {{-- Tambah data setake holder --}}
                                          <div id="exampleModalLive1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Stakeholder</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <div>                                                  
                                                    <form action="{{route('add-stakeholder', $detail_data_csr->id)}}" method="POST">
                                                      @csrf
                                                      <div class="form-group">
                                                        <label class="form-label" for="nama_stakeholder">Nama Stakeholder</label>
                                                        <input type="text" class="form-control" id="nama_stakeholder" name="nama_stakeholder" required>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="form-label" for="peran">Peran</label>
                                                        <input type="text" class="form-control" id="peran" name="peran" required>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="output">Output</label>
                                                        <textarea class="form-control" id="output" name="output" rows="3" required></textarea>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="outcome">Outcome</label>
                                                        <textarea class="form-control" id="outcome" name="outcome" rows="3" required></textarea>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="dana">Dana</label>
                                                        <input type="number" class="form-control" id="dana" name="dana" required>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="durasi">Durasi</label>
                                                        <input type="number" class="form-control" id="durasi" name="durasi" required>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <select name="satuan" id="satuan" class="form-select" required>
                                                            <option value="">Pilih</option>
                                                            <option value="Tahun">Tahun</option>
                                                            <option value="Bulan">Bulan</option>
                                                            <option value="Minggu">Minggu</option>
                                                            <option value="Hari">Hari</option>
                                                        </select>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="barang">Barang</label>
                                                        <input type="text" class="form-control" id="barang" name="barang" required>
                                                      </div>                                                     
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>

                                          <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalLive2{{$dds->id}}" class="btn btn-primary btn-sm">Edit</a>
                                          <div id="exampleModalLive2{{$dds->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLiveLabel">Edit Stakeholder</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <div>                                                  
                                                    <form action="{{route('edit-stakeholder', $dds->id)}}" method="POST">
                                                      @csrf
                                                      <div class="form-group">
                                                        <label class="form-label" for="nama_stakeholder">Nama Stakeholder</label>
                                                        <input type="text" class="form-control" id="nama_stakeholder" name="nama_stakeholder" value="{{$dds->nama_stakeholder}}" required>
                                                      </div>
                                                      <div class="form-group">
                                                        <label class="form-label" for="peran">Peran</label>
                                                        <input type="text" class="form-control" id="peran" name="peran" value="{{$dds->peran}}" required>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="output">Output</label>
                                                        <textarea class="form-control" id="output" name="output" rows="3" required>{{$dds->output}}</textarea>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="outcome">Outcome</label>
                                                        <textarea class="form-control" id="outcome" name="outcome" rows="3" required>{{$dds->outcome}}</textarea>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="dana">Dana</label>
                                                        <input type="number" class="form-control" id="dana" name="dana" value="{{$dds->dana}}" required>
                                                      </div>                   
                                                      <?php
                                                          if (preg_match('/(\d+)\s*(\w+)/', $dds->durasi, $matches)) {
                                                                $angka = (int) $matches[1]; // Mengambil angka, dalam hal ini 3
                                                                $satuan = $matches[2]; // Mengambil satuan, dalam hal ini 'Tahun'
                                                            }
                                                      ?>                                  
                                                      <div class="form-group">
                                                        <label class="form-label" for="durasi">Durasi</label>
                                                        <input type="number" class="form-control" id="durasi" name="durasi" value="{{$angka}}" required>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <select name="satuan" id="satuan" class="form-select" required>
                                                            <option value="">Pilih</option>
                                                            <option {{ ($satuan== 'Tahun') ? 'selected' : '' }} value="Tahun">Tahun</option>
                                                            <option {{ ($satuan== 'Bulan') ? 'selected' : '' }} value="Bulan">Bulan</option>
                                                            <option {{ ($satuan== 'Minggu') ? 'selected' : '' }} value="Minggu">Minggu</option>
                                                            <option {{ ($satuan== 'Hari') ? 'selected' : '' }} value="Hari">Hari</option>
                                                        </select>
                                                      </div>                                                     
                                                      <div class="form-group">
                                                        <label class="form-label" for="barang">Barang</label>
                                                        <input type="text" class="form-control" id="barang" name="barang" value="{{$dds->barang}}" required>
                                                      </div>                                                     
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>

                                          <a type="button" data-id="{{ $dds->id }}" class="btn btn-danger btn-delete btn-sm text-white">Hapus</a>
                                        </td>
                                    </tr>                                        
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>                                
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
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
                              var selected = (value.name === '<?= $detail_data_csr->kabupaten ?>') ? 'selected' : '';
                              $('#kabupaten').append('<option value="'+ value.name +'" data-id="'+value.id+'" ' + selected + '>'+ value.name +'</option>');
                          });
                          $('#kabupaten').trigger('change');
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
                              var selected = (value.name === '<?= $detail_data_csr->kecamatan ?>') ? 'selected' : '';
                              $('#kecamatan').append('<option value="'+ value.name +'" data-id="'+value.id+'" ' + selected + '>'+ value.name +'</option>');
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
          $('#provinsi').trigger('change');
      });
  </script>
<script>
        // [ DOM/jquery ]
        var total, pageTotal;
        var table = $('#dom-jqry').DataTable();
        // [ column Rendering ]
        $('#colum-render').DataTable({
          columnDefs: [
            {
              render: function (data, type, row) {
                return data + ' (' + row[3] + ')';
              },
              targets: 0
            },
            {
              visible: false,
              targets: [3]
            }
          ]
        });
        // [ Multiple Table Control Elements ]
        $('#multi-table').DataTable({
          // "scrollX": true,
          dom: '<"top"iflp<"clear">>r<"table-responsive"t><"bottom"iflp<"clear">>'
        });
        // [ Complex Headers With Column Visibility ]
        $('#complex-header').DataTable({
          columnDefs: [
            {
              visible: false,
              targets: -1
            }
          ]
        });
        // [ Language file ]
        $('#lang-file').DataTable({
          language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json'
          }
        });
        // [ Setting Defaults ]
        $('#setting-default').DataTable();
        // [ Row Grouping ]
        var table1 = $('#row-grouping').DataTable({
          columnDefs: [
            {
              visible: false,
              targets: 2
            }
          ],
          order: [[2, 'asc']],
          displayLength: 25,
          drawCallback: function (settings) {
            var api = this.api();
            var rows = api
              .rows({
                page: 'current'
              })
              .nodes();
            var last = null;
  
            api
              .column(2, {
                page: 'current'
              })
              .data()
              .each(function (group, i) {
                if (last !== group) {
                  $(rows)
                    .eq(i)
                    .before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
  
                  last = group;
                }
              });
          }
        });
        // [ Order by the grouping ]
        $('#row-grouping tbody').on('click', 'tr.group', function () {
          var currentOrder = table.order()[0];
          if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
          } else {
            table.order([2, 'asc']).draw();
          }
        });
        // [ Footer callback ]
        $('#footer-callback').DataTable({
          footerCallback: function (row, data, start, end, display) {
            var api = this.api(),
              data;
  
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
              return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
  
            // Total over all pages
            total = api
              .column(4)
              .data()
              .reduce(function (a, b) {
                return intVal(a) + intVal(b);
              }, 0);
  
            // Total over this page
            pageTotal = api
              .column(4, {
                page: 'current'
              })
              .data()
              .reduce(function (a, b) {
                return intVal(a) + intVal(b);
              }, 0);
  
            // Update footer
            $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
          }
        });
        // [ Custom Toolbar Elements ]
        $('#c-tool-ele').DataTable({
          dom: '<"toolbar">frtip'
        });
        // [ Custom Toolbar Elements ]
        $('div.toolbar').html('<b>Custom tool bar! Text/images etc.</b>');
        // [ custom callback ]
        $('#row-callback').DataTable({
          createdRow: function (row, data, index) {
            if (data[5].replace(/[\$,]/g, '') * 1 > 150000) {
              $('td', row).eq(5).addClass('highlight');
            }
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
    document.querySelectorAll('.btn-delete').forEach(
      button => {
        button.addEventListener('click',function(){
          const stakeholderId = this.getAttribute('data-id');
          Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Anda tidak dapat mengembalikan data !`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengirimkan permintaan penghapusan menggunakan AJAX
                    fetch(`/delete-stakeholder/${stakeholderId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Data berhasil dihapus') {
                            Swal.fire(
                                'Terhapus!',
                                `Data  telah dihapus.`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                `Data gagal dihapus.`,
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan, coba lagi nanti.',
                            'error'
                        );
                    });
                }
              });
 
        })
      }
    )
</script>
@endsection
