<?php

namespace App\Models\Traits\Operations;

trait CourseOperations
{

    public function buildPayload()
    {

        return [
            'description' => $this->meta('description'),
            'data' => [
                'youtube' => $this->meta('youtube'),
                'vimeo' => $this->meta('vimeo'),
            ]
        ];

    }

    public function updatePayload()
    {

        $this->payload = $this->buildPayload();

        return $this->save();

    }

}
