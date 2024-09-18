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
                    <div id="deleteLoadingSpinner" class="spinner-border spinner-border-sm" role="status" style="display:none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>

                <div class="dt-responsive table-responsive">
                    <table id="row-selected" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role Name</th>
                                <th>Status</th>
                                <th>Created</th>
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
                        <h5 class="modal-title" id="addModalLabel">Tambah Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select class="form-control" id="role_id" name="role_id" required>
                                <option value="" selected disabled>Pilih Role</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="menu_id">Menu</label>
                            <select class="form-control" id="menu_id" name="menu_id" required>
                                <option value="" selected disabled>Pilih Menu</option>
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
                <form id="updateMenuForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="update_menu_id_hidden" name="menu_id">
                        <div class="form-group">
                            <label for="update_role_id">Role</label>
                            <select class="form-control" id="update_role_id" name="role_id" required>
                                <option value="" selected disabled>Pilih Role</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="update_menu_id">Menu</label>
                            <select class="form-control" id="update_menu_id" name="menu_id" required>
                                <option value="" selected disabled>Pilih Menu</option>
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
                    ajax: '{{ route('role.getDataRole') }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'role_name', name: 'role_name' },
                        { data: 'menu_name', name: 'menu_name' },
                        { data: 'is_active', name: 'is_active' },
                        { data: 'created_at', name: 'created_at' }
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

                // Open Add Modal
                $('#addModalBtn').on('click', function() {
                    loadRolesAdd();
                    loadMenusAdd();
                    $('#addModal').modal('show');
                });

                // Open Update Modal and Fill the Form
                $('#updateModalBtn').on('click', function() {
                    var selectedData = drow.row('.selected').data();
                    if (selectedData) {
                        $('#update_menu_id_hidden').val(selectedData.id);
                        loadRoles(selectedData.role_id);
                        loadMenus(selectedData.menu_id);
                        $('#updateModal').modal('show');
                    }
                });

                // Load roles and menus dynamically for update
                function loadRoles(selectedRoleId) {
                    $.ajax({
                        url: '/roles/getData',
                        method: 'GET',
                        success: function(response) {
                            var roleSelect = $('#update_role_id');
                            roleSelect.empty();
                            roleSelect.append('<option value="" selected disabled>Pilih Role</option>');
                            $.each(response.data, function(index, role) {
                                roleSelect.append('<option value="' + role.id + '">' + role.role_name + '</option>');
                            });
                            roleSelect.val(selectedRoleId);
                        },
                        error: function() {
                            console.log('Failed to load roles.');
                        }
                    });
                }

                function loadMenus(selectedMenuId) {
                    $.ajax({
                        url: '/menus/data',
                        method: 'GET',
                        success: function(response) {
                            var menuSelect = $('#update_menu_id');
                            menuSelect.empty();
                            menuSelect.append('<option value="" selected disabled>Pilih Menu</option>');
                            $.each(response.data, function(index, menu) {
                                menuSelect.append('<option value="' + menu.id + '">' + menu.menu_name + '</option>');
                            });
                            menuSelect.val(selectedMenuId);
                        },
                        error: function() {
                            console.log('Failed to load menus.');
                        }
                    });
                }

                function loadRolesAdd() {
                    $.ajax({
                        url: '/roles/getData',
                        method: 'GET',
                        success: function(response) {
                            var roleSelect = $('#role_id, #update_role_id');
                            roleSelect.empty();
                            roleSelect.append('<option value="" selected disabled>Pilih Role</option>');
                            $.each(response.data, function(index, role) {
                                roleSelect.append('<option value="' + role.id + '">' + role.role_name + '</option>');
                            });
                        },
                        error: function() {
                            console.log('Failed to load roles.');
                        }
                    });
                }

                function loadMenusAdd() {
                    $.ajax({
                        url: '/menus/data',
                        method: 'GET',
                        success: function(response) {
                            var menuSelect = $('#menu_id, #update_menu_id');
                            menuSelect.empty();
                            menuSelect.append('<option value="" selected disabled>Pilih Menu</option>');
                            $.each(response.data, function(index, menu) {
                                menuSelect.append('<option value="' + menu.id + '">' + menu.menu_name + '</option>');
                            });
                        },
                        error: function() {
                            console.log('Failed to load menus.');
                        }
                    });
                }

                // Handle Add Menu Form Submission
                $('#addMenuForm').on('submit', function(e) {
                    e.preventDefault();
                    handleFormSubmit('{{ route('menus.storeMenuManagement') }}', $(this), '#addModal', drow, 'POST');
                });

                // Handle Update Menu Form Submission
                $('#updateMenuForm').on('submit', function(e) {
                    e.preventDefault();
                    var menu_id = $('#update_menu_id_hidden').val();
                    handleFormSubmit("{{ route('menus.updateMenuManagement', '') }}/" + menu_id, $(this), '#updateModal', drow, 'PUT');
                });

                // Handle form submit for both add and update
                function handleFormSubmit(url, form, modalId, table, method) {
                    var submitButton = form.find('button[type="submit"]');
                    var loadingSpinner = submitButton.find('.spinner-border-sm');
                    var btnText = submitButton.find('span');

                    btnText.hide();
                    loadingSpinner.show();
                    submitButton.prop('disabled', true);

                    $.ajax({
                        type: method,
                        url: url,
                        data: form.serialize(),
                        success: function(response) {
                            $(modalId).modal('hide');
                            form[0].reset();
                            table.ajax.reload();
                            resetButtonState(submitButton, btnText, loadingSpinner);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        },
                        error: function(xhr) {
                            resetButtonState(submitButton, btnText, loadingSpinner);
                            handleFormError(xhr);
                        }
                    });
                }

                // Reset button state
                function resetButtonState(button, btnText, spinner) {
                    btnText.show();
                    spinner.hide();
                    button.prop('disabled', false);
                }

                // Handle form errors
                function handleFormError(xhr) {
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.message 
                        ? xhr.responseJSON.message 
                        : 'Failed to submit form. Please try again.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage
                    });
                }

                // Handle delete menu
                $('#deleteModalBtn').on('click', function() {
                    var data = drow.row('.selected').data();
                    if (data) {
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
                                handleDelete(data.id, drow);
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'No menu selected!',
                            text: 'Please select a menu to delete.',
                        });
                    }
                });

                function handleDelete(menuId, table) {
                    $('#deleteBtnText').hide();
                    $('#deleteLoadingSpinner').show();
                    $('#deleteModalBtn').prop('disabled', true);

                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('menus.menuManagementDeleted', '') }}/" + menuId,
                        success: function(response) {
                            table.ajax.reload();
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Menu has been deleted.',
                                timer: 1500,
                                showConfirmButton: false
                            });
                            resetDeleteButtonState();
                        },
                        error: function(error) {
                            resetDeleteButtonState();
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to delete menu!',
                            });
                        }
                    });
                }

                function resetDeleteButtonState() {
                    $('#deleteBtnText').show();
                    $('#deleteLoadingSpinner').hide();
                    $('#deleteModalBtn').prop('disabled', false);
                }
            });
        </script>
    @endpush
@endsection
