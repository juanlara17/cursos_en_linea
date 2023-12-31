<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ThreadReplyRelations;
use App\Models\Traits\Storage\ThreadReplyStorage;
use App\Models\Traits\Assignments\ThreadReplyAssignment;
use App\Models\Traits\Operations\ThreadReplyOperations;
use App\Models\Traits\Mutators\ThreadReplyMutators;

class ThreadReply extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ThreadReplyRelations,
        ThreadReplyStorage,
        ThreadReplyAssignment,
        ThreadReplyOperations,
        ThreadReplyMutators;

    protected $fillable = ['content', 'thread_id', 'user_id'];

    protected $creatable = ['content', 'thread_id', 'user_id'];

    protected $updatable = ['content'];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [];

    public static $loadable_relations = [];

    public static $loadable_counts = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\ThreadReplyFactory::new();
    }
    */

}
