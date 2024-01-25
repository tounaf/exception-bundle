<?php

namespace Tounaf\ExceptionBundle\Handler\Generic;

use Tounaf\ExceptionBundle\Exception\Exception;
use Tounaf\ExceptionBundle\Exception\ExceptionHandlerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Tounaf\ExceptionBundle\Exception\TounafException;

class GeneraleExceptionHandler implements ExceptionHandlerInterface
{
    /**
     * @param  \Throwable $exception
     * @return array
     */
    public function handleException(\Throwable $throwable): Response
    {
        return new JsonResponse(
            array(
            'message' => $throwable->getMessage(),
            'http_message' => 'Internal error',
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            )
        );
    }

    /**
     * @param  \Exception $exception
     * @return bool
     */
    public function supportsException(\Throwable $throwable): bool
    {
        return $throwable instanceof TounafException;
    }

}
