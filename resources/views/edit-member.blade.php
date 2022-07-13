<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container form-inline">
    <h2>Add Gym Member</h2>
    <form action="{{route('updateMember',['id'=>$memberVar->id])}}" method="post" autocomplete="off">
        @if(session()->has('success'))
            <div class="alert alert-success">

                <strong>Success!</strong> {{session('success')}}
            </div>
        @endif
        {{csrf_field()}}
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$memberVar->name}}">
            <label>Roll #:</label>
            <input type="number" class="form-control" placeholder="Enter Roll Number" name="roll_num" value="{{$memberVar->roll_num}}">
            {{--            <label>Occupation</label>--}}

            {{--            <select class="form-control" name="occupation">--}}
            {{--                <option selected>Open this select menu</option>--}}
            {{--                <option value="student">Student</option>--}}
            {{--                <option value="job">job</option>--}}
            {{--                <option value="bussiness">bussinss</option>--}}
            {{--            </select>--}}
            {{--            <input type="text" class="form-control" placeholder="Enter Occupation" name="occupation">--}}

        </div>

        <br><br>
{{--        <div class="form-group">--}}
{{--            <label>Time:</label>--}}
{{--            <select class="form-control" name="time" >--}}
{{--                <option selected value="{{$memberVar->time}}">{{$memberVar->time}}</option>--}}
{{--                <option value="8-9">8-9</option>--}}
{{--                <option value="9-10">9-10</option>--}}
{{--                <option value="10-11">10-11</option>--}}
{{--                <option value="11-12">11-12</option>--}}
{{--            </select>--}}
{{--            --}}{{--            <input type="text" class="form-control" placeholder="Enter Time" name="time">--}}
{{--            <label>Fee Date</label>--}}
{{--            <input type="date" class="form-control" placeholder="Enter Fee Date" name="fee_date" value="{{$memberVar->fee_date}}">--}}
{{--            --}}{{--            <label>Occupation</label>--}}
{{--            --}}{{--            <input type="text" class="form-control" placeholder="Enter Occupation" name="occupation">--}}

{{--        </div>--}}


        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

</body>
</html>
