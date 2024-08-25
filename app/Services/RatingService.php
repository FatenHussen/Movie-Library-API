<?php
namespace App\Services;

use App\Models\Movie;
use App\Models\Rating;

class RatingService
{
    public function createRating($data)
    {
        // البحث عن الفيلم بناءً على الاسم
        $movie = Movie::where('title', $data['movie_name'])->firstOrFail();

        $data['movie_id'] = $movie->id; // استخدام الـ ID الخاص بالفيلم
        unset($data['movie_name']); // إزالة اسم الفيلم من البيانات

        return Rating::create($data);
    }

    public function updateRating(Rating $rating, $data)
    {
        $rating->update($data);
        return $rating;
    }

    public function deleteRating(Rating $rating)
    {
        $rating->delete();
    }

    public function getAllRatings()
    {
        return Rating::all();
    }

    public function getUserRatings($userId)
    {
        return Rating::where('user_id', $userId)->get();
    }

    public function getMovieRatings($movieId)
    {
        return Rating::where('movie_id', $movieId)->get();
    }
}
