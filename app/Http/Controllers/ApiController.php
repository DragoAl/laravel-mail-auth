<?php

namespace App\Http\Controllers;

use App\Mail\videogameDelete;
use App\Videogame;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    public function getVideogames() {
        $videogames = Videogame::all();

        return json_encode($videogames);
    }
    public function deleteVideogame($id) {
        $videogame = Videogame::findOrFail($id);
        $videogame -> delete();

        Mail::to(Auth::user()) -> send(new videogameDelete($videogame));
        Mail::to('admin@mysite.com') -> send(new videogameDelete($videogame)); 
 
        
        return json_encode($id);
    }
}
    