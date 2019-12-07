<?php


namespace App\Model;

use App\Dto\Evaluation\CreateEvaluation;
use App\Evaluation;

class AddEvaluation
{
    public function add(CreateEvaluation $createEvaluation)
    {

        $evaluation = new Evaluation();

        $evaluation->title = $createEvaluation->getTitle();
        $evaluation->content = $createEvaluation->getContent();
        $evaluation->evaluation = $createEvaluation->getEvaluation();
        $evaluation->book_id = $createEvaluation->getBook()->id;
        $evaluation->user_id = $createEvaluation->getUser()->id;

        $evaluation->save();
    }
}