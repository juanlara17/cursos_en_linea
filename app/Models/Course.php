<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\CourseRelations;
use App\Models\Traits\Storage\CourseStorage;
use App\Models\Traits\Assignments\CourseAssignment;
use App\Models\Traits\Operations\CourseOperations;
use App\Models\Traits\Mutators\CourseMutators;

class Course extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        CourseRelations,
        CourseStorage,
        CourseAssignment,
        CourseOperations,
        CourseMutators;

    protected $fillable = ['name', 'status', 'payload'];

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
        return \App\Database\Factories\CourseFactory::new();
    }
    */

}
