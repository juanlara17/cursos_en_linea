<?php

namespace App\Exports;

use App\Models\Quiz;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QuizzesExports implements FromView
{

    protected $data;

    public function __construct( array $data) 
    {

        $this->data = $data;

    }

    public function view(): View
    {
        return view(
            config(
                'app.excel_view', 
                'app::excel.'
            ) . 'quiz', 
            [
                'quizzes' => $this->getQuery(),
                'exportCols' => Quiz::$export_cols
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Quiz::class, $this->data);

    }

}