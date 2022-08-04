<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
class TeamController extends Controller
{
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $team = Team::all();
    
            return view('team.index', compact('team'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('team.create');
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
                'name' => 'required',
                'location' => 'required',
                'trophies' => 'required',
                
            ]);
        
            Team::create($request->all());
         
            return redirect()->route('team.index')
                            ->with('success','Team created successfully.');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $team = Team::find($id);
            return view('team.show', compact('team'));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $team = Team::find($id);
            return view('team.edit',compact('team'));
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
                'name' => 'required',
                'location' => 'required',
                'trophies' => 'required',
            ]);
            //dd($request->all());
            $team = Team::find($id);
            $team->update($request->all());
        
            return redirect()->route('team.index')
                            ->with('success','Team updated successfully');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $team = Team::find($id);
            $team->destroy($id);
            return redirect()->route('team.index')
                            ->with('success','Team deleted successfully');
        }
    }
    
