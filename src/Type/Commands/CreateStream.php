<?php

namespace Acty\ClassifiedsModule\Type\Commands;

use Acty\ClassifiedsModule\Type\TypeModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CreateStream
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
     * @param  \Illuminate\Config\Repository $config
     */
    public function handle(StreamRepositoryInterface $streams, Repository $config)
    {
        $streams->create(
            [
                $config->get('app.fallback_locale') => [
                    'name'        => $this->type->name,
                    'description' => $this->type->getDescription()
                ],
                'slug'                              => $this->type->slug . '_types',
                'namespace'                         => 'classifieds',
                'locked'                            => false,
                'translatable'                      => true,
                'trashable'                         => true,
                'hidden'                            => true,
            ]
        );
    }
}