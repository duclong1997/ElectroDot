<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Homepage;

/**
 * Class HomepageTransformer.
 *
 * @package namespace App\Transformers;
 */
class HomepageTransformer extends TransformerAbstract
{
    /**
     * Transform the Homepage entity.
     *
     * @param \App\Entities\Homepage $model
     *
     * @return array
     */
    public function transform(Homepage $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
