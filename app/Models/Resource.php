<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ResourceRelations;
use App\Models\Traits\Storage\ResourceStorage;
use App\Models\Traits\Assignments\ResourceAssignment;
use App\Models\Traits\Operations\ResourceOperations;
use App\Models\Traits\Mutators\ResourceMutators;

class Resource extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ResourceRelations,
        ResourceStorage,
        ResourceAssignment,
        ResourceOperations,
        ResourceMutators;
        
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
        return \App\Database\Factories\ResourceFactory::new();
    }
    */

}
