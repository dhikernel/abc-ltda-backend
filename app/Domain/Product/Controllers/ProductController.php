<?php

declare(strict_types=1);

namespace App\Domain\Product\Controllers;

use App\Domain\Product\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;

    protected array $validators = [
        'name' => 'required|string|max:255',
        'price' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
        'description' => 'required|string',
    ];

    /**
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     * tags={"Produto - Listar Todos Produtos"},
     * path="/api/produtos/listar",
     * summary="Listar Todos Produtos",
     * description="Listar Todos Produtos",
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
     * tags={"Produto - Cadastra Produto"},
     * path="/api/produtos/cadastrar",
     * summary="Cadastrar Produto",
     * description="cadastrar Produto",
     * security={
     * {"bearer":{}}},
     * @OA\RequestBody(
     * required = true,
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * example=	{"name": "Celular 1","price": 11.50,"description": "Unde quae et id optio quia. Cumque ut ad ex exercitationem necessitatibus quia. Harum ut sequi possimus."},
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
     * tags={"Produto - Atualizar Produto"},
     * path="/api/produtos/atualizar/{id}",
     * summary="Atualiza Produto",
     * description="Atualiza Produto",
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
     * example=	{"name": "Celular 1","price": 11.50,"description": "Unde quae et id optio quia. Cumque ut ad ex exercitationem necessitatibus quia. Harum ut sequi possimus."},
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
     * tags={"Produto - Deletar Produto"},
     * path="/api/produtos/deletar/{id}",
     * summary="Delete Record",
     * description="Deletar Produto",
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
