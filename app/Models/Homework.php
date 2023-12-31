<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\HomeworkRelations;
use App\Models\Traits\Storage\HomeworkStorage;
use App\Models\Traits\Assignments\HomeworkAssignment;
use App\Models\Traits\Operations\HomeworkOperations;
use App\Models\Traits\Mutators\HomeworkMutators;

class Homework extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        HomeworkRelations,
        HomeworkStorage,
        HomeworkAssignment,
        HomeworkOperations,
        HomeworkMutators;

    protected $fillable = ['title','type','payload'];

    protected $creatable = ['title','type','payload'];

    protected $updatable = ['title','type','payload'];

    protected $casts = [
        'payload' => 'json',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [];

    public static $loadable_relations = [];

    public static $loadable_counts = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\HomeworkFactory::new();
    }
    */

}
