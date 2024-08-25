<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Services\RatingService;
use Illuminate\Http\JsonResponse;


class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id(); // Associate the rating with the authenticated user
        $rating = $this->ratingService->createRating($data);
        return response()->json($rating, 201);
    }

    public function update(Request $request, Rating $rating)
    {
        $this->authorize('isOwner', $rating); // Ensure only the owner can update
        $updatedRating = $this->ratingService->updateRating($rating, $request->all());
        return response()->json($updatedRating);
    }

    public function destroy(Rating $rating)
    {
        $this->authorize('isOwnerOrAdmin', $rating); // Admin or Owner can delete
        $this->ratingService->deleteRating($rating);
        return response()->json(null, 204);
    }

    public function index()
    {
        $ratings = $this->ratingService->getAllRatings();
        return response()->json($ratings);
    }

    public function getUserRatings($userId)
    {
        $ratings = $this->ratingService->getUserRatings($userId);
        return response()->json($ratings);
    }
    public function getAllRate(): JsonResponse
    {
        $rating = Rating::all();
        return response()->json($rating, 200);
    }

    public function getMovieRatings($movieId)
    {
        $ratings = $this->ratingService->getMovieRatings($movieId);
        return response()->json($ratings);
    }
}
