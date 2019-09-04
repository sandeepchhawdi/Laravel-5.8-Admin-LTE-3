<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->can('view videos');
    }

    /**
     * Determine whether the user can create videos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create videos');
    }

    /**
     * Determine whether the user can update the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->can('update videos');
    }

    /**
     * Determine whether the user can delete the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->can('delete videos');
    }

    /**
     * Determine whether the user can restore the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->can('delete videos');
    }

    /**
     * Determine whether the user can permanently delete the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->can('delete videos');
    }
}
