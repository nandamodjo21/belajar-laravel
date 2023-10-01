<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post_
{
    static $blog = [
        [
            "judul" => "Post pertama",
            "slug" => "judul-post-pertama",
            "author" => "Jefmodjo",
            "body" => "
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel fugit harum, dolorum enim laboriosam porro voluptate sint totam? Esse eius minus similique, dolore temporibus maiores molestiae. Corrupti aspernatur eligendi rem nemo, aliquam corporis exercitationem labore tempore laudantium odio officiis sapiente sunt, at possimus aut laboriosam, quidem asperiores fugiat explicabo quas."
        ],
        [
            "judul" => "Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Linahmad",
            "body" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem eos et omnis aliquid blanditiis! Aperiam dolores consequatur accusantium, commodi illo provident culpa pariatur minus in ad harum atque quos error consectetur eveniet temporibus dolorum! Laudantium, numquam tenetur enim blanditiis ipsum doloremque minus placeat nam dolorem necessitatibus cupiditate explicabo voluptas iusto qui illo totam porro consequuntur ea rerum nemo. Nobis quidem itaque repudiandae, officiis iusto tempora modi facilis accusantium inventore nam, quia quas necessitatibus fugiat ut quo laborum nesciunt? Laboriosam nisi soluta, debitis fuga dolore eligendi illum inventore corrupti voluptatem quae fugit nam pariatur ab! Dolores odio corporis atque sed eaque."
        ]
        ];

        public static function all(){
            return collect(self::$blog);
        }
        public static function find($slug){
            $posts = static::all();
           

            return $posts->firstWhere('slug',$slug);
        }
}