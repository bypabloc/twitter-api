<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Resources\V1\TweetCollection;

class TweetController extends Controller
{
    public function list()
    {
        return new TweetCollection(Tweet::with('createdBy')->latest()->paginate());
    }

    public function newTweet(Request $req)
    {
        $this->validateNewTweet($req);

        $text = $req->text;
        $user = $req->user();

        $tweet = new Tweet;
        $tweet->text = $text;
        $tweet->user_id = $user->id;
        $tweet->save();

        return response()->json([
            'data' => [
                'tweet' => $tweet,
            ],
        ]);
    }

    public function validateNewTweet(Request $req)
    {
        return $req->validate([
            'text' => 'required|max:250',
        ]);
    }
}
