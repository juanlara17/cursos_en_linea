<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\AttemptRelations;
use App\Models\Traits\Storage\AttemptStorage;
use App\Models\Traits\Assignments\AttemptAssignment;
use App\Models\Traits\Operations\AttemptOperations;
use App\Models\Traits\Mutators\AttemptMutators;

class Attempt extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        AttemptRelations,
        AttemptStorage,
        AttemptAssignment,
        AttemptOperations,
        AttemptMutators;
        
    protected $fillable = [];

    protected $creatable = [];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [];

    public static $loadable_relations = [];

    public static $loadable_counts = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\AttemptFactory::new();
    }
    */

}