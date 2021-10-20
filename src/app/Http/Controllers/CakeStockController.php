<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\CakeStockListRequest;
use App\Http\Requests\CakeStockCreateRequest;
use App\Http\Resources\CakeStockResource;
use App\Services\CakeStockService;
use App\Transformers\CakeStockTransformer;

class CakeStockController extends Controller
{

    /**
     * @var \App\Services\CakeStockService $service
     */
    private $service;

    public function __construct(CakeStockService $service) 
    {
        $this->service = $service;
    }

    public function list(CakeStockListRequest $request) 
    {
        $data = $request->validated();
        $collection = $this->service->list($data);
        return CakeStockResource::collection($collection);
    }

    public function get($id) {
        $data = $this->service->get($id);
        $collection = App::make(CakeStockTransformer::class)->transform($data);
        return response()->json([
            'data' => $collection
        ]);
    }

    public function delete($id) {
        $this->service->delete($id);
        return response()->json([
            'msg' => "Estoque deletado com sucesso!",
        ]);
    }

    public function create(CakeStockCreateRequest $request) {
        $data = $request->validated();
        $stock = $this->service->create($data);
        return response()->json([
            'msg' => "Estoque cadastrado com sucesso!",
            'data' => App::make(CakeStockTransformer::class)->transform($stock)
        ]);
    }

    public function update($id, CakeStockCreateRequest $request) {
        $data = $request->validated();
        $stock = $this->service->update($id, $data);
        return response()->json([
            'msg' => "Estoque atualizado com sucesso!",
            'data' => App::make(CakeStockTransformer::class)->transform($stock)
        ]);
    }
    
}