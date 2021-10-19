<?php

namespace App\Services;

use App;

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
        $cake = CakeStock::where('id', $id)->firstOrFail();
        $cake->delete();
        return true;
    }

    public function create(array $data)
    {
        $cake = new CakeStock;
        $cake->cake_id = $data['cake_id']; 
        $cake->weight = $data['weight'];
        $cake->price = $data['price'];
        $cake->status = $data['status'];
        $cake->save();
        return $cake;
    }

    public function update($id, array $data)
    {
        $cake = CakeStock::where('id', $id)->firstOrFail();
        $cake->cake_id = $data['cake_id']; 
        $cake->weight = $data['weight'];
        $cake->price = $data['price'];
        $cake->status = $data['status'];
        $cake->save();
        return $cake;
    }
    
}