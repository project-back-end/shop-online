<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddNewUserController extends Controller
{
    public function index()
    {
        return view('adduser');
    }
    public function adduser(Request $req ){

        $sername = $
        $data = array('post_id' => $post_ID);
        DB::table('view')->insert($data);

    }
}
