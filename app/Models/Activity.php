<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ActivityRelations;
use App\Models\Traits\Storage\ActivityStorage;
use App\Models\Traits\Assignments\ActivityAssignment;
use App\Models\Traits\Operations\ActivityOperations;
use App\Models\Traits\Mutators\ActivityMutators;

class Activity extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ActivityRelations,
        ActivityStorage,
        ActivityAssignment,
        ActivityOperations,
        ActivityMutators;

    protected $fillable = ['name', 'type', 'status', 'weight', 'order', 'lesson_id', 'activitiable_id', 'activitiable_type'];

    protected $creatable = ['name', 'type', 'status', 'weight', 'lesson_id', 'activitiable_id', 'activitiable_type'];

    protected $updatable = ['name', 'type', 'status', 'weight'];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [];

    public static $loadable_relations = [];

    public static $loadable_counts = [];
    public $allowed_type = [
        'quiz',
        'homework',
    ];

    public $allowed_status = [
        'public',
        'draft'
    ];

}
