<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

use App\Models\Activity;

trait LessonRelations
{

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

}
