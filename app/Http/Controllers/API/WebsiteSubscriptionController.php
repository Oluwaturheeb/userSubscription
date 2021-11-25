<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Websites;
use App\Models\UserSubscription;

class websiteSubscriptionController extends Controller
{
    public function index () {
        $getWebsites = Websites::paginate(20, ['name', 'id']);
        return response()->json($getWebsites->toArray());
    }

    public function subscribe (Request $r) {
        $r->validate([
            'user_id' => 'required|int',
            'website_id' => 'required|int'
        ]);

        $check = UserSubscription::where('user_id', $r->user_id)
        ->where('website_id', $r->website_id)
        ->get('id')->count();

        if ($check)  return response()->json([
            'code' => 0,
            'message' => 'User already subscribe to this website'
        ]);

        $check = UserSubscription::create($r->all());

        if ($check)  return response()->json([
            'code' => 1,
            'message' => 'User successfully subscribe to this website'
        ]);
    }
}
