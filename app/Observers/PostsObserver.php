<?php

namespace App\Observers;

use App\Models\Posts;
use Illuminate\Support\Str;

class PostsObserver
{
    /**
     * Handle the Posts "created" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function creating(Posts $posts)
    {
        $posts->slug = Str::slug($posts->content);
    }
  
    /**
     * Handle the Food "created" event.
     *
     * @param  \App\Models\Food  $food
     * @return void
     */
    public function created(Posts $posts)
    {
        $posts->user_id = $posts->id;
        $posts->save();
    }

    /**
     * Handle the Posts "updated" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function updated(Posts $posts)
    {
        //
    }

    /**
     * Handle the Posts "deleted" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function deleted(Posts $posts)
    {
        //
    }

    /**
     * Handle the Posts "restored" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function restored(Posts $posts)
    {
        //
    }

    /**
     * Handle the Posts "force deleted" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function forceDeleted(Posts $posts)
    {
        //
    }
}
