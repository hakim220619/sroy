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
                              <td>{{ $index+=1}}</td>
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
                      <form method="POST" action="{{ route('add-overclaim', $id_program) }}">
                        @csrf
                        <div class="row">
                          <div class="form-group">
                            <label class="form-label" for="deadweight">Deadweight</label>
                            <select id="deadweight" class="form-select" name="deadweight">
                                <option value="" disabled selected>Pilih</option>
                                @foreach ($deadweight as $dw)
                                  <option value="{{ $dw->id }}">{{ $dw->label_option }}</option>                                  
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="displacement">Displacement</label>
                            <select id="displacement" class="form-select" name="displacement">
                                <option value="" disabled selected>Pilih</option>
                                @foreach ($displacement as $dp)
                                  <option value="{{ $dp->id }}">{{ $dp->label_option }}</option>                                  
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="atribution">Attribution</label>
                            <select id="atribution" class="form-select" name="atribution">
                                <option value="" disabled selected>Pilih</option>
                                @foreach ($attribution as $att)
                                  <option value="{{ $att->id }}">{{ $att->label_option }}</option>                                  
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="dropoff">Drop Off</label>
                            <select id="dropoff" class="form-select" name="dropoff">
                                <option value="" disabled selected>Pilih</option>
                                  @foreach ($drop_Off as $do)
                                    <option value="{{ $do->id }}">{{ $do->label_option }}</option>                                  
                                  @endforeach
                              </select>
                          </div>
                        </div>
                        @if(!$isOverclaimNotEmpty)
                        <button class="btn btn-primary">Simpan</button>
                        @endif
                      </form>
                  </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Deadweight</th>
                            <th>Displacement</th>
                            <th>Attribution</th>
                            <th>Drop Off</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($overclaim as $ov)
                              <td>{{ $ov->percentase }}</td>
                            @endforeach
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
@endsection
