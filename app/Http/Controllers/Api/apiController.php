<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return response()->json($movies);
    }
}
