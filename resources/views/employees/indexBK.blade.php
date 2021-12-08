<!DOCTYPE html>
<html>
    <head>
        <title>Back end case</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('sharks') }}">Back end case</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('sharks') }}">View All sharks</a></li>
                    <li><a href="{{ URL::to('sharks/create') }}">Create a shark</a>
                </ul>
            </nav>

            <h1>All the sharks</h1>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name_prefix</th>
                            <th>first_name</th>
                            <th>middle_initial</th>
                            <th>last_name</th>
                            <th>gender</th>
                            <th>e_mail</th>
                            <th>fathers_name</th>
                            <th>mothers_name</th>
                            <th>mothers_maiden_name</th>
                            <th>date_of_birth</th>
                            <th>date_of_joining</th>
                            <th>salary</th>
                            <th>ssn</th>
                            <th>phone_no</th>
                            <th>city</th>
                            <th>state</th>
                            <th>zip</th>
                            <th>created</th>
                            <th>updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name_prefix }}</td>
                            <td>{{ $value->first_name }}</td>
                            <td>{{ $value->middle_initial }}</td>
                            <td>{{ $value->last_name }}</td>
                            <td>{{ $value->gender }}</td>
                            <td>{{ $value->e_mail }}</td>
                            <td>{{ $value->fathers_name }}</td>
                            <td>{{ $value->mothers_name }}</td>
                            <td>{{ $value->mothers_maiden_name }}</td>
                            <td>{{ $value->date_of_birth }}</td>
                            <td>{{ $value->date_of_joining }}</td>
                            <td>{{ $value->salary }}</td>
                            <td>{{ $value->ssn }}</td>
                            <td>{{ $value->phone_no }}</td>
                            <td>{{ $value->city }}</td>
                            <td>{{ $value->state }}</td>
                            <td>{{ $value->zip }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>{{ $value->updated_at }}</td>
                            <td>
                                <a class="btn btn-small btn-success" href="{{ URL::to('sharks/' . $value->id) }}">Show this shark</a>
                                <a class="btn btn-small btn-info" href="{{ URL::to('sharks/' . $value->id . '/edit') }}">Edit this shark</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </body>

</html>