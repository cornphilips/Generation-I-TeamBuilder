<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Team;
use App\User;
use App\Pokemon;

class TEAMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all()->toArray();
        return view('team.index', compact('teams'));

        //$id = Auth::user()->id;
        //$teams = Team::all();
        //$selectedTeam = Auth::user()->id;
        //return view('team.index', compact('teams', 'selectedTeam'));
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
      $id = Auth::user()->id;
      $team = new Team([
        'user_id' => $id,
        'title' => $request->get('title'),
        'pokemon1' => $request->get('pokemon1'),
        'pokemon2' => $request->get('pokemon2'),
        'pokemon3' => $request->get('pokemon3'),
        'pokemon4' => $request->get('pokemon4'),
        'pokemon5' => $request->get('pokemon5'),
        'pokemon6' => $request->get('pokemon6')
      ]);

      $team->save();
      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


      return view('team.edit', compact('team','id'));
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
      $team = Team::find($id);

      $team->title    = $request->get('title');
      $team->pokemon1 = $request->get('pokemon1');
      $team->pokemon2 = $request->get('pokemon2');
      $team->pokemon3 = $request->get('pokemon3');
      $team->pokemon4 = $request->get('pokemon4');
      $team->pokemon5 = $request->get('pokemon5');
      $team->pokemon6 = $request->get('pokemon6');
      $team->save();

      /*
      $team->title = Input::get('title');
      $team->pokemon1 = Input::get('pokemon1');
      $team->pokemon2 = Input::get('pokemon2');
      $team->pokemon3 = Input::get('pokemon3');
      $team->pokemon4 = Input::get('pokemon4');
      $team->pokemon5 = Input::get('pokemon5');
      $team->pokemon6 = Input::get('pokemon6');
      $team->save();
      */
      return redirect('/team');
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
      $team->delete();

      return redirect('/');
    }

    public function getTeam($id) {
      $team = Team::find($id);
      $teams = Team::all()->toArray();
      $pokemon = Pokemon::all()->toArray();
      return view('/testui', compact('team' , 'teams', 'pokemon'));
    }


    public function addPokemon(Request $request, $id) {
      $team = Team::find($id);

      $index = $request->get('pokemonIndex');
      $action = $request->get('action');
      $teams = Team::all()->toArray();
      $pokemon = Pokemon::all()->toArray();
      //$name = $request->get('pokemon');
      if ($action == "delete") {
        if ($index == "poke1") {
          $team->pokemon1 = $request->get('pokemon');
        }
        if ($index == "poke2") {
          $team->pokemon2 = $request->get('pokemon');
        }
        if ($index == "poke3") {
          $team->pokemon3 = $request->get('pokemon');
        }
        if ($index == "poke4") {
          $team->pokemon4 = $request->get('pokemon');
        }
        if ($index == "poke5") {
          $team->pokemon5 = $request->get('pokemon');
        }
        if ($index == "poke6") {
          $team->pokemon6 = $request->get('pokemon');
        }
      }
      if ($action == "add") {
        if ($index == "poke1") {
          $team->pokemon1 = $request->get('pokemon');
        }
        if ($index == "poke2") {
          $team->pokemon2 = $request->get('pokemon');
        }
        if ($index == "poke3") {
          $team->pokemon3 = $request->get('pokemon');
        }
        if ($index == "poke4") {
          $team->pokemon4 = $request->get('pokemon');
        }
        if ($index == "poke5") {
          $team->pokemon5 = $request->get('pokemon');
        }
        if ($index == "poke6") {
          $team->pokemon6 = $request->get('pokemon');
        }
      }


      $team->save();
      return view('/testui', compact('team', 'teams', 'pokemon'));
    }

}
