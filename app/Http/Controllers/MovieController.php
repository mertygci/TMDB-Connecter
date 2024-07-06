<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
class MovieController extends Controller
{
    protected MovieService $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }


    public function index(): View
    {
        $movies = $this->movieService->getAllMovies();
        return view('movies.index', compact('movies'));
    }


    public function show($id): View|RedirectResponse
    {
        $movie = $this->movieService->getMovieById($id);
        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Movie not found');
        }
        return view('movies.show', compact('movie'));
    }
}
