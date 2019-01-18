<?php 

namespace Pixney\DigitaloceanModule\Commands\Droplets;

use Illuminate\Support\Facades\Cache;
use GrahamCampbell\DigitalOcean\DigitalOceanManager;

/**
 * Class ShowI\Support
 *
 *  @author Pixney AB <hello@pixney.com>
 *  @author William Åström <william@pixney.com>
 *
 *  @link https://pixney.com
 */
class GetDroplets
{
    /**
     * return a collection of private Image entity
     *
     * @var boolean
     */
    protected $private;
    protected $includeSnapshots;

    public function __construct($private = true, $includeSnapshots = false)
    {
        $this->private          = $private;
        $this->includeSnapshots = $includeSnapshots;
    }

    public function handle(DigitalOceanManager $digitalocean)
    {
        $value = Cache::remember('droplets', 60, function () use ($digitalocean) {
            //TODO: Add try catch
            $myDropletsArray = [];
            $droplets = $digitalocean->droplet()->getAll();

            foreach ($droplets as $droplet) {
                $myDropletsArray[] = [
                        'id'        => $droplet->id,
                        'name'      => $droplet->name,
                        'sizeSlug'  => $droplet->sizeSlug,
                        'region'    => $droplet->region->name,
                        'snapshots' => $digitalocean->droplet()->getSnapshots($droplet->id)
                    ];
            }

            return $myDropletsArray;
        });

        return $value;
    }
}
