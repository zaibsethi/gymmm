
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
                <h6>Task LIST</h6>
            </div>
            <div class="col-md-9">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                       placeholder="Search by task">
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
        @if(session()->has('success'))


            <div class="alert alert-success">

                <strong>Success!</strong> {{session('success')}}
            </div>
        @endif

        <table class="table" id="myTable">


            <tbody>


<tr>
    <td>



        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-white">
                        <div class="card-body">
                            <form method="post" action="{{route('taskDone')}}">
                                {{csrf_field()}}

                                <h6 style="color: blue" >Shahzaib</h6>
                                <input hidden  value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                <input hidden name="date" value="{{$currentDate}}">
                                <hr><br/>
                                <div class="form-check">
                                    <input type="hidden" class="form-check-input"   value="shahzaib" name="name">

                                    <input class="form-check-input" type="checkbox" value="weight" name="task1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Weight
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="general"  name="task2">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        General
                                    </label>
                                </div>

                                <br/>
                                <button type="submit" class="btn btn-primary">Done</button>

                            </form>

                            <hr style="background-color: red">
                            <br/>
                            <form method="post" action="{{route('taskDone')}}">
                                {{csrf_field()}}
                                <h6 style="color: green">Nabeel</h6>
                                <input hidden  value="{{$currentDate = \Carbon\Carbon::now()->format('d.m.Y')}}">
                                <input hidden name="date" value="{{$currentDate}}">
                                <input type="hidden" name="name" value="Nabeel">
                                <hr><br/>
                                {{--                                <input type="text" class="form-control add-task" placeholder="New Task...">--}}

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="weight" name="task1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        weight
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Treadmill"  name="task2">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Treadmill
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Dishwashing"  name="task3">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Dishwashing
                                    </label>
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-success">Done</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
            </tbody>
        </table>

    </div>
</div>


</body>
</html>


