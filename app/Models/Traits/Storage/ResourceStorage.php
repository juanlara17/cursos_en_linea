<?php

namespace App\Models\Traits\Storage;

// use App\Models\ResourceMeta;

trait ResourceStorage
{

    public function createModel($request)
    {

        $resource = $this->create($request->only($this->creatable));

        return $resource;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ResourceMeta::class, 'resource_id')->updatePayload();

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