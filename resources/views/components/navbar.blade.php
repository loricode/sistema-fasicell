<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Fasicell</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home">Producto <span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
      <form class="form-inline my-2 my-lg-0" action="logout" method="POST" >
         @csrf
         @method('put')
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</button>
      </form>
    </div>
  </nav>