<?php

namespace App\Http\Controllers;
use App\Videogame;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getVideogames() {
        $videogames = Videogame::all();

        return json_encode($videogames);
    }
    public function deleteVideogame($id) {
        $videogame = Videogame::findOrFail($id);
        $videogame -> delete();
        
        return json_encode($id);
    }
}
    