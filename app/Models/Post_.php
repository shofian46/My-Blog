<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Shofian",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis nam quam reprehenderit, voluptates facilis commodi ipsam consequuntur aperiam maiores, consectetur amet aliquam cum velit iure cupiditate eos vitae. Atque nisi temporibus iste eaque voluptates saepe est velit, beatae laudantium? Ipsum, nihil animi! Corrupti excepturi, sequi libero quos dolore veritatis aut quasi! Veniam aut est dolore, dignissimos consectetur minus iste error obcaecati molestias laboriosam ad voluptatibus atque dolores aperiam ab aliquam quam illo impedit aspernatur sed autem eaque perferendis incidunt! Recusandae."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Toro",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde hic autem excepturi voluptates inventore quidem voluptas magni libero fuga, reiciendis asperiores sint dolorem illum possimus vitae at iusto. Culpa quibusdam corporis commodi enim! Recusandae ipsum culpa quod commodi quia perferendis sit, beatae assumenda a deserunt itaque omnis aliquid dicta aut nostrum vel officiis illum perspiciatis inventore mollitia corrupti. Maiores delectus at, assumenda ea labore deleniti voluptatum perferendis, illo magni ad perspiciatis reiciendis sint maxime deserunt enim esse, pariatur laboriosam dolorum hic nostrum quas? Quis exercitationem aut cupiditate, a architecto ea quia beatae odit ad eos dignissimos non natus autem esse."
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
