@extends('backend.layouts.app')

@section('title', 'Menu Management')
@section('page-header-icon', 'ph-duotone ph-house')
@section('page-header-one', 'Menu')
@section('page-header', 'Menu Management')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <!-- Sticky Buttons -->
            <div class="sticky-buttons" style="position: sticky; top: 0; background-color: white; z-index: 1; padding-top: 10px;">
                <!-- Add Button -->
                <button type="button" id="addModalBtn" class="btn btn-info m-b-20">
                    <i class="fa-solid fa-plus"></i> Tambah
                </button>
                <button type="button" id="addModalBtnOptions" class="btn btn-warning m-b-20">
                    <i class="fa-solid fa-plus"></i> Tambah Options
                </button>

                <!-- Update Button -->
                <button type="button" id="updateModalBtn" class="btn btn-primary m-b-20" disabled>
                    <i class="fa-solid fa-pen"></i> Update
                </button>

                <!-- Delete Button -->
                <button type="button" id="deleteModalBtn" class="btn btn-danger m-b-20" disabled>
                    <i class="fa-solid fa-trash"></i>
                    <span id="deleteBtnText">Delete</span>
                    <div id="deleteLoadingSpinner" class="spinner-border spinner-border-sm" role="status" style="display:none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>

            <div class="dt-responsive table-responsive">
                <table id="row-selected" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Header</th>
                            <th>Options</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addMenuForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Header</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="label_header">Nama Header</label>
                        <input type="text" class="form-control" id="label_header" name="label_header" placeholder="Masukkan Nama Menu" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status Aktif</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="ON">Aktif</option>
                            <option value="OFF">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addSubmitBtn">
                        <span id="addBtnText">Tambah</span>
                        <div id="addLoadingSpinner" class="spinner-border spinner-border-sm" role="status" style="display:none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="updateOptionsForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Master Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_hdr" name="id_hdr">

                    <div class="form-group mb-3">
                        <label for="update_label_header">Nama Header</label>
                        <input type="text" class="form-control" id="update_label_header" name="update_label_header" placeholder="Masukkan Labelh Header" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="update_status">Status Aktif</label>
                        <select class="form-control" id="update_status" name="update_status" required>
                            <option value="ON">Aktif</option>
                            <option value="OFF">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updateSubmitBtn">
                        <span id="updateBtnText">Update</span>
                        <div id="updateLoadingSpinner" class="spinner-border spinner-border-sm" role="status" style="display:none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah Options -->
