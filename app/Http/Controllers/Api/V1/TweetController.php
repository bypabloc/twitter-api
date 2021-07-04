<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\V1\TweetCollection;

class TweetController extends Controller
{
    public function list()
    {
        return new TweetCollection(
            Tweet::select([
                'tweets.text',
                // DB::raw('DATE_FORMAT(tweets.created_at,"%Y/%m/%d %H:%i:%S") as created_at'),
                DB::raw("DATE_FORMAT(created_at, '%Y/%m/%d %H:%i:%S') AS created_at"),
                DB::raw('
                    (
                        SELECT 
                            JSON_OBJECT(
                                "name", u.name,
                                "email", u.email,
                                "nickname", u.nickname
                            )
                        FROM users AS u
                        WHERE u.id=tweets.user_id
                    ) AS created_by
                '),
            ])
            ->latest()
            ->paginate()
        );
    }

    public function newTweet(Request $req)
    {
        $errors = [];

        $text = isset($req->text) ? $req->text : null;

        if (empty($text)) {
            $errors = [...$errors, 'No indicó un texto'];
        }

        if (!empty($errors)) {
            return response()->json([
                'errors' => $errors,
            ], 422);
        }

        $text = $req->text;
        $user = $req->user();

        $tweet = new Tweet;
        $tweet->text = $text;
        $tweet->user_id = $user->id;
        $tweet->save();

        $queryResult = Tweet::select([
            'tweets.text',
            // DB::raw('DATE_FORMAT(tweets.created_at,"%Y/%m/%d %H:%i:%S") as created_at'),
            DB::raw("DATE_FORMAT(created_at, '%Y/%m/%d %H:%i:%S') AS created_at"),
            DB::raw('
                (
                    SELECT 
                        JSON_OBJECT(
                            "name", u.name,
                            "email", u.email,
                            "nickname", u.nickname
                        )
                    FROM users AS u
                    WHERE u.id=tweets.user_id
                ) AS created_by
            '),
        ])
        ->where('id',$tweet->id)
        ->get()
        ->first();

        $queryResult['created_by'] = json_decode($queryResult->created_by, true);

        return response()->json([
            'data' => $queryResult,
        ]);
    }
}
