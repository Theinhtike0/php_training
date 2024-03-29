@extends('players.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LARAVEL CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('players.create') }}"> Create New Player</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Team_id</th>
            <th>Player</th>
            <th>Number</th>
            <th>Foot</th>
            <th>Salary</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($players as $player)
        <tr>
            <td>{{ $player->id }}</td>
            <td>{{ $player->Team_id }}</td>
            <td>{{ $player->Player }}</td>
            <td>{{ $player->Number }}</td>
            <td>{{ $player->Foot }}</td>
            <td>{{ $player->Salary }}</td>
            <td>
                <form action="{{ route('players.destroy',$player->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('players.show',$player->id) }}">Show</a>
    
                <a class="btn btn-primary" href="{{ route('players.edit',$player->id) }}">Edit</a>
                
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection