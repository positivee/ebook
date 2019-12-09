<?php

namespace App\Model;

use App\Dto\Article\ArticleFetchInput;
use App\Dto\Article\ArticleOutputFactory;
use Illuminate\Support\Facades\DB;

//model do wyswietlania artykułów

class BookstoreShowArticle
{
    public function showAllArticles() : array {

          $allArticles= DB::table('articles')
                ->join('bookstores', 'bookstores.id', '=', 'articles.bookstore_id')
                ->select('articles.id','bookstore_id','articles.title', 'articles.content', 'articles.photo',
                    'articles.created_at', 'bookstores.name')
                ->orderBy('created_at', 'DESC')
                ->paginate(5);

          $articleOutputArray = [];

          foreach ($allArticles as $article) {
              $articleOutputArray[] = ArticleOutputFactory::createFromRow($article);
          }

          return $articleOutputArray;
    }

    public function showMyArticles(ArticleFetchInput $fetchInput):array {
        $allSelectedArticles = DB::table('articles')
            ->join('bookstores', 'bookstores.id', '=', 'articles.bookstore_id')
            ->select('articles.id','bookstore_id','articles.title', 'articles.content', 'articles.photo',
                'articles.created_at', 'bookstores.name')
            ->where('articles.bookstore_id', '=',  $fetchInput->getBookstore()->id)
            ->orderBy('articles.created_at', 'DESC')
            ->get();

        $articleOutputArray = [];

        foreach ($allSelectedArticles as $article) {
            $articleOutputArray[] = ArticleOutputFactory::createFromRow($article);
        }

        return $articleOutputArray;
    }

}
