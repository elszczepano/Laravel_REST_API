<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoteRepository;
use App\Entities\Vote;
use App\Validators\VoteValidator;

/**
 * Class VoteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VoteRepositoryEloquent extends BaseRepository implements VoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
