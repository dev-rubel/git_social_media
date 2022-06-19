<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonAttachPostRequest;
use App\Http\Resources\FollowResource;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Get the feed for the currently logged in person.
     *
     * @return \App\Http\Resources\PostResource
     */
    public function feed()
    {
        $post = auth()->user()->posts()->latest()->get();

        return PostResource::collection($post);
    }

    /**
     * Logged in person publishes a post.
     *
     * @param  App\Http\Requests\PersonAttachPostRequest
     * @return \App\Http\Resources\PostResource
     */
    public function attachPost(PersonAttachPostRequest $request)
    {
        $post = auth()->user()->posts()->create([
            'body' => $request->post_content
        ]);

        return PostResource::make($post);
    }


    /**
     * Purpose: Logged in person will follow another person of given id
     *
     * @param  User $person
     * @return App\Http\Resources\FollowResource
     */
    public function follow($person)
    {
        $followExists = auth()->user()->follows()->whereLabelId($person->id)->whereLabel('user')->exists();
        if($followExists) {
            return response()->json(['message' => 'Already follow this persion.'], 403);
        }

        $follow = auth()->user()->follows()->create([
            'label_id' => $person->id,
            'label' => 'user',
        ]);
        return FollowResource::make($follow);
    }
}
