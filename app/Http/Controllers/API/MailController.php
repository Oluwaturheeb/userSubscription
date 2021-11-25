<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\MailJob;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class MailController extends Controller
{
    /**
     * $post - new post data
     * @return void
    */
    public static function sender ($post) {
        $users = User::where('website_id', $post->website_id)
        ->get(['name', 'email']);

        if (!$users->count()) return response()->json([
            'code' => 0,
            'message' => 'No user subscribe to this website!'
        ]);

        $users = $users->pluck('email', 'name');
        MailJob::dispatch($post, $users->all());
    }
}
