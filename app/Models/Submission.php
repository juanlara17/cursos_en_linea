<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\SubmissionRelations;
use App\Models\Traits\Storage\SubmissionStorage;
use App\Models\Traits\Assignments\SubmissionAssignment;
use App\Models\Traits\Operations\SubmissionOperations;
use App\Models\Traits\Mutators\SubmissionMutators;

class Submission extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        SubmissionRelations,
        SubmissionStorage,
        SubmissionAssignment,
        SubmissionOperations,
        SubmissionMutators;

    protected $fillable = ['content', 'submission_file', 'grade', 'grade_override', 'feedback', 'feedback_file', 'homework_id', 'enrollment_id'];

    protected $creatable = ['content', 'submission_file', 'grade', 'grade_override', 'feedback', 'feedback_file', 'homework_id', 'enrollment_id'];

    protected $updatable = ['content', 'submission_file', 'grade', 'grade_override', 'feedback', 'feedback_file'];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [];

    public static $loadable_relations = [];

    public static $loadable_counts = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\SubmissionFactory::new();
    }
    */

}
