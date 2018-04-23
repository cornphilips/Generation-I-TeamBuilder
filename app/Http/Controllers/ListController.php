<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\User;
use App\Quotation;

class ListController extends Controller
{

  public function index() {
    $users = User::all()->toArray();

    return view('welcome', compact('users'));
  }

    public function show()
    {
       $users = DB::table('users')->get();
       $teams = DB::table('teams')->get();

       return view('welcome', compact('users', 'teams'));
    }

    public function edit($id)
    {
        //$users = users::find($id);
        $users = User::find($id);

        return view('layouts.edit', compact('users'));
    }

    public function update(Request $request, $id)
        {
            // validate
            // read more on validation at http://laravel.com/docs/validation

            // process the login
                $users = User::find($id);
                $users->name       = $request->get('name');
                $users->email      = $request->get('email');
                $users->admin      = $request->get('admin');
                $users->save();

                // redirect
                //Session::flash('message', 'Successfully updated user!');
                return redirect('/');

        }




    public function destroy($id){

      //$report = $id;

      $rsltDelRec = User::find($id);
      $rsltDelRec->delete();
      return redirect('/');

    }

    


}
