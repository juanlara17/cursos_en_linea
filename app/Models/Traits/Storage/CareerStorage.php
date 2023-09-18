<?php

namespace App\Models\Traits\Storage;

// use App\Models\CareerMeta;

trait CareerStorage
{

    public function createModel($request)
    {

        $career = $this->create($request->only($this->creatable));

        return $career;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, CareerMeta::class, 'career_id')->updatePayload();

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