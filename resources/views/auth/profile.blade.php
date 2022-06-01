
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
<div class="container my-container">

    <h3>Create accounting table</h3>
    <div class="main">
        <form action="{{route("table-store")}}"method="post" class="form-group">
            @csrf
            <input class="form-control " type="date" id="date" name="date">

            <select name="type" id="my-select" class="form-select" aria-label="Default select example">
                <option selected>Type</option>
                <option class="doxod" value="Income">Income</option>
                <option class="rasxod" value="Consumption">Consumption</option>

            </select>
            <select name="categories" class="form-select" aria-label="Default select example">
                <option selected>Categories</option>
                <option class="wage" value="Wage">Wage</option>
                <option class="rental" value="Rental">Rental</option>
                <option class="bussiness" value="Bussiness">Bussiness</option>
                <option class="food" value="Food">Food</option>
                <option class="dress" value="Dress">Dress</option>
                <option class="skin" value="SkinCare">Skin Care Products</option>
                <option class="transport" value="Transport">Transport</option>
                <option class="mobile" value="MobileConnection">Mobile Connection</option>
                <option class="internet" value="Internet">Internet</option>
                <option class="travel" value="Travel">Travel</option>


            </select>

            <!-- <input class=form-control type="date" id="birthday" name="birthday">-->


            <input name="money" type="text" class="form-control money"  placeholder="Amount">

            <textarea name="comment" class="form-control" placeholder="Comment" rows="3"></textarea>


            <button  type="submit" class="btn btn-outline-secondary">Secondary</button>


        </form>
    </div>

</div>
</body>

</html>
