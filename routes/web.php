<?php

use App\Models\Video;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Phone;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get('/poly', function() {

    // $user = User::find(1);

    // $post = Post::find(1);

    // $post->comments()->create([
    // 'user_id' => $user->id,
    // 'body' => "lorem ipsum serene mobilia lolita gone"
    // ]);


    
    // $video = Video::find(1);

    // $video->comments()->create([
    //     'user_id' => 2,
    //     'body' => "zu zu zu zu"
    // ]);



    // $user = User::find(3);

    // $user->comments()->create([
    //     'user_id' => 3,
    //     'body' => "ni sa re ga"
    // ]);

    // return $user->comments;




    // $post = Post::find(1);

    // $post->comments()->create([
    //     'user_id' => 2,
    //     'body' => "ni ni ni"
    // ]);
    
    // return $post->comments;




    // $video = Video::find(1);

    // return $video->comment;



    // $user = User::find(3);

    // return $user->comment;


    // $user= User::find(2);

    // return $user->phone;


    // $comment = Comment::find(6);

    // return $comment->commentable;


    #many to many polymorphism code:

    // $post = Post::find(3); 
       
    // $tag = Tag::create([
    //     'post_id' => $post->id,
    //     'name' => "studies"
    // ]);

    // $post->tags()->create([
    //     'post_id' => $post->id,
    //     'name' => "laracasts"
    // ]);

    // return  $post->tags;

//    $post = Post::has('tags')->get();
    

        // $post = Post::find(3);

        // $post->tags()->create([
        //     'post_id' => $post->id,
        //     'name' => "computers"
        // ]);

        // return $post->tags;

        // $tag = Tag::find(5);

        // return $tag->posts;



        // Polymorphic relation query: whereHasMorph 

        // This query will show the body of the second row whose type is Video and body starts with Minsara

        // return $comments  = Comment::whereHasMorph(
        //     'commentable' , 
        //     ['App\Models\Video', 'App\Models\Post'],
        //     function(Builder $query) {
        //             $query->where('body', 'like', 'Dheevara%');
        //     })->get();


        // Polymorphic relation query: whereDoesntHaveMorph

            //This query will check video column in comment table where body does not start with 'abc';


        // return $comments = Comment::whereDoesntHaveMorph(
        //     'commentable',
        //     ['App\Models\Video'],
        //     function(Builder $query) {
        //         $query->where('body', 'like', 'abc%');
        //     })->get();



        // Polymorphic relationship query: whereHasMorph with $type variable 


        // return $comments = Comment::whereHasMorph(
        //     'commentable', 
        //     ['App\Models\Video', 'App\Models\Post'],
        //     function(Builder $query, $type){
        //         $query->where('body', 'like', 'lorem%');
            

        //     if($type === 'App\Models\Video')
        //     {
        //         $query->orWhere('body', 'like', 'Minsara%');
        //     }
        // })->get();




        //Polymorphic relationship query : using '*' instead of defining the classes individually

        // return $comments = Comment::whereHasMorph(
        //     'commentable',
        //         '*',
        //         function($query){
        //             $query->where('body','like', 'lorem%');
        //         })->get();





        //Count with polymorphic relationship query : 

            return $comments = Comment::query()
                ->with(['commentable' => function (MorphTo $morphTo){
                    $morphTo->morphwithCount([
                        // Video::class => ['comments'],
                        Post::class => ['comments']
                    ]);
                }])->get();
});
