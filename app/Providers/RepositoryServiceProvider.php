<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GroupRepository::class, \App\Repositories\GroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\IconRepository::class, \App\Repositories\IconRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NotificationRepository::class, \App\Repositories\NotificationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserGroupRepository::class, \App\Repositories\UserGroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VoteRepository::class, \App\Repositories\VoteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\JoinRequestsRepository::class, \App\Repositories\JoinRequestsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SupportRepository::class, \App\Repositories\SupportRepositoryEloquent::class);
        //:end-bindings:
    }
}
