<!DOCTYPE html>
<html lang="en">
<head>
    <title>Members List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    {{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        .search-table {
            padding: 10%;
            margin-top: -6%;
        }

        .search-box {
            background: #c1c1c1;
            border: 1px solid #ababab;
            padding: 3%;
        }

        .search-box input:focus {
            box-shadow: none;
            border: 2px solid #eeeeee;
        }

        .search-list {
            background: #fff;
            border: 1px solid #ababab;
            border-top: none;
        }

        .search-list h3 {
            background: #eee;
            padding: 3%;
            margin-bottom: 0%;
        }
    </style>
</head>
<body>

<div class="container search-table">
    <div class="search-box">
        <div class="row">
            <div class="col-md-6">
                {{--                <h5>Search All Members</h5>--}}
                {{--                <input class="form-control" placeholder="find Member" name="find_mem" value="jutt">--}}

                <a href="{{route('memberList')}}">
                    <button class="btn btn-primary">Members Attandance</button>
                </a>

            </div>
            <div class="col-md-6">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                       placeholder="Search all Members">
                <script>
                    $(document).ready(function () {
                        $("#myInput").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="search-list" style="overflow-y:hidden; height: 600px !important;">

        <table class="table" id="myTable">

            <thead>
            <tr>
                <th>Name</th>
                <th>Attandance</th>
            </tr>
            </thead>
            <tbody>
            @if(session()->has('success'))


                <div class="alert alert-success">

                    <strong>Success!</strong> {{session('success')}}
                </div>
            @endif
            @if(session()->has('danger'))


                <div class="alert alert-danger">

                    <strong>Success!</strong> {{session('danger')}}
                </div>
            @endif
            {{--            @if ($errors->any())--}}
            {{--                <div class="alert alert-danger ">--}}
            {{--                    @foreach ($errors->all() as $error)--}}
            {{--                        <li>{{ $error }}</li>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            {{--            @endif--}}


            <tr>


                <td>Shahzaib</td>
                <td>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('markEmployeeAttandance')}}">
                                    {{csrf_field()}}

                                    <input hidden name="name" value="shahzaib">
                                    <input hidden value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                    <input hidden name="date" value="{{$currentDate}}">
                                    <button type="submit" class="btn btn-success">Check In</button>

                                </form>

                            </div>
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('updateEmployeeAttandance')}}">
                                    {{csrf_field()}}
                                    <input hidden name="name" value="shahzaib">


                                    <button type="submit" class="btn btn-success">Check out</button>


                                </form>

                            </div>
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <a href="{{route('employeeTask')}}" class="btn btn-danger"> Daily Task </a>

                            </div>
                        </div>
                    </div>


                </td>


            </tr>
            <tr>


                <td>Nabeel</td>

                <td>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('markEmployeeAttandance')}}">
                                    {{csrf_field()}}

                                    <input hidden name="name" value="nabeel">
                                    <input hidden value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                    <input hidden name="date" value="{{$currentDate}}">
                                    <button type="submit" class="btn btn-success">Check In</button>

                                </form>

                            </div>
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('updateEmployeeAttandance')}}">
                                    {{csrf_field()}}
                                    <input hidden name="name" value="nabeel">


                                    <button type="submit" class="btn btn-success">Check out</button>


                                </form>

                            </div>
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <a href="{{route('employeeTask')}}" class="btn btn-danger"> Daily Task </a>

                            </div>
                        </div>
                    </div>


                </td>


            </tr>
            <tr>


                <td>Badal</td>

                <td>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('markEmployeeAttandance')}}">
                                    {{csrf_field()}}

                                    <input hidden name="name" value="badal">
                                    <input hidden value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                    <input hidden name="date" value="{{$currentDate}}">
                                    <button type="submit" class="btn btn-success">Check In</button>

                                </form>

                            </div>
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('updateEmployeeAttandance')}}">
                                    {{csrf_field()}}
                                    <input hidden name="name" value="badal">


                                    <button type="submit" class="btn btn-success">Check out</button>


                                </form>

                            </div>

                        </div>
                    </div>


                </td>


                </td>


            </tr>
            <tr>


                <td>Abdul Salam</td>
                <td>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('markEmployeeAttandance')}}">
                                    {{csrf_field()}}

                                    <input hidden name="name" value="abdul salam">
                                    <input hidden value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                    <input hidden name="date" value="{{$currentDate}}">
                                    <button type="submit" class="btn btn-success">Check In</button>

                                </form>

                            </div>
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('updateEmployeeAttandance')}}">
                                    {{csrf_field()}}
                                    <input hidden name="name" value="abdul salam">


                                    <button type="submit" class="btn btn-success">Check out</button>


                                </form>

                            </div>

                        </div>
                    </div>

                </td>


            </tr>
            <tr>


                <td>Usama Khan</td>
                <td>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('markEmployeeAttandance')}}">
                                    {{csrf_field()}}

                                    <input hidden name="name" value="usama">
                                    <input hidden value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                    <input hidden name="date" value="{{$currentDate}}">
                                    <button type="submit" class="btn btn-success">Check In</button>

                                </form>

                            </div>
                            <div class="col-md-2 col-sm-2   col-lg-3 col-xl-3">
                                <form method="post" action="{{route('updateEmployeeAttandance')}}">
                                    {{csrf_field()}}
                                    <input hidden name="name" value="usama">


                                    <button type="submit" class="btn btn-success">Check out</button>


                                </form>

                            </div>

                        </div>
                    </div>

                </td>


            </tr>


        </table>

    </div>
</div>


<script>
    function numFunction() {
        let text;
        let person = prompt("Please enter your Number:", "00");
        if (person == null || person == "") {
            text = "User cancelled the prompt.";
        } else {
            text = "Hello " + person + "! How are you today?";
        }
        document.getElementById("demo").innerHTML = text;
    }
</script>

</body>
</html>
