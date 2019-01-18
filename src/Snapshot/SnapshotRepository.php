<?php namespace Pixney\DigitaloceanModule\Snapshot;

use Pixney\DigitaloceanModule\Snapshot\Contract\SnapshotRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class SnapshotRepository extends EntryRepository implements SnapshotRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var SnapshotModel
     */
    protected $model;

    /**
     * Create a new SnapshotRepository instance.
     *
     * @param SnapshotModel $model
     */
    public function __construct(SnapshotModel $model)
    {
        $this->model = $model;
    }
}
