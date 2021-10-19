<?php

namespace App\Services;

use App;

use App\Models\Cake;

class CakeService {
    
    const PAGINATION_LIMIT = 10;

    public function list(array $data) 
    {
        $query = Cake::query();
        $query->orderBy('updated_at','desc');
        return $query->paginate($data['limit'] ?? self::PAGINATION_LIMIT);
    }

    public function get($id) 
    {
        return Cake::where('id', $id)->firstOrFail();
    }

    public function delete($id) 
    {
        $cake = Cake::where('id', $id)->firstOrFail();
        $cake->delete();
        return true;
    }

    public function create(array $data)
    {
        $cake = new Cake;
        $cake->name = $data['name'];
        $cake->save();
        return $cake;
    }

    public function update($id, array $data)
    {
        $cake = Cake::where('id', $id)->firstOrFail();
        $cake->name = $data['name'];
        $cake->save();
        return $cake;
    }
    
}