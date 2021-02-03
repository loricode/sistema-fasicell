<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  </head>
<body>
  @include('components/navbar')

<div class="row" >
    <div class="col-md-3 ml-2 mt-4 "   id="navbar-example2" >
      <div class="card ">
        <form action="sale" method="POST">
          @csrf
        <div class="input-group mb-3">
          <input 
             type="text" 
             name="codigo"
             class="form-control"
             autofocus placeholder="Codigo"
             aria-label="Codigo" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-info">Aceptar</button>
          </form>
          </div>
        </div>
        <ul class="list-group list-group-flush" data-spy="scroll" data-target="#navbar-example2" >
          @php
             $suma = 0;
             $cantidad = 0;
          @endphp

            @foreach ($pivotes as $item)
             <li class="list-group-item">{{$item->name}}
               @php
                  $cantidad = $cantidad + 1;
                  $suma = $suma + $item->price;  
               @endphp
                 <h5>{{$item->price}}</h5>
                 <div class="input-group-append">
                  <a href="home/{{$item->id}}" class="btn btn-danger">X</a>
            </li>
          @endforeach

          <h6 class="mt-1"> <span class="mr-2"> Cantidad: {{$cantidad}}</span> Total: {{$suma}}  </h6>
        
         <form  action="charge" method="POST">
         @csrf
         
         <div class="input-group mb-3">
          @if ($cantidad > 0)
         <input 
             type="text" 
             name="total"
             class="form-control"
             value="{{$suma}}">
         <input 
             hidden
             type="text" 
             name="quantity"
             class="form-control"
             value="{{$cantidad}}">
            <div class="input-group-append">
             
              <button class="btn btn-success"> $ cobrar</button></div>
              @endif 
          
        </form>
   
          </div>
        </ul>
      </div>
    </div>


    <div class="col-md-8 ">
      <div class="container p-2" style="margin-top:20px;" > 
  
        <table id="table_id" class="table table-striped" >
          <thead>
            <tr>
              <th scope="col">Codigo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Precio Tecnico</th>
              <th scope="col">Precio Publico</th>
              <th scope="col">Cantidad</th>
            </tr>   
          </thead>
          <tbody>
           @foreach ($products as $item)
            <tr>
              <td>{{$item->code}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->price}}</td>
              <td>{{$item->price_technical}}</td>
              <td>{{$item->price_public}}</td>
              <td>{{$item->quantity}}</td>
            </tr>
               
           @endforeach
          </tbody>
        </table>
          
      </div>

    </div>
</div>

<h3 class="float-right mr-5">Ganancia $:{{$total}}</h3>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>

<script>
  $(document).ready( function () {
      $('#table_id').DataTable( {
        "lengthMenu":[ 5, 10, 15, 20, 25 ],
        "language": {
            "lengthMenu":  "Filas _MENU_ ",
            "zeroRecords": "Nothing found - sorry",
            "info": "pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",    
            "search": "Buscar:",
            "paginate": {
             "next": "Siguiente",
             "previous":"Anterior"
             }      
        }   
    });
  } );
</script>