<div class="modal fade" id="addModalOptions" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addLabelOptions">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="uid" name="uid" placeholder="Masukkan Nama Menu" value="">
                    <div class="form-group mb-3">
                        <label for="label_options_opt">Nama Options</label>
                        <input type="text" class="form-control" id="label_options-opt" name="label_options_opt" placeholder="Masukkan Nama Options" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status_opt">Status Aktif</label>
                        <select class="form-control" id="status_opt" name="status_opt" required>
                            <option value="ON">Aktif</option>
                            <option value="OFF">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addSubmitBtn">
                        <span id="addBtnTextOpt">Tambah</span>
                        <div id="addLoadingSpinnerOpt" class="spinner-border spinner-border-sm" role="status" style="display:none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize DataTables
        var drow = $('#row-selected').DataTable({
            processing: false,
            serverSide: false,
            ordering: false,
            paging: false,
            ajax: `{{ route("options.getAllOptions") }}`, // Route to fetch data
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'label_header',
                    name: 'label_header',
                    render: function(data, type, row) {
                        return row.type === 'Header' ? data : ''; // Tampilkan label_header hanya jika type = 'Header'
                    }
                },
                {
                    data: 'label_option',
                    name: 'label_option'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: null,
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        // Jika tipe adalah 'Options', tampilkan tombol edit dan delete
                        if (row.type === 'Options') {
                            return `
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal${row.id}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" id="confirmDeleteBtnOption" data-id="${row.id}">
                                <i class="fa fa-trash"></i>
                            </button>

                            
                            <div class="modal fade" id="editModal${row.id}" tabindex="-1" aria-labelledby="editModalLabel${row.id}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel${row.id}">Edit Options</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateLabelOptions">
                                            <input type="hidden" class="form-control" id="id_opt" name="id_opt" value="${row.id || ''}">
                                        <!-- Field for Label Options -->
                                        <div class="mb-3">
                                            <label for="labelOptions${row.id}" class="form-label">Label Options</label>
                                            <input type="text" class="form-control" id="labelOptions${row.id}" name="update_label_option" value="${row.label_option || ''}">
                                        </div>

                                        <!-- Field for Status with ON/OFF options -->
                                        <div class="mb-3">
                                            <label for="status${row.id}" class="form-label">Status</label>
                                            <select class="form-select" id="status${row.id}" name="update_status">
                                                <option value="ON" ${row.status === 'ON' ? 'selected' : ''}>ON</option>
                                                <option value="OFF" ${row.status === 'OFF' ? 'selected' : ''}>OFF</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                           <button type="submit" class="btn btn-primary" id="updateSubmitBtnOpt">
                                                <span id="addBtnTextOption">Simpan</span>
                                                <div id="updateLoadingSpinnerOption" class="spinner-border spinner-border-sm" role="status" style="display:none;">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        `;
                        }

                        // Kembalikan nilai kosong jika type bukan 'Options' atau 'Header'
                        return '';
                    }

                }
            ],
        });

        $('#row-selected tbody').on('click', 'tr', function() {
            var data = drow.row(this).data();
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                $('#updateModalBtn').prop('disabled', true);
                $('#deleteModalBtn').prop('disabled', true);
            } else {
                drow.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#updateModalBtn').prop('disabled', false);
                $('#deleteModalBtn').prop('disabled', false);
            }
        });

        // Add Menu Modal
        $('#addModalBtn').on('click', function() {
            $('#addModal').modal('show');
        });


        // Add Menu Submission
        $('#addMenuForm').on('submit', function(e) {
            e.preventDefault();
            $('#addBtnText').hide();
            $('#addLoadingSpinner').show();
            $('#addSubmitBtn').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('options.storeHeader') }}",
                data: $(this).serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#addMenuForm')[0].reset();
                    $('#addBtnText').show();
                    $('#addLoadingSpinner').hide();
                    $('#addSubmitBtn').prop('disabled', false);
                    drow.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Menu successfully added!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function(error) {
                    console.log(error);
                    $('#addBtnText').show();
                    $('#addLoadingSpinner').hide();
                    $('#addSubmitBtn').prop('disabled', false);
                    $('#addMenuForm')[0].reset();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to add menu!',
                    });
                }
            });
        });
        // Add Menu Submission
        $('#addLabelOptions').on('submit', function(e) {
            e.preventDefault();

            // Menyembunyikan teks tombol dan menampilkan spinner
            $('#addBtnTextOpt').hide();
            $('#addLoadingSpinnerOpt').show();
            $('#addSubmitBtn').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('options.storeOptions') }}",
                data: $(this).serialize(),
                success: function(response) {
                    // Menutup modal dengan ID yang benar dan mereset form
                    $('#addModalOptions').modal('hide');
                    $('#addLabelOptions')[0].reset();

                    // Menampilkan kembali teks tombol dan menyembunyikan spinner
                    $('#addBtnTextOpt').show();
                    $('#addLoadingSpinnerOpt').hide();
                    $('#addSubmitBtn').prop('disabled', false);

                    // Refresh data di tabel atau komponen yang memuat data
                    drow.ajax.reload();

                    // Menampilkan pesan sukses menggunakan SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Menu successfully added!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error); // Menampilkan pesan error di konsol

                    // Menampilkan kembali teks tombol dan menyembunyikan spinner
                    $('#addBtnTextOpt').show();
                    $('#addLoadingSpinnerOpt').hide();
                    $('#addSubmitBtn').prop('disabled', false);

                    // Menampilkan pesan error dengan SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Failed to add menu!',
                    });
                }
            });
        });


        // Deklarasi variabel untuk menyimpan data baris terpilih
        var selectedData = null;

        // Update Menu Modal - Event pada baris yang diklik
        $('#row-selected tbody').on('click', 'tr', function() {
            selectedData = drow.row(this).data(); // Simpan data baris yang dipilih
            if (selectedData && selectedData.type === 'Header') { // Cek jika tipe adalah "Header"
                // Isi data ke dalam form modal
                $('#update_id').val(selectedData.id);
                $('#update_label_header').val(selectedData.label_header);
                $('#update_status').val(selectedData.status);

                // Aktifkan tombol update
                $('#updateModalBtn').prop('disabled', false);
                $('#addModalBtnOptions').prop('disabled', false);
                $('#deleteModalBtn').prop('disabled', false);
                $('#addModalBtn').prop('disabled', false);
            } else {
                // Jika tipe bukan "Header", nonaktifkan tombol update
                $('#updateModalBtn').prop('disabled', true);
                $('#addModalBtnOptions').prop('disabled', true);
                $('#deleteModalBtn').prop('disabled', true);
                $('#addModalBtn').prop('disabled', true);
            }
        });

        // Event klik pada tombol Update Modal
        $('#updateModalBtn').on('click', function() {
            if (selectedData && selectedData.type === 'Header') { // Cek jika tipe adalah "Header"
                $('#updateModal').modal('show'); // Tampilkan modal
            }
        });

        $('#addModalBtnOptions').on('click', function() {
            if (selectedData && selectedData.type === 'Header') {
                $('#uid').val(selectedData.uid);
                $('#addModalOptions').modal('show');
            }
        });

        // Update Menu Submission
        $('#updateOptionsForm').on('submit', function(e) {
            e.preventDefault();
            var id_hdr = $('#id_hdr').val();
            $('#updateBtnText').hide();
            $('#updateLoadingSpinner').show();
            $('#updateSubmitBtn').prop('disabled', true);

            $.ajax({
                type: "PUT",
                url: "{{ route('options.updateHdr', '') }}/" + id_hdr,
                data: $(this).serialize(),
                success: function(response) {
                    $('#updateModal').modal('hide');
                    $('#updateBtnText').show();
                    $('#updateLoadingSpinner').hide();
                    $('#updateSubmitBtn').prop('disabled', false);
                    drow.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Option successfully updated!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function(error) {
                    console.log(error);
                    $('#updateBtnText').show();
                    $('#updateLoadingSpinner').hide();
                    $('#updateSubmitBtn').prop('disabled', false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to update Options!',
                    });
                }
            });
        });
        $(document).on('click', '[id^=updateSubmitBtnOpt]', function(e) {
            e.preventDefault(); // Prevent default action

            // Get the unique ID from the button's ID
            var id_opt = $(this).closest('.modal').find('#id_opt').val();

            // Show loading state
            $('#addBtnTextOption').hide();
            $('#updateLoadingSpinnerOption').show();
            $(this).prop('disabled', true); // Disable the clicked button

            // Serialize the form data specific to the modal
            var formData = $(this).closest('.modal').find('form').serialize();

            $.ajax({
                type: "PUT",
                url: "{{ route('options.updateOpt', '') }}/" + id_opt,
                data: formData,
                success: function(response) {
                    $('#editModal' + id_opt).modal('hide'); // Hide the specific modal
                    $('#addBtnTextOption').show();
                    $('#updateLoadingSpinnerOption').hide();
                    $('[id^=updateSubmitBtnOpt]').prop('disabled', false); // Re-enable all buttons

                    // Reload DataTable
                    drow.ajax.reload();

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Option successfully updated!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function(error) {
                    console.log(error);
                    $('#addBtnTextOption').show();
                    $('#updateLoadingSpinnerOption').hide();
                    $('[id^=updateSubmitBtnOpt]').prop('disabled', false); // Re-enable all buttons

                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to update Options!',
                    });
                }
            });
        });


        // Delete Menu
        $('#deleteModalBtn').on('click', function() {
            var data = drow.row('.selected').data();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteBtnText').hide();
                    $('#deleteLoadingSpinner').show();
                    $('#deleteModalBtn').prop('disabled', true);

                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('options.optionsDeletedHeader', '') }}/" + data.uid,
                        success: function(response) {
                            $('#deleteBtnText').show();
                            $('#deleteLoadingSpinner').hide();
                            $('#deleteModalBtn').prop('disabled', false);
                            drow.ajax.reload();
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'data has been deleted.',
                                timer: 1500,
                                showConfirmButton: false
                            });
                            $('#updateModalBtn').prop('disabled', true);
                            $('#deleteModalBtn').prop('disabled', true);
                        },
                        error: function(error) {
                            console.log(error);
                            $('#deleteBtnText').show();
                            $('#deleteLoadingSpinner').hide();
                            $('#deleteModalBtn').prop('disabled', false);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to delete data!',
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '[id^=confirmDeleteBtnOption]', function() {
            var dataId = $(this).data('id'); // Ambil ID dari atribut data-id tombol

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('options.optionsDeletedOption', '') }}/" + dataId,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Data has been deleted.',
                                timer: 1500,
                                showConfirmButton: false
                            });
                            // Perbarui tabel untuk memastikan data terbaru
                            drow.ajax.reload();
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to delete data!',
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
@endsection