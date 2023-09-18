<?php

namespace App\Http\Controllers;

use App\Http\Requests\Path\PoliciesRequest;
use App\Http\Requests\Path\PolicyRequest;
use App\Http\Requests\Path\IndexRequest;
use App\Http\Requests\Path\ShowRequest;
use App\Http\Requests\Path\CreateRequest;
use App\Http\Requests\Path\UpdateRequest;
use App\Http\Requests\Path\DeleteRequest;
use App\Http\Requests\Path\RestoreRequest;
use App\Http\Requests\Path\ForceDeleteRequest;
use App\Http\Requests\Path\ExportRequest;

class PathController extends Controller
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
