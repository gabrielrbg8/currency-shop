<?php

namespace Docs\Default\Http\Controllers\Currency;

use OpenApi\Annotations as OA;

class CurrencyController
{
    /**
     * @OA\Get(
     *      tags={"Currency"},
     *      path="/currency",
     *      summary="Get all currencies",
     *      @OA\Parameter(
     *          in="header",
     *          name="Authorization",
     *          description="Bearer Token",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/CurrencyResponse")
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
    public function index()
    {
    }
}
