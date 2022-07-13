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
            <div class="col-md-3">
                <h6>ATTANDANCE LIST</h6>
            </div>
            <div class="col-md-9">
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
    <div class="search-list" style="overflow-y:auto; height: 500px !important;">

        <table class="table" id="myTable">

            <thead>
            <tr>
                <th>Name</th>
                <th>Day</th>
                <th>Date</th>
                <th>check in</th>
                <th>check out</th>


            </tr>
            </thead>
            <tbody>


            @foreach($employeeAttandance as $employeesVar)




                <tr>


                    <input type="hidden"
                           value="  {{{$day = \Carbon\Carbon::parse($employeesVar->created_at)->format('l')}}}
                                   ">

                    @if($day != "Sunday")
                        <td>{{$employeesVar->name}}</td>
                        <td>{{$day}}</td>
                        <td>{{$employeesVar->date}}</td>
                        <td>{{$employeesVar->created_at}}</td>
                        <td>{{$employeesVar->updated_at}}</td>

                    @else
                        <td colspan="3"  style=" background-color: black;color: white; text-align: center;font-family: 'Times New Roman';font-size: larger">{{"Gym OFF (Sunday)"}}</td>


                    @endif


                </tr>



            @endforeach

            </tbody>
        </table>

    </div>
</div>


</body>
</html>
