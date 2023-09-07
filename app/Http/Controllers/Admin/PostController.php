<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\Post\Contracts\CreatePost;
use App\Services\Post\Contracts\DeletePost;
use App\Services\Post\Contracts\RetrievePosts;
use App\Services\Post\Contracts\UpdatePost;
use App\Services\Post\Dto\CreatePostData;
use App\Services\Post\Dto\UpdatePostData;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    const URL = 'admin.posts.';

    const ROUTE = 'admin.posts.';

    /**
     * Display a listing of the resource.
     */
    public function index(RetrievePosts $getPosts): View
    {
        return view(static::URL.'index', ['posts' => $getPosts->handle()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(static::URL.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, CreatePost $createBlog): RedirectResponse
    {
        $createBlog->handle(CreatePostData::fromRequest($request));

        return redirect()
            ->route(static::ROUTE.'index')
            ->with('success', __('Успешно создано'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @throws AuthorizationException
     */
    public function edit(Post $post): View
    {
        $this->authorize('update', $post);

        return view(static::URL.'edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, UpdatePost $updateBlog): RedirectResponse
    {
        $updateBlog->handle($post, UpdatePostData::fromRequest($request));

        return redirect()
            ->route(static::ROUTE.'index')
            ->with('success', __('Успешно обновлено'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, DeletePost $deleteBlog): RedirectResponse
    {
        $deleteBlog->handle($post);

        return redirect()
            ->route(static::ROUTE.'index')
            ->with('success', __('Успешно удалено'));
    }
}
