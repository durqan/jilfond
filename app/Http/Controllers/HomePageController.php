<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function home_page(array $args = [])
    {
        $posts = Posts::with('user')->get()->toArray();

        return view('home_page', ['args' => $args, 'posts' => $posts]);
    }

    public function addPost(Request $request)
    {
        $text = $request['text'];
        $images = $request['images'];
        $user = Auth::user();

        if (empty($text))
            return $this->home_page(['error' => "Вы не заполнили текстовое поле"]);

        $post =
            [
                'text' => $text,
                'user_id' => $user->id
            ];

        Posts::insert($post);

        return $this->home_page(['success_alert' => "Пост успешно оформлен"]);
    }

    public function deletePost(Request $request)
    {
        Posts::destroy($request['id']);
        Images::where('post_id', $request['id'])->delete();

        return redirect()->route('home_page');
    }
}
