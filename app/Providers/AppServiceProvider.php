<?php

namespace App\Providers;

use App\Repositories\Eloquent\PostRepository;
use App\Repositories\PostRepositoryInterface;
use App\Rest\Transport\GuzzleTransport;
use App\Rest\Transport\TransportInterface;
use App\Services\Post\Contracts\CreatePost as CreatePostContract;
use App\Services\Post\Contracts\DeletePost as DeletePostContract;
use App\Services\Post\Contracts\RetrievePosts as GetPostsContract;
use App\Services\Post\Contracts\UpdatePost as UpdatePostContract;
use App\Services\Post\Contracts\FindPost as FindPostContract;
use App\Services\Post\Handlers\CreatePost;
use App\Services\Post\Handlers\DeletePost;
use App\Services\Post\Handlers\FindPost;
use App\Services\Post\Handlers\RetrievePosts;
use App\Services\Post\Handlers\UpdatePost;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Route;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        CreatePostContract::class => CreatePost::class,
        DeletePostContract::class => DeletePost::class,
        UpdatePostContract::class => UpdatePost::class,
        GetPostsContract::class => RetrievePosts::class,
        FindPostContract::class => FindPost::class,
    ];

    public array $bindings = [
        PostRepositoryInterface::class => PostRepository::class,
        TransportInterface::class => GuzzleTransport::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(FindPostContract $findPost): void
    {
        Paginator::defaultView('vendor.pagination.default');
        Paginator::defaultSimpleView('vendor.pagination.default');

        Route::bind('post', fn (string $value) => $findPost->handle($value));
    }
}
