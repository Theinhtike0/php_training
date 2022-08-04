<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todolist</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js" integrity="sha512-XFd1m0eHgU1F05yOmuzEklFHtiacLVbtdBufAyZwFR0zfcq7vc6iJuxerGPyVFOXlPGgM8Uhem9gwzMI8SJ5uw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body class="bg-info">
  <div class="container w-30 mt-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3>To Do List</h3>
        <form action="{{ route('store') }}" method="POST" autocomplete="off">
          @csrf
          <div class="input-group">
            <input type="text" name="content" class="form-control" placeholder="Add your new todo">
            <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
          </div>
        </form>
        @if (count($todolists))
        <ul class="list-group list-group-flush mt-md-n3">

          @foreach ($todolists as $todolist)

          <li class="list-group-item">
            <form action="{{ route('destroy',$todolist->id) }}" method="POST">
            {{ $todolist->content}}  
            @csrf
              @method('delete')
              <button type="submit" class="btn btn-linl btn-sm float-end"><i class="fas fa-trash"></i></button>
            </form>
          </li>
          @endforeach
        </ul>
        @else
        <p class="text-center mt-3">No Tasks</p>
        @endif
      </div>
      @if (count($todolists))
      <div class="card-footer">
        You Have {{ count($todolists)}} pending tasks
      </div>
      @else
      @endif
    </div>
  </div>
</body>
</html>