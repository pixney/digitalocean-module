<?php 

namespace Pixney\DigitaloceanModule\Commands\Snapshots;

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
class CreateSnapshot
{
    /**
     * Undocumented variable
     *
     * @var integer
     */
    protected $dropletId;

    public function __construct($dropletId)
    {
        $this->dropletId = $dropletId;
    }

    public function handle(DigitalOceanManager $digitalocean, MessageBag $message)
    {
        try {
            $api         = $digitalocean->droplet();
            $droplet     = $api->getById($this->dropletId);
            $dropletName = $droplet->name . '_' . date('Ymd-Hms');
            $snapshot    = $api->snapshot($this->dropletId, $dropletName);
            return response("{$dropletName} [{$snapshot->type} {$snapshot->status}]", 200);
        } catch (\Throwable $ex) {
            return response($ex->getMessage(), 400);
        }
    }
}
