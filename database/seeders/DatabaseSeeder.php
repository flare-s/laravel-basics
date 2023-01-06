<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create(['name' => 'Personal', 'slug' => "personal"]);
        $work = Category::create(['name' => 'Work', 'slug' => "work"]);
        $life = Category::create(['name' => 'Life', 'slug' => "life"]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $workPost = Post::create(['title' => 'Work post', 'slug' => 'work-post', 'excerpt' => "It's a long post about work things...", 'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem, velit sapiente, deserunt voluptatibus cupiditate nobis, praesentium dicta voluptate hic magni ipsam temporibus consequuntur qui porro. Provident ab repudiandae perferendis? Id eum voluptatem illo natus cum corrupti quis nam eaque, possimus ad voluptatum saepe inventore. Mollitia modi veritatis quia officiis facere similique quo rem reprehenderit earum esse eius odio debitis asperiores tempore et accusantium, odit ut unde error recusandae vitae exercitationem! Sed dolore fuga corporis officia dolorum dignissimos iusto, reiciendis laborum nihil repellendus, voluptate excepturi doloremque animi debitis eaque mollitia sapiente id nesciunt cumque tempore dolor tenetur a illum? Iusto ab nobis, nostrum eum, nisi maiores quas, exercitationem provident facere sunt est nihil earum. Fugit consequatur amet cupiditate! Id odio sed doloremque porro repellat, autem assumenda iusto facere nihil, nam vel hic quam iste ipsam omnis deleniti numquam enim iure at quidem optio vitae corporis. Recusandae inventore ratione aliquam molestiae a.', 'category_id' => $work->id, 'user_id' => $user->id]);

        $personalPost = Post::create(['title' => 'Personal post', 'slug' => 'personal-post', 'excerpt' => "It's a long post about personal things...", 'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem, velit sapiente, deserunt voluptatibus cupiditate nobis, praesentium dicta voluptate hic magni ipsam temporibus consequuntur qui porro. Provident ab repudiandae perferendis? Id eum voluptatem illo natus cum corrupti quis nam eaque, possimus ad voluptatum saepe inventore. Mollitia modi veritatis quia officiis facere similique quo rem reprehenderit earum esse eius odio debitis asperiores tempore et accusantium, odit ut unde error recusandae vitae exercitationem! Sed dolore fuga corporis officia dolorum dignissimos iusto, reiciendis laborum nihil repellendus, voluptate excepturi doloremque animi debitis eaque mollitia sapiente id nesciunt cumque tempore dolor tenetur a illum? Iusto ab nobis, nostrum eum, nisi maiores quas, exercitationem provident facere sunt est nihil earum. Fugit consequatur amet cupiditate! Id odio sed doloremque porro repellat, autem assumenda iusto facere nihil, nam vel hic quam iste ipsam omnis deleniti numquam enim iure at quidem optio vitae corporis. Recusandae inventore ratione aliquam molestiae a.', 'category_id' => $personal->id, 'user_id' => $user->id]);
    }
}
