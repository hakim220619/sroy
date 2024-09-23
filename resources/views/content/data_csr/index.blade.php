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
                <div class="card-header">
                    <h5>Data Program CSR</h5>
                  </div>
                  <div class="card-body">
                    <div class="dt-responsive">
                      <table id="dom-jqry" class="table table-bordered nowrap">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Entitas</th>
                            <th>Tahun</th>
                            <th>Anggaran(Rp)</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($data_csr as $index => $dc )                            
                          <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $dc->nama_program }}</td>
                            <td>{{ $dc->entitas }}</td>
                            <td>{{ $dc->tahun }}</td>
                            <td>{{ $dc->anggaran }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm">Lihat Data</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
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
@endsection
