<?php

namespace App\Policies;

use App\Products;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function view(User $user, Products $products)
    {
        
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->hasAccess(['product.create']);
    }
    public function viewall(User $user)
    {
        //
        return $user->hasAccess(['product.viewall']);
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function update(User $user, Products $products)
    {
        return $user->hasAccess(['product.update']) or $user->id == $products->user_id;
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function delete(User $user, Products $products)
    {
        return $user->inRole('admin');
        //
    }
    public function publish(User $user)
    {
        return $user->hasAccess(['product.publish']);
    }

    public function draft(User $user)
    {
        return $user->inRole('admin');
    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function restore(User $user, Products $products)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function forceDelete(User $user, Products $products)
    {
        //
    }
}
