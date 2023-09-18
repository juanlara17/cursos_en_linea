<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadReply\PoliciesRequest;
use App\Http\Requests\ThreadReply\PolicyRequest;
use App\Http\Requests\ThreadReply\IndexRequest;
use App\Http\Requests\ThreadReply\ShowRequest;
use App\Http\Requests\ThreadReply\CreateRequest;
use App\Http\Requests\ThreadReply\UpdateRequest;
use App\Http\Requests\ThreadReply\DeleteRequest;
use App\Http\Requests\ThreadReply\RestoreRequest;
use App\Http\Requests\ThreadReply\ForceDeleteRequest;
use App\Http\Requests\ThreadReply\ExportRequest;

class ThreadReplyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function policies(PoliciesRequest $request)
    {
        return $request->handle($this);   
    }

    public function policy(PolicyRequest $request)
    {
        return $request->handle();
    }

    public function index(IndexRequest $request)
    {
        return $request->handle();   
    }

    public function show(ShowRequest $request)
    {
        return $request->handle();   
    }

    public function create(CreateRequest $request)
    {
        return $request->handle();   
    }

    public function update(UpdateRequest $request)
    {
        return $request->handle();   
    }

    public function delete(DeleteRequest $request)
    {
        return $request->handle();   
    }

    public function restore(RestoreRequest $request)
    {
        return $request->handle();   
    }

    public function forceDelete(ForceDeleteRequest $request)
    {
        return $request->handle();   
    }

    public function export(ExportRequest $request)
    {
        return $request->handle();   
    }

}
