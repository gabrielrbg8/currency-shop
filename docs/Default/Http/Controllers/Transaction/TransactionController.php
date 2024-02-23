<?php

namespace Docs\Default\Http\Controllers\Transaction;

use OpenApi\Annotations as OA;

class TransactionController
{
    /**
     * @OA\Post(
     *      tags={"Transactions"},
     *      path="/transactions",
     *      summary="Create a new transaction",
     *      @OA\RequestBody(
     *          description="Transaction data",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TransactionCreate"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/TransactionResponse")
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
    public function store()
    {
    }


    /**
     * @OA\Get(
     *      tags={"Transactions"},
     *      path="/transactions",
     *      summary="Get all transactions",
     *      @OA\Parameter(
     *          in="header",
     *          name="Authorization",
     *          description="Bearer Token",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          in="query",
     *          name="filter",
     *          description="Filter transactions. Use the format filter[field_name].",
     *          @OA\JsonContent(
     *              type="object",
     *              description="Filter fields",
     *              @OA\Property(property="field_name", type="string", enum={"total_amount", "amount", "from_currency", "to_currency"})
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/TransactionResource")
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
