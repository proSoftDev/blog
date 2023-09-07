<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        if ($user->id != $post->user_id) {
            return $this->deny();
        }

        return $this->allow();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): Response
    {
        if ($user->id != $post->user_id) {
            return $this->deny();
        }

        return $this->allow();
    }
}
