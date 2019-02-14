<?php

namespace App\Presenters;

use App\Transformers\HomepageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HomepagePresenter.
 *
 * @package namespace App\Presenters;
 */
class HomepagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HomepageTransformer();
    }
}
