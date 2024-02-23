<?php

namespace Docs\Default\Http\Controllers\Auth;

use OpenApi\Annotations as OA;

class AuthController
{

    /**
     * @OA\Post(
     *      tags={"Authentication"},
     *      path="/signup",
     *      summary="User signup",
     *      @OA\RequestBody(
     *          description="Signup request payload",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="password", type="string"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/UserResponse")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/Unprocessable")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="message",
     *                      type="string"
     *                  ),
     *                  example={"message": "Internal Error"}
     *              )
     *          )
     *      )
     * )
     */
    public function signup()
    {
    }

    /**
     * @OA\Post(
     *      tags={"Authentication"},
     *      path="/login",
     *      summary="User login",
     *      @OA\RequestBody(
     *          description="Login request payload",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="password", type="string"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/UserResponse")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/RequestException")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="message",
     *                      type="string"
     *                  ),
     *                  example={"message": "Internal Error"}
     *              )
     *          )
     *      )
     * )
     */
    public function login()
    {
    }
}