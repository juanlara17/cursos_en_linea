<?php

namespace App\Models\Traits\Storage;

// use App\Models\QuestionMeta;

use App\Models\QuestionMeta;

trait QuestionStorage
{

    public function createModel($request)
    {

        $question = $this->create($request->only($this->creatable));

        $question->updateModalMetas($request);

        return $question;

    }

    public function updateModel($request)
    {

        $this->update($request->only($this->updatable));

        $this->updateModalMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, QuestionMeta::class, 'question_id')->updatePayload();

        return $this;

    }

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
