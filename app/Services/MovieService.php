<?php

namespace App\Services;

use App\Models\Movie;

class MovieService
{
    /**
     * Create a new movie.
     *
     * @param  array  $data
     * @return Movie
     */
    public function createMovie(array $data): Movie
    {
        return Movie::create($data);
    }

    /**
     * Update an existing movie.
     *
     * @param  Movie  $movie
     * @param  array  $data
     * @return bool
     */
    public function updateMovie(Movie $movie, array $data): bool
    {
        return $movie->update($data);
    }

    /**
     * Delete a movie.
     *
     * @param  Movie  $movie
     * @return bool|null
     * @throws \Exception
     */
    public function deleteMovie(Movie $movie): ?bool
    {
        return $movie->delete();
    }
    public function getAllMovies()
    {
        return Movie::all();
    }

    public function getMovieById($id)
    {
        return Movie::findOrFail($id);
    }
    public function getMovies($filters, $sort, $order, $perPage)
    {
        $query = Movie::query();

        // Filtering by genre
        if (isset($filters['genre'])) {
            $query->where('genre', $filters['genre']);
        }

        // Filtering by director
        if (isset($filters['director'])) {
            $query->where('director', $filters['director']);
        }

        // Sorting
        if ($sort && in_array($sort, ['release_year'])) {
            $order = $order === 'desc' ? 'desc' : 'asc'; // Default to ascending
            $query->orderBy($sort, $order);
        }

        // Pagination
        return $query->paginate($perPage);
    }
}
