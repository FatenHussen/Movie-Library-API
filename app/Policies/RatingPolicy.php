<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Rating;

class RatingPolicy
{
    public function isOwner(User $user, Rating $rating)
    {
        return $user->id === $rating->user_id;
    }

    public function isOwnerOrAdmin(User $user, Rating $rating)
    {
        return $user->id === $rating->user_id || $user->is_admin;
    }
}
