<?php

namespace App\Http\Response;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait Factory
{

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function noContent()
    {
        return response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * 201
     * @param string $content
     * @return Response
     */
    protected function created($content = null)
    {
        return new Response($content, Response::HTTP_CREATED);
    }

    /**
     * 202
     * @return Response
     */
    protected function accepted()
    {
        return new Response('', Response::HTTP_ACCEPTED);
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
        $this->error($message, Response::HTTP_NOT_FOUND);
    }

    /**
     * Return a 400 bad request error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorBadRequest($message = 'Bad Request')
    {
        $this->error($message, Response::HTTP_BAD_REQUEST);
    }

    /**
     * Return a 403 forbidden error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorForbidden($message = 'Forbidden')
    {
        $this->error($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * Return a 500 internal server error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorInternal($message = 'Internal Error')
    {
        $this->error($message, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Return a 401 unauthorized error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        $this->error($message, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Return a 405 method not allowed error.
     * @param string $message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return void
     */
    public function errorMethodNotAllowed($message = 'Method Not Allowed')
    {
        $this->error($message, Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * @param string $message
     */
    protected function unprocesableEtity($message = '422 Unprocessable Entity')
    {
        $this->error($message, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
