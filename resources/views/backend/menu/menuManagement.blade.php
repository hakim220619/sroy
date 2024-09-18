@extends('backend.layouts.app')

@section('title', 'Menu Management')
@section('page-header-icon', 'ph-duotone ph-house')
@section('page-header-one', 'Menu')
@section('page-header', 'Menu Management')

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <!-- Add Button -->
                <button type="button" id="addModalBtn" class="btn btn-info m-b-20">
                    <i class="fa-solid fa-plus"></i> Tambah
                </button>

                <!-- Update Button -->
                <button type="button" id="updateModalBtn" class="btn btn-primary m-b-20" disabled>
                    <i class="fa-solid fa-pen"></i> Update
                </button>

                <!-- Delete Button -->
                <button type="button" id="deleteModalBtn" class="btn btn-danger m-b-20" disabled>
                    <i class="fa-solid fa-trash"></i>
                    <span id="deleteBtnText">Delete</span>
                    <div id="deleteLoadingSpinner" class="spinner-border spinner-border-sm" role="status"
                        style="display:none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
                <div class="dt-responsive table-responsive">
                    <table id="row-selected" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Route</th>
                                <th>Order</th>
                                <th>IsActive</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
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
                        <h5 class="modal-title" id="addModalLabel">Tambah Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="menu_name">Nama Menu</label>
                            <input type="text" class="form-control" id="menu_name" name="menu_name" required>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" required>
                        </div>
                        <div class="form-group">
                            <label for="route">Route</label>
                            <input type="text" class="form-control" id="route" name="route" required>
                        </div>
                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" class="form-control" id="order" name="order" required>
                        </div>
                        <div class="form-group">
                            <label for="is_active">IsActive</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="addSubmitBtn">
                            <span id="addBtnText">Tambah</span>
                            <div id="addLoadingSpinner" class="spinner-border spinner-border-sm" role="status"
                                style="display:none;">
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
                <form id="updateMenuForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="update_menu_id" name="menu_id">
                        <div class="form-group">
                            <label for="update_menu_name">Nama Menu</label>
                            <input type="text" class="form-control" id="update_menu_name" name="menu_name" required>
                        </div>
                        <div class="form-group">
                            <label for="update_icon">Icon</label>
                            <input type="text" class="form-control" id="update_icon" name="icon" required>
                        </div>
                        <div class="form-group">
                            <label for="update_route">Route</label>
                            <input type="text" class="form-control" id="update_route" name="route" required>
                        </div>
                        <div class="form-group">
                            <label for="update_order">Order</label>
                            <input type="number" class="form-control" id="update_order" name="order" required>
                        </div>
                        <div class="form-group">
                            <label for="update_is_active">IsActive</label>
                            <select class="form-control" id="update_is_active" name="is_active">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateSubmitBtn">
                            <span id="updateBtnText">Update</span>
                            <div id="updateLoadingSpinner" class="spinner-border spinner-border-sm" role="status"
                                style="display:none;">
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
                // Inisialisasi DataTables dengan AJAX dari controller
                var drow = $('#row-selected').DataTable({
                    processing: false,
                    serverSide: false,
                    ajax: '{{ route('menus.dataMenuManagement') }}', // Memanggil route untuk mendapatkan data
                    columns: [{
                            data: 'id',
                            name: 'id'
                        }, {
                            data: 'menu_name',
                            name: 'menu_name'
                        },
                        {
                            data: 'icon',
                            name: 'icon'
                        },
                        {
                            data: 'route',
                            name: 'route'
                        },
                        {
                            data: 'order',
                            name: 'order'
                        },
                        {
                            data: 'is_active',
                            name: 'is_active'
                        }
                    ],
                });
                $('#row-selected tbody').on('click', 'tr', function() {
                    var data = drow.row(this).data();
                    if ($(this).hasClass('selected')) {
                        $(this).removeClass('selected');
                        $('#updateModalBtn').prop('disabled', true); // Disable update button
                        $('#deleteModalBtn').prop('disabled', true); // Disable delete button
                    } else {
                        drow.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                        $('#updateModalBtn').prop('disabled', false); // Enable update button
                        $('#deleteModalBtn').prop('disabled', false); // Enable delete button
                    }
                });

                // Open Add Modal
                $('#addModalBtn').on('click', function() {
                    $('#addModal').modal('show');
                });

                // Handle Add Menu Form Submission
                // Handle Add Menu Form Submission
                $('#addMenuForm').on('submit', function(e) {
                    e.preventDefault();

                    // Show spinner and disable the submit button
                    $('#addBtnText').hide(); // Hide the "Tambah" text
                    $('#addLoadingSpinner').show(); // Show the loading spinner
                    $('#addSubmitBtn').prop('disabled', true); // Disable the button

                    $.ajax({
                        type: "POST",
                        url: "{{ route('menus.store') }}",
                        data: $(this).serialize(),
                        success: function(response) {
                            // Hide the modal after success
                            $('#addModal').modal('hide');

                            // Reset the form after submission
                            $('#addMenuForm')[0].reset();

                            // Reset button to original state
                            $('#addBtnText').show(); // Show the "Tambah" text
                            $('#addLoadingSpinner').hide(); // Hide the spinner
                            $('#addSubmitBtn').prop('disabled', false); // Re-enable the button

                            // Reload DataTables
                            drow.ajax.reload();

                            // Show success message
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

                            // Reset button to original state
                            $('#addBtnText').show(); // Show the "Tambah" text
                            $('#addLoadingSpinner').hide(); // Hide the spinner
                            $('#addSubmitBtn').prop('disabled', false); // Re-enable the button

                            // Reset the form after submission failure if needed
                            $('#addMenuForm')[0].reset();

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to add menu!',
                            });
                        }
                    });
                });




                // Open Update Modal and Fill the Form
                $('#row-selected tbody').on('click', 'tr', function() {
                    var data = drow.row(this).data();
                    $('#update_menu_id').val(data.id);
                    $('#update_menu_name').val(data.menu_name);
                    $('#update_icon').val(data.icon);
                    $('#update_route').val(data.route);
                    $('#update_order').val(data.order);
                    $('#update_is_active').val(data.is_active);
                    $('#updateModalBtn').prop('disabled', false); // Enable update button
                });

                // Open Update Modal
                $('#updateModalBtn').on('click', function() {
                    $('#updateModal').modal('show');
                });

                // Handle Update Menu Form Submission
                $('#updateMenuForm').on('submit', function(e) {
                    e.preventDefault();
                    var menu_id = $('#update_menu_id').val();

                    // Show spinner and disable the submit button
                    $('#updateBtnText').hide(); // Hide the "Update" text
                    $('#updateLoadingSpinner').show(); // Show the loading spinner
                    $('#updateSubmitBtn').prop('disabled', true); // Disable the button

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('menus.update', '') }}/" + menu_id,
                        data: $(this).serialize(),
                        success: function(response) {
                            // Hide the modal after success
                            $('#updateModal').modal('hide');

                            // Reset button to original state
                            $('#updateBtnText').show(); // Show the "Update" text
                            $('#updateLoadingSpinner').hide(); // Hide the spinner
                            $('#updateSubmitBtn').prop('disabled', false); // Re-enable the button

                            // Reload DataTables
                            drow.ajax.reload();

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Menu successfully updated!',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        },
                        error: function(error) {
                            console.log(error);

                            // Reset button to original state
                            $('#updateBtnText').show(); // Show the "Update" text
                            $('#updateLoadingSpinner').hide(); // Hide the spinner
                            $('#updateSubmitBtn').prop('disabled', false); // Re-enable the button

                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to update menu!',
                            });
                        }
                    });
                });


                // Open confirmation dialog when clicking delete button
                $('#deleteModalBtn').on('click', function() {
                    var data = drow.row('.selected').data(); // Get selected row data

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
                            // Show spinner and disable the delete button
                            $('#deleteBtnText').hide(); // Hide the "Delete" text
                            $('#deleteLoadingSpinner').show(); // Show the spinner
                            $('#deleteModalBtn').prop('disabled', true); // Disable the button

                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('menus.destroy', '') }}/" + data
                                    .id, // Route for deleting the menu
                                success: function(response) {
                                    // Reset button to original state
                                    $('#deleteBtnText').show(); // Show the "Delete" text
                                    $('#deleteLoadingSpinner').hide(); // Hide the spinner
                                    $('#deleteModalBtn').prop('disabled',
                                        false); // Re-enable the button

                                    // Reload DataTables after deleting the menu
                                    drow.ajax.reload();

                                    // Show success message
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: 'Menu has been deleted.',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });

                                    // Disable the delete button again after success
                                    $('#updateModalBtn').prop('disabled', true);
                                    $('#deleteModalBtn').prop('disabled', true);
                                },
                                error: function(error) {
                                    console.log(error);

                                    // Reset button to original state
                                    $('#deleteBtnText').show(); // Show the "Delete" text
                                    $('#deleteLoadingSpinner').hide(); // Hide the spinner
                                    $('#deleteModalBtn').prop('disabled',
                                        false); // Re-enable the button

                                    // Show error message
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Failed to delete menu!',
                                    });
                                }
                            });
                        }
                    });
                });


            });
            // Event untuk memilih row
        </script>
    @endpush
@endsection
