<?php

namespace Acty\ClassifiedsModule\Type\Commands;

use Acty\ClassifiedsModule\Type\TypeModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

class GetStream
{
    /**
     * TypeModel
     *
     * @var \Acty\ClassifiedsModule\Type\TypeModel
     */
    protected $type;

    public function __construct(TypeModel $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command
     *
     * @param \Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface $streams
     *
     * @return \Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface|null
     */
    public function handle(StreamRepositoryInterface $streams)
    {
        return $streams->findBySlugAndNamespace(
            $this->type->getSlug() . '_types', 'classifieds'
        );
    }
}
