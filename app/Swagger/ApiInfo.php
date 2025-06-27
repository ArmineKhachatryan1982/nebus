<?php

namespace App\Swagger;
/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API Documentation"
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Local API Server"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="api_key",
 *     type="apiKey",
 *     in="header",
 *     name="X-API-KEY",
 *     description="API ключ для доступа"
 * )
 */
class ApiInfo {}
