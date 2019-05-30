<?php

namespace App\Policies;

use App\User;
use App\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;
use DB;
class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function view(User $user)
    {
        
        if($user->email == "vipinkumar@gmail.com")
        return true;
        else 
        return false;
    }

    /**
     * Determine whether the user can create blogs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->email == "vipinkumar@gmail.com")
        return true;
        else 
        return false;
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {       
        $role_data = DB::table('assign')
        ->where('user_id' , $user->id)->where('blog_id' , $blog->id)->count();
        if ($role_data >0 )
            return true;
        else
            return false;
    }

    

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
   

    public function delete(User $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can restore the blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function restore(User $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the blog.
     *
     * @param  \App\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function forceDelete(User $user, Blog $blog)
    {
        //
    }
}
