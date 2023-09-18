<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\EnrollmentRelations;
use App\Models\Traits\Storage\EnrollmentStorage;
use App\Models\Traits\Assignments\EnrollmentAssignment;
use App\Models\Traits\Operations\EnrollmentOperations;
use App\Models\Traits\Mutators\EnrollmentMutators;

class Enrollment extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        EnrollmentRelations,
        EnrollmentStorage,
        EnrollmentAssignment,
        EnrollmentOperations,
        EnrollmentMutators;
        
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
        return \App\Database\Factories\EnrollmentFactory::new();
    }
    */

}