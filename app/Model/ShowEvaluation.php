<?php


namespace App\Model;


use App\Dto\Evaluation\EvaluationOutputFactory;
use Illuminate\Support\Facades\DB;

class ShowEvaluation
{
    public function showAllEvaluations($id) : array {

        //zwraca recenzje dla wybranej ksiązki

        $allEvaluations= DB::table('evaluations')
            ->join('books', 'books.id', '=', 'evaluations.book_id')
            ->join('users', 'users.id', '=', 'evaluations.user_id')
            ->select('evaluations.user_id','evaluations.book_id','evaluations.title','evaluations.content','evaluations.evaluation', 'evaluations.created_at')
            ->where('books.id', '=', $id)
            ->orderBy('evaluations.evaluation', 'DESC')
            ->get();

        $evaluationOutputArray = [];

        foreach ($allEvaluations as $evaluation) {
            $evaluationOutputArray[] = EvaluationOutputFactory::createFromRow($evaluation);
        }



        return $evaluationOutputArray;
    }



}
