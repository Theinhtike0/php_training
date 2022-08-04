<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Player;
class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $players = Player::all();

        return view('players.index', compact('players'));
    }
   
    public function join(){
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Team_id' => 'required',
            'Player' => 'required',
            'Number' => 'required',
            'Foot' => 'required',
            'Salary' => 'required',
        ]);
    
        Player::create($request->all());
     
        return redirect()->route('players.index')
                        ->with('success','Player created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        $join = DB::table('players')
        ->join('team', 'team.id', "=", 'players.Team_id')// joining the contacts table , where user_id and contact_user_id are same
        ->select('players.*', 'team.name')
        ->get();

        return $join;
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
        return view('players.edit',compact('player'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Team_id' => 'required',
            'Player' => 'required',
            'Number' => 'required',
            'Foot' => 'required',
            'Salary' => 'required',
        ]);
        //dd($request->all());
        $player = Player::find($id);
        $player->update($request->all());
    
        return redirect()->route('players.index')
                        ->with('success','Player updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->destroy($id);
        return redirect()->route('players.index')
                        ->with('success','Player deleted successfully');
    }
}
