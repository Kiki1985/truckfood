<?php

namespace App\Policies;

use App\Truck;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TruckPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Truck  $truck
     * @return mixed
     */
    public function update(User $user, Truck $truck)
    {
        return $user->id == $truck->user_id;
    }
}
