<?php namespace Acty\ClassifiedsModule\Advert;

use Acty\ClassifiedsModule\Advert\Contract\AdvertRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class AdvertRepository extends EntryRepository implements AdvertRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var AdvertModel
     */
    protected $model;

    /**
     * Create a new AdvertRepository instance.
     *
     * @param AdvertModel $model
     */
    public function __construct(AdvertModel $model)
    {
        $this->model = $model;
    }

    public function findByStrId($id)
    {
        return $this->model->where('str_id', $id)->first();
    }

}
