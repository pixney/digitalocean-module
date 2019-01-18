<?php 

namespace Pixney\DigitaloceanModule\Commands\Snapshots;

use Illuminate\Support\Facades\Cache;
use Anomaly\Streams\Platform\Message\MessageBag;
use GrahamCampbell\DigitalOcean\DigitalOceanManager;

/**
 * Class SnapshotTake
 *
 *  @author Pixney AB <hello@pixney.com>
 *  @author William Åström <william@pixney.com>
 *
 *  @link https://pixney.com
 */
class DeleteSnapshot
{
    /**
     * Image ID
     *
     * @var integer
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(DigitalOceanManager $digitalocean, MessageBag $message)
    {
        try {
            $image = $digitalocean->image()->getById($this->id);
            $digitalocean->image()->delete($this->id);
            Cache::forget('droplets');
            return response("Successfully deleted {$image->name} [{$image->createdAt}]", 200);
        } catch (\Throwable $ex) {
            return response($ex->getMessage(), 400);
        }
    }
}
