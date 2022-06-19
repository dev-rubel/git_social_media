<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageAttachPostRequest;
use App\Http\Requests\PageCreateRequest;
use App\Http\Resources\FollowResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\PostResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     *  Logged in person create a page
     *
     * @param App\Http\Requests\PageCreateRequest
     * @return \App\Http\Resources\PageResource
     */
    public function create(PageCreateRequest $request)
    {
        $page = auth()->user()->pages()->create([
            'name' => $request->page_name
        ]);

        return PageResource::make($page);
    }

    /**
     * Logged in person publishes a post to a page owned by him/her
     *
     * @param App\Http\Requests\PageAttachPostRequest, Page $page
     * @return \App\Http\Resources\PostResource
     */
    public function attachPost(PageAttachPostRequest $request, $page)
    {
        auth()->user()->pages()->findOrFail($page->id);

        $post = $page->posts()->create([
            'body' => $request->post_content
        ]);

        return PostResource::make($post);
    }

    /**
     * Logged in person will follow another person of given id
     *
     * @param  Page $page
     * @return App\Http\Resources\FollowResource
     */
    public function follow($page)
    {
        $followExists = auth()->user()->follows()->whereLabelId($page->id)->whereLabel('page')->exists();
        if($followExists) {
            return response()->json(['message' => 'Already follow this page.'], 403);
        }

        $follow = auth()->user()->follows()->create([
            'label_id' => $page->id,
            'label' => 'page',
        ]);
        return FollowResource::make($follow);
    }
}
