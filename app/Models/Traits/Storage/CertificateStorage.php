<?php

namespace App\Models\Traits\Storage;

// use App\Models\CertificateMeta;

trait CertificateStorage
{

    public function createModel($request)
    {

        $certificate = $this->create($request->only($this->creatable));

        return $certificate;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, CertificateMeta::class, 'certificate_id')->updatePayload();

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