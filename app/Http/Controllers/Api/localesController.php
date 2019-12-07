<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Local;
use App\Comida;

class localesController extends Controller
{
    public function index(){
        $Comidas = Comida::all();

        return response()->json($Comidas,200);
    }
}