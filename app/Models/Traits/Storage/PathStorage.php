<?php

namespace App\Models\Traits\Storage;

// use App\Models\PathMeta;

trait PathStorage
{

    public function createModel($request)
    {

        $path = $this->create($request->only($this->creatable));

        return $path;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, PathMeta::class, 'path_id')->updatePayload();

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