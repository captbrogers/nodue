<?php

namespace OCA\Nodue\Exceptions;

use Closure;
use OCA\Nodue\Exceptions\NotFoundException;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;

trait ErrorsTrait
{
    protected function handleNotFound(Closure $callback)
    {
        try {
            return new DataResponse($callback());
        } catch (NotFoundException $e) {
            $message = ['message' => $e->getMessage()];
            return new DataResponse($message, Http::STATUS_NOT_FOUND);
        }
    }
}
