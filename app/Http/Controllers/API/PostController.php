<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\API\MailController;
use Illuminate\Contracts\Validation\Validator;

class postController extends Controller
{
    //

    /**
     * $website_id
     * $post_title
     * $post_description
     * $post_content
     * 
     * @return json data
    */

    public function create (Request $r) {
        // validation 
        
        if (!$r->has(['website_id', 'post_title', 'post_description', 'post_content'])) return response()->json([
            'code' => 0,
            'message' => 'Request missing required fields'
        ]);

        $r->validate([
            'website_id' => 'required|int',
            'post_title' => 'required|unique:posts',
            'post_description' => 'required',
            'post_content' => 'required'
        ]);

        $post = Post::create($r->all());
        MailController::sender($post);

        if ($post) return response()->json([
            'code' => 1,
            'message' => 'Post has been created!'
        ]);
    }

    protected function failedValidation(Validator $validator){
        $errors = $validator->errors();

        return response()->json([
            'code' => 0,
            'message' => $errors->messages()
        ], 422);
    }
}
