<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\CakeListRequest;
use App\Http\Requests\CakeCreateRequest;
use App\Http\Resources\CakeResource;
use App\Services\CakeService;
use App\Transformers\CakeTransformer;

class CakeController extends Controller
{

    /**
     * @var \App\Services\CakeService $service
     */
    private $service;

    public function __construct(CakeService $service) 
    {
        $this->service = $service;
    }

    public function list(CakeListRequest $request) 
    {
        $data = $request->validated();
        $collection = $this->service->list($data);
        return CakeResource::collection($collection);
    }

    public function get($id) {
        $data = $this->service->get($id);
        $collection = App::make(CakeTransformer::class)->transform($data);
        return response()->json([
            'data' => $collection
        ]);
    }

    public function delete($id) {
        $this->service->delete($id);
        return response()->json([
            'msg' => "Bolo deletado com sucesso!",
        ]);
    }

    public function create(CakeCreateRequest $request) {
        $data = $request->validated();
        $cake = $this->service->create($data);
        return response()->json([
            'msg' => "Bolo cadastrado com sucesso!",
            'data' => App::make(CakeTransformer::class)->transform($cake)
        ]);
    }

    public function update($id, CakeCreateRequest $request) {
        $data = $request->validated();
        $cake = $this->service->update($id, $data);
        return response()->json([
            'msg' => "Bolo atualizado com sucesso!",
            'data' => \App::make(CakeTransformer::class)->transform($cake)
        ]);
    }
    
}