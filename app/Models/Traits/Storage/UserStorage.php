<?php

namespace App\Models\Traits\Storage;

// use App\Models\UserMeta;

trait UserStorage
{

    public function createModel($request)
    {

        $user = $this->create($request->only($this->creatable));

        return $user;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, UserMeta::class, 'user_id')->updatePayload();

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