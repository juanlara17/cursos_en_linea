<?php

namespace App\Exports;

use App\Models\File;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FilesExports implements FromView
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
            ) . 'file', 
            [
                'files' => $this->getQuery(),
                'exportCols' => File::$export_cols
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(File::class, $this->data);

    }

}