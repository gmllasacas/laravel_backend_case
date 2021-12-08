<!DOCTYPE html>
<html>
    @component('components.header')
        @slot('title')
            All employees
        @endslot
    @endcomponent
    <body>
        <div class="container">
            @component('components.menu')
            @endcomponent

            <h1>All employees</h1>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="list">
                    <thead>
                        <tr>
                            <th>Emp ID</th>
                            <th>Name Prefix</th>
                            <th>First Name</th>
                            <th>Middle Initial</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>E Mail</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Mother's Maiden Name</th>
                            <th>Date of Birth</th>
                            <th>Date of Joining</th>
                            <th>Salary</th>
                            <th>SSN</th>
                            <th>Phone No.</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </body>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js""></script>

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
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.log('Error: ' + errorMessage);
                    }
                },
                columns: [
                    { data: 'id' },
                    { data: 'name_prefix' },
                    { data: 'first_name' },
                    { data: 'middle_initial' },
                    { data: 'last_name' },
                    { data: 'gender' },
                    { data: 'e_mail' },
                    { data: 'fathers_name' },
                    { data: 'mothers_name' },
                    { data: 'mothers_maiden_name' },
                    { data: 'date_of_birth' },
                    { data: 'date_of_joining' },
                    { data: 'salary' },
                    { data: 'ssn' },
                    { data: 'phone_no' },
                    { data: 'city' },
                    { data: 'state' },
                    { data: 'zip' },
                ],
                order: [[ 1, "asc" ]]
            });
            
        });
    </script>

</html>