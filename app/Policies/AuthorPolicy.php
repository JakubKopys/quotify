<?php

namespace App\Policies;

use App\User;
use App\Author;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create authors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->admin;
    }

    public function new(User $user)
    {
        return $user->admin;
    }


    /**
     * Determine whether the user can update the author.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function update(User $user, Author $author)
    {
        return $user->admin;
    }

    /**
     * Determine whether the user can delete the author.
     *
     * @param  \App\User  $user
     * @param  \App\Author  $author
     * @return mixed
     */
    public function delete(User $user, Author $author)
    {
        return $user->admin;
    }
}
