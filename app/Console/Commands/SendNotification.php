<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\WelcomeAgain;
use App\Article;
use App\Notifications\BlockArticles;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:block-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Block articles when it has more dislikes than likes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $articles = Article::with('user')->with('reviews')->get();

        $articles->each(function ($article) {
            if($article->reviews->dislikes() > $article->reviews->likes()){
                optional($article->user)->notify(new BlockArticles($article));
            }
        });


    }
}
