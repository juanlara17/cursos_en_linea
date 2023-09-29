<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\NoteRelations;
use App\Models\Traits\Storage\NoteStorage;
use App\Models\Traits\Assignments\NoteAssignment;
use App\Models\Traits\Operations\NoteOperations;
use App\Models\Traits\Mutators\NoteMutators;

class Note extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        NoteRelations,
        NoteStorage,
        NoteAssignment,
        NoteOperations,
        NoteMutators;

    protected $fillable = ['title','content'];

    protected $creatable = ['title','content'];

    protected $updatable = ['title','content'];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [];

    public static $loadable_relations = [];

    public static $loadable_counts = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\NoteFactory::new();
    }
    */

}
