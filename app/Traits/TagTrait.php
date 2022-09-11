<?php


namespace App\Traits;

use App\Models\Tag;
use Illuminate\Support\Str;

trait TagTrait
{
    public function storeOrUpdate($request, $post)
    {
        $tag_ids = [];
        foreach ($request->tags ?? [] as $key => $tag) {
            $_tag = Tag::firstOrCreate([
                'name'        => trim($tag),
            ], [
                'slug'        => Str::slug(trim($tag)),
            ]);

            $tag_ids[] = $_tag->id;
        }
        $post->tags()->sync($tag_ids);
    }
}
