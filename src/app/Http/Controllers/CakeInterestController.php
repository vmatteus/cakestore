<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\CakeInterestCreateRequest;
use App\Services\CakeInterestService;
use App\Transformers\CakeInterestTransformer;

class CakeInterestController extends Controller
{

    /**
     * @var \App\Services\CakeInterestService $service
     */
    private $service;

    public function __construct(CakeInterestService $service) 
    {
        $this->service = $service;
    }

    public function create(CakeInterestCreateRequest $request) {
        $data = $request->validated();
        $interest = $this->service->create($data);
        return response()->json([
            'msg' => "Interessado cadastrado com sucesso!",
            'data' => App::make(CakeInterestTransformer::class)->transform($interest)
        ]);
    }
    
}