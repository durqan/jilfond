<?php

namespace App\Http\Controllers;

use App\Models\PostsImages;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function home_page(array $args = [])
    {
        $posts = Posts::with('user', 'images')->get()->toArray();

        return view('home_page', ['args' => $args, 'posts' => $posts]);
    }

    public function addPost(Request $request)
    {
        $text = $request['text'];
        $images = $request['images'];
        $user = Auth::user();

        if (empty($text))
            return $this->home_page(['error' => "Вы не заполнили текстовое поле"]);

        $newPost = new Posts();
        $newPost->text = $text;
        $newPost->user_id = $user->id;
        $newPost->save();

        if (!empty($images)) {
            foreach ($images as $image) {

                if (!in_array($image->extension(), ['png', 'jpg', 'jpeg', 'svg'])) {
                    $newPost->delete();
                    return $this->home_page(['error' => "Не верный формат изображения " . $image->getClientOriginalName()]);
                }

                if (!$filename = Storage::disk('images')->put('', $image)) {
                    $newPost->delete();
                    return $this->home_page(['error' => "Ошибка загрузки файла " . $image->getClientOriginalName()]);
                }

                $newImage = new PostsImages();
                $newImage->post_id = $newPost->id;
                $newImage->user_id = $user->id;
                $newImage->filename = $filename;
                $newImage->save();
            }
        }
        return redirect()->route('home_page');
    }

    public function deletePost(Request $request)
    {
        Posts::destroy($request['id']);

        $images = PostsImages::where('post_id', $request['id'])->get();

        if (!empty($images)) {
            foreach ($images as $image) {
                Storage::disk('images')->delete($image->filename);
            }
            PostsImages::where('post_id', $request['id'])->delete();
        }

        return redirect()->route('home_page');
    }
}
