<?php

namespace App\Models\Traits\Storage;

// use App\Models\VideoMeta;

trait VideoStorage
{

    public function createModel($request)
    {

        $video = $this->create($request->only($this->creatable));

        return $video;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, VideoMeta::class, 'video_id')->updatePayload();

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