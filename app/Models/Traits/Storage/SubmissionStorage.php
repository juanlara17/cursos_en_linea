<?php

namespace App\Models\Traits\Storage;

// use App\Models\SubmissionMeta;

trait SubmissionStorage
{

    public function createModel($request)
    {

        $submission = $this->create($request->only($this->creatable));

        return $submission;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, SubmissionMeta::class, 'submission_id')->updatePayload();

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