<?php

namespace Acty\ClassifiedsModule\Type\Commands;

use Acty\ClassifiedsModule\Type\TypeModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;

class DeleteStream
{
    use DispatchesJobs;

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
     * @param  \Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface $streams
     */
    public function handle(StreamRepositoryInterface $streams)
    {   
        $streams->delete($streams->findBySlugAndNamespace(
            $this->type->slug . '_types', 'classifieds')
        );
    }
}