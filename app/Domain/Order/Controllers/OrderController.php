<?php

declare(strict_types=1);

namespace App\Domain\Order\Controllers;

use App\Domain\Order\Repositories\OrderRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $repository;

    protected array $validators = [
        'product_id' => 'required|integer',
        'sales_id' => 'required|string',
        'amount' => 'required|integer',

    ];

    /**
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     * tags={"Pedidos - Listar Todos Pedidos"},
     * path="/api/pedidos/listar",
     * summary="Listar Todos Pedidos",
     * description="Listar Todos Pedidos",
     * security={
     * {"bearer":{}}},
     * @OA\Response(
     * response=200,
     * description="Success"
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function index(Request $request)
    {
        return parent::index($request);
    }

    /**
     * @OA\Post(
     * tags={"Pedidos - Cadastrar Pedido"},
     * path="/api/pedidos/cadastrar",
     * summary="Cadastrar Pedido",
     * description="Cadastrar Pedido",
     * security={
     * {"bearer":{}}},
     * @OA\RequestBody(
     * required = true,
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * example=	{"product_id": 20,"sales_id": 5220,"amount": "937"},
     * )
     * )
     * ),
     * @OA\Response(
     * response=201,
     * description="Success"
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function store(Request $request)
    {
        return parent::store($request);
    }

    /**
     * @OA\Put(
     * tags={"Pedidos - Atualiza Pedido"},
     * path="/api/pedidos/atualizar/{id}",
     * summary="Pedidos - Atualiza Pedido",
     * description="Pedidos - Atualiza Pedido",
     * security={
     * {"bearer": {}}},
     * @OA\Parameter(
     * name="id",
     * description="Id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\RequestBody(
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * example=	{"product_id": 20,"sales_id": 5220,"amount": "937"},
     * )
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Success",
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    /**
     * @OA\Delete (
     * tags={"Pedidos - Deletar Pedido"},
     * path="/api/pedidos/deletar/{id}",
     * summary="Deletar Pedido",
     * description="Pedidos - Deletar Pedido",
     * security={
     * {"bearer": {}}},
     * @OA\Parameter(
     * name="id",
     * description="Id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=204,
     * description="Success",
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function destroy(int $id)
    {
        return parent::destroy($id);
    }
}
