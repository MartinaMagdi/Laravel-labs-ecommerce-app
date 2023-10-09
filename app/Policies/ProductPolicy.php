<?php

namespace App\Policies;

use App\Models\product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function forbidden_update_delete(User $user, product $product) {
        return $user->id === $product->creator_id ? Response::allow() : Response::deny(`You aren't the product creator`);
    }
}
