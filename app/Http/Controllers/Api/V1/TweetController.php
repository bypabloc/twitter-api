<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

use App\Http\Resources\V1\TweetCollection;

class TweetController extends Controller
{
    public function list()
    {
        return new TweetCollection(Tweet::latest()->paginate());
    }
}
