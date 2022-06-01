
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('mycss/main.css') }}">

    <title>Document</title>
</head>
<body>
<div class="create-table d-flex justify-content-around">
    <a  href="accountings/create">Create a new table</a>
    <a href="logout">Logout</a>
</div>
<div class="container">

    <table class="table">
        <thead class="thead-light">
        <tr>

            <th scope="col">Type</th>
            <th scope="col">Date</th>
            <th scope="col">Categories</th>
            <th scope="col">Money</th>
            <th scope="col">Total</th>
            <th scope="col">Comment</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accountings as $accounting)
            <tr>

                <td class="type ">{{$accounting->type}}</td>
                <td class="mydate">{{$accounting->date}}</td>
                <td >{{$accounting->categories}}</td>
                <td class="price">{{$accounting->money}}</td>
                <td class="total"></td>
                <td class="comment">{{$accounting->comment}} </td>
                <td><a href="{{route("table-edit",["accounting"=>$accounting->id])}}" class="btn"><i class="fas fa-edit"></i></a></td>
                <td>
                    <form action="{{route("table-delete",["accounting"=>$accounting->id])}}"method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{$accountings->links()}}
</div>
</body>
<script src="{{asset("Js/main.js")}}"></script>
<script src="https://kit.fontawesome.com/6b1870cd0b.js" crossorigin="anonymous"></script>
</html>

