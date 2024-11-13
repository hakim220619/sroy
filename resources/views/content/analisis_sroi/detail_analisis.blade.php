<!-- resources/views/home.blade.php -->

@extends('backend.layouts.app')

@section('title', 'Analisis SROI')
@section('page-header-icon', 'ph-duotone ph-house')
@section('page-header-one', 'Home')
@section('page-header', 'Analisis SROI')

@section('content')
    <!-- Konten Utama Halaman -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Analsisi SROI {{ $data_csr->nama_program }}</h5>
                            <div>
                                <button type="submit" class="btn btn-info">Mulai Analisis</button>
                            </div>
                        </div>
                        <small>Total Anggaran : {{ $data_csr->anggaran }}</small>
                  </div>
                  <div class="card-body">
                    <div>
                        <h5>Analisis Outcome</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Outcome</th>
                              <th>Stakeholder</th>
                              <th>Keterlibatan SROI</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data_stakeholder as $index => $ds )
                            <tr>
                              <td>{{ $index}}</td>
                              <td>{{ $ds->outcome }}</td>
                              <td>{{ $ds->nama_stakeholder }}</td>
                              <td>
                                    <select name="keterlibatan_sroi" class="form-select" id="keterlibatan_sroi">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                    </select>
                              </td>
                              <td>
                                <button class="btn btn-info btn-sm">Tambah Data</button>
                              </td>
                            </tr>                                
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <h5>Filter Adjusted Value</h5>
                      <form>
                        <div class="row">
                          <div class="form-group">
                            <label class="form-label" for="deadweight">Deadweight</label>
                            <select id="deadweight" class="form-select" name="deadweight">
                                <option value="" disabled selected>Pilih</option>
                                <option>Dampak tidak akan terjadi tanpa adanya program</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="displacement">Displacement</label>
                            <select id="displacement" class="form-select" name="displacement">
                                <option value="" disabled selected>Pilih</option>
                                <option>Dampak karna ada kontribusi kecil dari pihak lain</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="atribution">Attribution</label>
                            <select id="atribution" class="form-select" name="atribution">
                                <option value="" disabled selected>Pilih</option>
                                <option>Dampak yang tidak menggantikan dampak lain yang sudah baik</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="dropoff">Drop Off</label>
                            <select id="dropoff" class="form-select" name="dropoff">
                                <option value="" disabled selected>Pilih</option>
                                <option>Dampak akan tetap dirasakan selama waktu yang ditentukan</option>
                              </select>
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
