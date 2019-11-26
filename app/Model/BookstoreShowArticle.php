<?php

namespace App\Model;

use App\Dto\ArticleOutputFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Article;


//model do wyswietlania artykułów

class BookstoreShowArticle
{
    public function showAllArticles() : array {

          $allArticles= DB::table('articles')
                ->join('bookstores', 'bookstores.id', '=', 'articles.bookstore_id')
                ->select('bookstore_id','articles.title', 'articles.content', 'articles.photo', 'articles.created_at', 'bookstores.name')
                ->orderBy('created_at', 'DESC')
                ->get();

          $articleOutputArray = [];

          foreach ($allArticles as $article) {
              $articleOutputArray[] = ArticleOutputFactory::createFromRow($article);
          }

          return $articleOutputArray;


    }
}
