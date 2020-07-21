<?php
namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait
{
    public function apiException($request, $exception) {
    
        if ($this->isModel($exception)) {
            return $this->ModelResponse($exception);
        }

        if ($this->isHttp($exception)) {
            return $this->HttpResponse($exception);
        }

        return parent::render($request, $exception);

    }
    public function isModel($exception) {
        return $exception instanceof ModelNotFoundException;
    }

    public function isHttp($exception) {
        return $exception instanceof NotFoundHttpException;
    }

    public function ModelResponse($exception) {
        return response()->json(
            [
            "errors" => 'Model not found'
            ], Response::HTTP_NOT_FOUND);
    }

    public function HttpResponse($excwption) {
        return response()->json(
            [
            "errors" => 'Route not found'
            ], Response::HTTP_NOT_FOUND);
    }
}