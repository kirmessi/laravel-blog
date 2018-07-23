<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


   protected function GetPermission($user,$p_id)
{
  foreach ($user->roles as $role) {

            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id ) {
                    return true;
                }
            }
           
        }
        return false;


}


    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\admin  $model
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Model\user\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->GetPermission($user,7);
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\admin  $model
     * @return mixed
     */
    public function update(admin $user)
    {
       return $this->GetPermission($user,8);
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\admin  $model
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->GetPermission($user,9);
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\admin  $model
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\admin  $model
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }
}
