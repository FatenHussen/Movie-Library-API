<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\MovieService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\MovieResource;

class MovieController extends Controller
{
    protected $movieService;

    // Constructor to inject MovieService
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    // Index method to handle listing, filtering, sorting, and pagination of movies
    public function index(Request $request): JsonResponse
    {
        $query = Movie::query();
        
        // Filter movies by genre if provided in the request
        if ($request->has('genre')) {
            $query->where('genre', $request->query('genre'));
        }
        
        // Filter movies by director if provided in the request
        if ($request->has('director')) {
            $query->where('director', $request->query('director'));
        }
        
      
        // Sort movies by release year in the specified order (asc or desc)
        $sortOrder = $request->query('order', 'asc');
        if (in_array($sortOrder, ['asc', 'desc'])) {
            $query->orderBy('release_year', $sortOrder);
        } else {
            // Return error if the sort order is invalid
            return response()->json(['error' => 'Invalid sort order. Use "asc" or "desc".'], 400);
        }

        // Apply pagination to the results
        $perPage = $request->query('per_page', 10);
        $movies = $query->paginate($perPage);

        // Return the paginated and filtered movies as a JSON response
        return response()->json(MovieResource::collection($movies));
    }

    // Method to store a new movie
    public function store(MovieRequest $request): JsonResponse
    {
        $movie = $this->movieService->createMovie($request->validated());
        return response()->json(new MovieResource($movie), 201);
    }

    // Method to show details of a specific movie
    public function show(Movie $movie): JsonResponse
    {
        return response()->json(new MovieResource($movie));
    }

    // Method to update an existing movie
    public function update(MovieRequest $request, Movie $movie): JsonResponse
    {
        $this->movieService->updateMovie($movie, $request->validated());
        return response()->json(new MovieResource($movie));
    }

    // Method to delete a movie
    public function destroy(Movie $movie): JsonResponse
    {
        $this->movieService->deleteMovie($movie);
        return response()->json(['message' => 'Movie deleted successfully'], 200);
    }
    
}
