<?php

namespace App\Services;

use App\Models\CakeStock;

class CakeStockService {
    
    const PAGINATION_LIMIT = 10;

    public function list(array $data) 
    {
        $query = CakeStock::query();
        $query->orderBy('updated_at','desc');
        return $query->paginate($data['limit'] ?? self::PAGINATION_LIMIT);
    }

    public function get($id) 
    {
        return CakeStock::where('id', $id)->firstOrFail();
    }

    public function delete($id) 
    {
        $stock = CakeStock::where('id', $id)->firstOrFail();
        $stock->delete();
        return true;
    }

    public function create(array $data)
    {
        $stock = new CakeStock;
        $stock->cake_id = $data['cake_id']; 
        $stock->weight = $data['weight'];
        $stock->price = $data['price'];
        $stock->status = $data['status'];
        $stock->save();

        if ($stock->status == 'available' && $stock->wasChanged()) {
            event(new \App\Events\CakeAvailableAlert($stock->cake));
        }
        

        return $stock;
    }

    public function update($id, array $data)
    {
        $stock = CakeStock::where('id', $id)->firstOrFail();
        $stock->cake_id = $data['cake_id']; 
        $stock->weight = $data['weight'];
        $stock->price = $data['price'];
        $stock->status = $data['status'];
        $stock->save();

        if ($stock->status == 'available' && $stock->wasChanged()) {
            event(new \App\Events\CakeAvailableAlert($stock->cake));
        }

        return $stock;
    }
    
}