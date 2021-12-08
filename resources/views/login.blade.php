<!DOCTYPE html>
<html>
    @component('components.header')
        @slot('title')
            Login
        @endslot
    @endcomponent
    <body>
    
        <div class="container">
            <form action="" class='form-signin' id="form">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(function () {
            $("#form").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('auth.login') }}",
                    type: 'post',
                    dataType: 'json',
                    timeout: 1500,
                    data: $("#form").serialize(),
                    headers: {
                        "Accept": "application/json",
                    },
                    success: function (data,status,xhr) {
                        if(xhr.status==200){
                            window.localStorage.clear();
                            window.localStorage.setItem('token', data.access_token);
                            window.location.href = "{{ route('employees.index') }}";
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