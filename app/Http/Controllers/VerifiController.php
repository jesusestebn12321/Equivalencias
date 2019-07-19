<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\User;
class VerifiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('verifi')->with('message','Usuario no Verificado');
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code','=',$code)->first();


        if (! $user){
            return redirect('/');
        }
        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/home')->with('notification', 'Has confirmado correctamente tu correo!');
    }
}
