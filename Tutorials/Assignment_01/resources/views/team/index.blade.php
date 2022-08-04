@extends('team.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LARAVEL CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('team.create') }}"> Create New Team</a>
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
            <th>Name</th>
            <th>Location</th>
            <th>Trophies</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($team as $team)
        <tr>
            <td>{{ $team->id }}</td>
            <td>{{ $team->name }}</td>
            <td>{{ $team->location }}</td>
            <td>{{ $team->trophies }}</td>
            
            <td>
                <form action="{{ route('team.destroy',$team->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('team.show',$team->id) }}">Show</a>
    
                <a class="btn btn-primary" href="{{ route('team.edit',$team->id) }}">Edit</a>
                
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection