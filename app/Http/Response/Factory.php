<?php

namespace App\Http\Response;

use Symfony\Component\HttpKernel\Exception\HttpException;

trait Factory
{

    public function noContent()
    {
        return response('', 204);
    }

    /**
     * Return an error response.
     * @param string $message
     * @param int    $statusCode
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function error($message, $statusCode)
    {
        throw new HttpException($statusCode, $message);
    }

    /**
     * Return a 404 not found error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorNotFound($message = 'Not Found')
    {
        $this->error($message, 404);
    }

    /**
     * Return a 400 bad request error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorBadRequest($message = 'Bad Request')
    {
        $this->error($message, 400);
    }

    /**
     * Return a 403 forbidden error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorForbidden($message = 'Forbidden')
    {
        $this->error($message, 403);
    }

    /**
     * Return a 500 internal server error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorInternal($message = 'Internal Error')
    {
        $this->error($message, 500);
    }

    /**
     * Return a 401 unauthorized error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        $this->error($message, 401);
    }

    /**
     * Return a 405 method not allowed error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorMethodNotAllowed($message = 'Method Not Allowed')
    {
        $this->error($message, 405);
    }
}
