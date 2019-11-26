<?php

namespace App\Model;



use App\Dto\CreateArticle;
use App\Article;

class BookstoreAddArticle {

    public function add(CreateArticle $createArticle) {

        $article = new Article();

        $article->bookstore_id = $createArticle->getBookstore()->id;
        $article->title = $createArticle->getTitle();
        $article->content = $createArticle->getContent();
        $article->photo = $createArticle->getPhoto();


        $article->save();
    }

}
