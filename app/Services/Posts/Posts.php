<?php

namespace App\Services\Posts;

use App\Models\Post;
use App\Services\Utils;

class Posts
{

    public function getHome() {
        $raw = Post::select(['id','title', 'slug', 'image', 'created_at'])->where('language', app()->getLocale())->orderBy('created_at', 'DESC')->orderBy('updated_at', 'DESC')->limit(4)->get();
        $collection = [];
        foreach($raw as $key) {
            $collection[] = $this->buildArticle($key);
        }
        return json_encode([
            'articles' =>
                $collection
        ], true);
    }

    private function buildArticle($raw)
    {
        return array(
            'id' => $raw->id,
            'category' => $raw->category,
            'title' => $raw->title,
            'published' => $raw->created_at,
            'image' => [
                'width' => 1200,
                'height' => 675,
                'url' => config('app.url') . '/storage/' . Utils::Images($raw->image)
            ],
            'type' => 'BLOG',
            'url' => route('news.show', [$raw->id, $raw->slug]),
            'analytics' => [
                'name' => 'home-masthead-news',
                'placement' => 'slot:0 - type:blog - id:'.$raw->id.' || ' . $raw->title
            ]
        );
    }
}
