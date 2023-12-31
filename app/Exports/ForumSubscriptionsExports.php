<?php

namespace App\Exports;

use App\Models\ForumSubscription;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ForumSubscriptionsExports implements FromView
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
            ) . 'forum_subscription', 
            [
                'forum_subscriptions' => $this->getQuery(),
                'exportCols' => ForumSubscription::$export_cols
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(ForumSubscription::class, $this->data);

    }

}