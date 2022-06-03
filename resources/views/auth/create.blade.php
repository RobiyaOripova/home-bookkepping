
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.3.2/css/searchBuilder.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.0.0/css/searchPanes.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css"/>

</head>

    <link rel="stylesheet" type="text/css" href="{{ asset('mycss/main.css') }}">

    <title>Document</title>
</head>
<body>
<div class="create-table d-flex justify-content-around">
    <a  href="accountings/create">Create a new table</a>
    <a href="logout">Logout</a>
</div>

<div class="container">
    <table class="table accounting" id="accounting-table">
        <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Date</th>
            <th>Categories</th>
            <th>Money</th>
            <th>Comment</th>
            <th>Action</th>
          <!--  <th scope="col">Update</th>
            <th scope="col">Delete</th>-->
        </tr>
        </thead>

    </table>
</div>

</body>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.3.2/js/dataTables.searchBuilder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.0/js/dataTables.searchPanes.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
<script>



    $(document).ready(function () {
    $('#accounting-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('datatables.data') }}',
            columns: [
                {data: 'id',name:'id'},
                {data: 'date',name:'date'},
                {data: 'type',name:'type'},
                {data: 'categories',name:'categories'},
                {data: 'money',name:'money'},
                {data: 'comment',name:'comment'},
                {data: 'action', name: 'action', orderable: false, searchable: false}



            ],


        });

    });
</script >
<script src="{{asset("Js/main.js")}}"></script>
<script src="https://kit.fontawesome.com/6b1870cd0b.js" crossorigin="anonymous"></script>

</html>

