<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getPlayer(){
        return response()->json( Player::all(), 200);
    }

    public function getPlayerById($id){
        $player = Player::find($id);
        if(is_null($player)){
            return response()->json(['message'=>'player not found'], 404);
        }
        return response()->json( $player::find($id), 200);
    }

    public function addPlayer(Request $request){
        $player = Player::create($request->all());
        return  response($player, 201);
    }

    public function updatePlayer(Request $request, $id){
        $player = Player::find($id);
        if(is_null($player)){
            return response()->json(['message'=>'player not found'], 404);
        }
        $player->update($request->all());
        return response($player,200);
    }

    public function deletePlayer($id){
        $player = Player::find($id);
        if(is_null($player)){
            return response()->json(['message'=>'player not found'], 404);
        }
        $player->delete();
        return response()->json(null,204);
    }
}
