<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

trait ResourceResponseTrait
{
    protected function showMessage($message, $statusCode = 200)
    {
        return response()->json(['message' => $message], $statusCode);
    }

    protected function showOne($model, $statusCode = 200, $resource = null, $additional = [])
    {
        $resource = $resource ?? $this->getResource();
        $data = new $resource($model);

        if (!empty($additional)) {
            $data = array_merge($data->toArray(request()), $additional);
        }

        return response()->json($data, $statusCode);
    }

    protected function showAll(LengthAwarePaginator $paginator, $statusCode = 200, $resource = null, $additional = [])
    {
        $resource = $resource ?? $this->getResource(true);

        $modifiedContent = [
            'data' => $resource::collection($paginator->items()),
            'statusCode' => $statusCode,
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'total_pages' => $paginator->lastPage(),
            ],
            'links' => [
                'first' => $paginator->url(1),
                'last' => $paginator->url($paginator->lastPage()),
                'prev' => $paginator->previousPageUrl(),
                'next' => $paginator->nextPageUrl(),
            ],
        ];

        if (!empty($additional)) {
            $modifiedContent = array_merge($modifiedContent, $additional);
        }

        if ($paginator->isEmpty()) {
            return response()->json($modifiedContent, $statusCode);
        }

        return response()->json($modifiedContent, $statusCode);
    }

    protected function getResource()
    {
        $routeName = request()->route()->getName();
        $pos = strripos($routeName, '.');
        $modelSegment = substr($routeName, 0, $pos - 1);
        $modelSegments = explode('-', $modelSegment);
        $modelName = '';

        foreach ($modelSegments as $segment) {
            $modelName .= ucfirst($segment);
        }

        $resourceName = 'App\\Http\\Resources\\' . $modelName . '\\' . $modelName . 'Resource';

        return $resourceName;
    }
}
