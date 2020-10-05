<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <br><br><br>
    <h3>Ingreso de Usuario</h3>
      <form method="post" action="{{url('/insertar')}}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Usuario</label>
          <input type="text" class="form-control" name="nombre" id="exampleInputEmail1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" class="form-control" name="email" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contraseña</label>
          <input type="password" class="form-control" name="contraseña" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Persona</label>
          <select name="persona">
                @if(count($personas)>0)
                    @foreach($personas->all() as $person) 
                        <option value="{{$person->id}}">{{$person->Names}}</option>
                    @endforeach
                @endif
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
    <div class="container col-sm-6">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Contraseña</th>
            <th scope="col">ID Persona</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
        @if(count($usuarios)>0) 
            @foreach($usuarios->all() as $p)   
              <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->password}}</td>
                <td>{{$p->Person_id}}</td>
                <td>
                  <a class="badge badge-primary" href='{{url("/editar/{$p->id}")}}'>Editar</a>
                </td>
              </tr>  
            @endforeach
        @endif
    </div>
  </tbody>
</table>
</body>
</html>