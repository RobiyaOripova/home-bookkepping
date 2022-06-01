<style>
    body{
        background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);

    }
   div{
       text-align: center;
       margin-top:10rem;
   }
   h2{
       font-size:3rem;
   }
    a{
        text-decoration: none;
        font-size:2rem;
        color:#fff;
    }
</style>

<div >
    <h2>Welcome {{auth()->user()->name}}</h2>
    <a  href="accountings/create"><h3>Create accounting table</h3></a>

</div>
