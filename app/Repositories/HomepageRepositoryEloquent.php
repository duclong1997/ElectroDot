<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HomepageRepository;
use App\Entities\Homepage;
use App\Validators\HomepageValidator;

/**
 * Class HomepageRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HomepageRepositoryEloquent extends BaseRepository implements HomepageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Homepage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return HomepageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
