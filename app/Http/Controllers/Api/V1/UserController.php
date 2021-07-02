<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Resources\V1\UserCollection;

class UserController extends Controller
{
    public function list()
    {
        return new UserCollection(User::latest()->paginate());
    }
}
