<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\QuizRelations;
use App\Models\Traits\Storage\QuizStorage;
use App\Models\Traits\Assignments\QuizAssignment;
use App\Models\Traits\Operations\QuizOperations;
use App\Models\Traits\Mutators\QuizMutators;

class Quiz extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        QuizRelations,
        QuizStorage,
        QuizAssignment,
        QuizOperations,
        QuizMutators;

    protected $fillable = ['title', 'version', 'payload', 'attempts_id'];

    protected $creatable = ['title', 'version', 'payload', 'attempts_id'];

    protected $updatable = ['title', 'version', 'payload'];

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
        return \App\Database\Factories\QuizFactory::new();
    }
    */

}
