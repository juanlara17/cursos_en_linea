<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\LessonRelations;
use App\Models\Traits\Storage\LessonStorage;
use App\Models\Traits\Assignments\LessonAssignment;
use App\Models\Traits\Operations\LessonOperations;
use App\Models\Traits\Mutators\LessonMutators;

class Lesson extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        LessonRelations,
        LessonStorage,
        LessonAssignment,
        LessonOperations,
        LessonMutators;

    protected $fillable = ['name', 'order', 'section_id'];

    protected $creatable = ['name', 'order', 'section_id'];

    protected $updatable = ['name', 'order'];

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
        return \App\Database\Factories\LessonFactory::new();
    }
    */

}
