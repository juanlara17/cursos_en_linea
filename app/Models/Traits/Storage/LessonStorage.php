<?php

namespace App\Models\Traits\Storage;

// use App\Models\LessonMeta;

trait LessonStorage
{

    public function createModel($request)
    {

        $lesson = $this->create($request->only($this->creatable));

        return $lesson;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, LessonMeta::class, 'lesson_id')->updatePayload();

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