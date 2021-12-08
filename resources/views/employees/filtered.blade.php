<!DOCTYPE html>
<html>
    @component('components.header')
        @slot('title')
            Filtered employees
        @endslot
    @endcomponent
    <body>
        <div class="container">
            @component('components.menu')
            @endcomponent

            <h1>List employees    <button type="button" class="btn btn-primary" id="create_form"> <span class="glyphicon glyphicon-plus"></span>  Create employee</button></h1>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="list">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="modal fade" id="modal" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout modal-lg">
                <div class="modal-content">
                    <form class="form" method="post" action="" id="form" autocomplete="off">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Create employee form</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>ID</label>
                                            <input class="form-control textoinput" type="text" name="emp_id" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Name prefix</label>
                                            <input class="form-control textoinput" type="text" name="name_prefix" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>First name</label>
                                            <input class="form-control textoinput" type="text" name="first_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Middle initial</label>
                                            <input class="form-control textoinput" type="text" name="middle_initial" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Last name</label>
                                            <input class="form-control textoinput" type="text" name="last_name"required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="O">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>E mail</label>
                                            <input class="form-control textoinput" type="text" name="e_mail" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Father's name</label>
                                            <input class="form-control textoinput" type="text" name="fathers_name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Mother's name</label>
                                            <input class="form-control textoinput" type="text" name="mothers_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Mother's maiden name</label>
                                            <input class="form-control textoinput" type="text" name="mothers_maiden_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Date of birth</label>
                                            <input class="form-control textoinput" type="text" name="date_of_birth" required placeholder="1/1/2020 (n/j/Y)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Date of joining</label>
                                            <input class="form-control textoinput" type="text" name="date_of_joining" required placeholder="1/1/2020 (n/j/Y)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Salary</label>
                                            <input class="form-control textoinput" type="number" step="0.01" name="salary"required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>SSN</label>
                                            <input class="form-control textoinput" type="text" name="ssn" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Phone no.</label>
                                            <input class="form-control textoinput" type="text" name="phone_no" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>City</label>
                                            <input class="form-control textoinput" type="text" name="city" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>State</label>
                                            <input class="form-control textoinput" type="text" name="state" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Zip</label>
                                            <input class="form-control textoinput" type="text" name="zip" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout modal-lg">
                <div class="modal-content">
                    <form class="form" method="post" action="" id="form-edit" autocomplete="off">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit employee form</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>ID</label>
                                            <input class="form-control textoinput" type="text" name="id" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Name prefix</label>
                                            <input class="form-control textoinput" type="text" name="name_prefix" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>First name</label>
                                            <input class="form-control textoinput" type="text" name="first_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Middle initial</label>
                                            <input class="form-control textoinput" type="text" name="middle_initial" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Last name</label>
                                            <input class="form-control textoinput" type="text" name="last_name"required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="O">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>E mail</label>
                                            <input class="form-control textoinput" type="text" name="e_mail" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Father's name</label>
                                            <input class="form-control textoinput" type="text" name="fathers_name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Mother's name</label>
                                            <input class="form-control textoinput" type="text" name="mothers_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Mother's maiden name</label>
                                            <input class="form-control textoinput" type="text" name="mothers_maiden_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Date of birth</label>
                                            <input class="form-control textoinput" type="text" name="date_of_birth" required placeholder="1/1/2020 (n/j/Y)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Date of joining</label>
                                            <input class="form-control textoinput" type="text" name="date_of_joining" required placeholder="1/1/2020 (n/j/Y)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Salary</label>
                                            <input class="form-control textoinput" type="number" step="0.01" name="salary"required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>SSN</label>
                                            <input class="form-control textoinput" type="text" name="ssn" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Phone no.</label>
                                            <input class="form-control textoinput" type="text" name="phone_no" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>City</label>
                                            <input class="form-control textoinput" type="text" name="city" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>State</label>
                                            <input class="form-control textoinput" type="text" name="state" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Zip</label>
                                            <input class="form-control textoinput" type="text" name="zip" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-delete" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="" id="form-delete" autocomplete="off">
                            <input type="hidden" name="id" value="">
                            <h3 class="text-info text-center msg">You are about to delete the employee </h3>
                            <h2 class="text-danger text-center">Are you sure?</h2>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="submit_form-delete">Delete employee</button>
                    </div>
                </div>
            </div>
        </div>

    </body>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js""></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {

            var dtable = jQuery("#list").DataTable({
                ajax: {
                    type: 'GET',
                    url: "{{ route('employees.list') }}",
                    timeout: 10000,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    dataSrc: function(json) {
                        for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                            json.data[i]['actions']='<div class="btn-group">'+
                                                                    '    <button class="btn btn-xs btn-success details" title="Edit" data-id="'+json.data[i]['id']+'">'+
                                                                    '       <span class="glyphicon glyphicon-pencil"></span>  Details / Edit'+
                                                                    '    </button>'+
                                                                    '    <button class="btn btn-xs btn-danger delete" title="Delete" data-id="'+json.data[i]['id']+'">'+
                                                                    '        <span class="glyphicon glyphicon-remove"></span>  Delete'+
                                                                    '    </button>'+
                                                                    '</div>';
                        }
                        return json.data;
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.log('Error: ' + errorMessage);
                    }
                },
                columns: [
                    { data: 'first_name' },
                    { data: 'last_name' },
                    { data: 'actions' },
                ],
                order: [[ 1, "asc" ]]
            });

            jQuery('body').on('click', "#create_form", function() {
                document.getElementById("form").reset();
                jQuery("#modal").modal('show');
            });

            jQuery('body').on('click', ".details", function() {
                jQuery.ajax({
                    url: "{{ URL::to('api/employees') }}/"+jQuery(this).data('id'),
                    type: 'get',
                    dataType: 'json',
                    timeout: 1500,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    success: function (data,status,xhr) {
                        if(xhr.status==200){
                            document.getElementById("form-edit").reset();
                            jQuery.each(data.data, function(index, item) {
                                if(jQuery('#form-edit [name='+index+']').length>0){
                                    jQuery('#form-edit [name='+index+']').val(item);
                                }
                            });
                            jQuery("#modal-edit").modal('show');
                        }else{
                            alert(data.message);
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('Error: ' + errorMessage);
                    }
                });
            });

            jQuery('body').on('click', ".delete", function() {
                jQuery.ajax({
                    url: "{{ URL::to('api/employees') }}/"+jQuery(this).data('id'),
                    type: 'get',
                    dataType: 'json',
                    timeout: 1500,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    success: function (data,status,xhr) {
                        if(xhr.status==200){
                            document.getElementById("form").reset();
                             jQuery('#form-delete [name=id]').val(data.data.id);
                             jQuery('#form-delete .msg').html('You are about to delete the employee <b>'+data.data.first_name+' '+data.data.middle_initial+'. '+data.data.last_name+'</b>');
                            jQuery("#modal-delete").modal('show');
                        }else{
                            alert(data.message);
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('Error: ' + errorMessage);
                    }
                });
            });

            $("#form").submit(function(e) {
                e.preventDefault();
                jQuery.ajax({
                    url: "{{ URL::to('api/employees') }}",
                    type: 'post',
                    dataType: 'json',
                    timeout: 1500,
                    data: $("#form").serialize(),
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    success: function (data,status,xhr) {
                        if(xhr.status==200){
                            dtable.ajax.reload();
                            alert(data.message);
                            jQuery("#modal").modal('hide');
                        }else{
                            alert(data.message);
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('Error: ' + errorMessage);
                    }
                });
            });

            $("#form-edit").submit(function(e) {
                e.preventDefault();
                jQuery.ajax({
                    url: "{{ URL::to('api/employees') }}/"+jQuery('#form-edit [name=id]').val(),
                    type: 'patch',
                    dataType: 'json',
                    timeout: 1500,
                    data: $("#form-edit").serialize(),
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    success: function (data,status,xhr) {
                        if(xhr.status==200){
                            dtable.ajax.reload();
                            alert(data.message);
                            jQuery("#modal-edit").modal('hide');
                        }else{
                            alert(data.message);
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('Error: ' + errorMessage);
                    }
                });
            });

            jQuery('body').on('click', "#submit_form-delete", function() {
                jQuery.ajax({
                    url: "{{ URL::to('api/employees') }}/"+jQuery('#form-delete [name=id]').val(),
                    type: 'delete',
                    dataType: 'json',
                    timeout: 1500,
                    data: $("#form").serialize(),
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    success: function (data,status,xhr) {
                        if(xhr.status==200){
                            dtable.ajax.reload();
                            alert(data.message);
                            jQuery("#modal-delete").modal('hide');
                        }else{
                            alert(data.message);
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('Error: ' + errorMessage);
                    }
                });
            });
            
        });
    </script>

</html>