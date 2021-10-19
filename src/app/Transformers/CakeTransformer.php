<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class ViaCepTransformer
 * @package namespace App\Transformers;
 */
class CakeTransformer extends TransformerAbstract
{
    /**
     * Transform an address
     *
     * @param array $address Array containing the ViaCep address
     *
     * @return array
     */
    public function transform($entity)
    {
        return [
            'id'         => $entity->id,
            'name'       => $entity->name,
            'created_at' => $entity->created_at->format('Y-m-d')
        ];
    }

}
