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

                <div class="form-inline">
                    <form method="post" action="{{route('findMember')}}" autocomplete="off">
                        {{csrf_field()}}

                        <input type="number" class="form-control mr-1" placeholder="Find Number" name="find_num">
                        <button type="submit" class="btn btn-primary">Enter</button>
                    </form>
                </div>


                @foreach($membersData as $membersVarData)
                    {{--                    {{dd(request()->input('find_mem'))}}--}}

                @endforeach
                {{--                <input class="form-control col-md-2"  placeholder="find Member" name="find_mem">--}}


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
                <th>Roll Number</th>
                <th>Name</th>
                <th>Fee Date</th>
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

                    <strong>Attention!</strong> {{session('danger')}}
                </div>
            @endif

            @if(session()->has('block'))


                <div class="alert alert-danger" style="background: black !important;color: white !important;">

                    <strong>Warning!</strong> {{session('block')}}
                </div>
            @endif
            <tr>

                <td>####</td>
                <td>####</td>
                <td>####</td>
                <td>####</td>


            </tr>
            @foreach($membersData as $membersVar)


                @if(($membersVar->fee_date) > ("2022-06-15"))


                    @if(($currentDateAddDays . " " . "00:00:00") >= ($membersVar->fee_date ))
                        {{--                    {{dd("2021-05-01" + 3)}}--}}



                        @if(($cdate1 . " " . "00:00:00") >= ($membersVar->fee_date))


                            <tr style="background: black !important;color: orangered !important;">
                        @else
                            <tr style="background: lightcoral !important;color: white !important;">

                        @endif
                    @else
                        <tr style="background: white !important;color: black !important;">

                            @endif

                            <td>{{$membersVar->roll_num}}</td>
                            <td>{{$membersVar->name}}</td>
                            <td>{{$membersVar->fee_date}}</td>

                            <td>
                                <form method="post" action="{{route('addAttendance',['id'=>$membersVar->id])}}">
                                    {{csrf_field()}}
                                    <input hidden name="name" value="{{$membersVar->name}}">
                                    <input hidden name="roll_num" value="{{$membersVar->roll_num}}">
                                    <input hidden name="fee_date" value="{{$membersVar->fee_date}}">
                                    <input hidden  value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                    <input hidden name="date" value="{{$currentDate}}">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </td>
                        </tr>



                    @endif
                    @endforeach

            </tbody>
        </table>

    </div>
    <a href="{{route('employeeAttandance')}}"> <button  class="btn btn-primary" style="width: 100%">Gym Management</button>
    </a>

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
