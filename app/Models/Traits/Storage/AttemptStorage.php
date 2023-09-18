<?php

namespace App\Models\Traits\Storage;

// use App\Models\AttemptMeta;

trait AttemptStorage
{

    public function createModel($request)
    {

        $attempt = $this->create($request->only($this->creatable));

        return $attempt;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, AttemptMeta::class, 'attempt_id')->updatePayload();

        return $this;

    }
    */

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}