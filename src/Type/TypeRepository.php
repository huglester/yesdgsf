<?php namespace Acty\ClassifiedsModule\Type;

use Acty\ClassifiedsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class TypeRepository extends EntryRepository implements TypeRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var TypeModel
     */
    protected $model;

    /**
     * Create a new TypeRepository instance.
     *
     * @param TypeModel $model
     */
    public function __construct(TypeModel $model)
    {
        $this->model = $model;
    }
}
