<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * Determine whether the admin can view the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can create posts.
     *
     * @param  \App\Model\user\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
       return $this->GetPermission($user,4);
    }

    public function tag(admin $user)
    {
       return $this->GetPermission($user,11);
    }

    public function category(admin $user)
    {
       return $this->GetPermission($user,12);
    }


    public function publish(admin $user)
    {
       return $this->GetPermission($user,10);
    }

    /**
     * Determine whether the admin can update the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->GetPermission($user,5);
    }

    /**
     * Determine whether the admin can delete the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->GetPermission($user,6);
    }

    /**
     * Determine whether the admin can restore the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the post.
     *
     * @param  \App\Model\user\admin  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }
}


