<?php

namespace App\Exports;

use App\Models\Section;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SectionsExports implements FromView
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
            ) . 'section', 
            [
                'sections' => $this->getQuery(),
                'exportCols' => Section::$export_cols
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Section::class, $this->data);

    }

}