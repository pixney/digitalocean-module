<?php 

namespace Pixney\DigitaloceanModule\Commands\Snapshots;

use GrahamCampbell\DigitalOcean\DigitalOceanManager;

/**
 * Class ShowImages
 *
 *  @author Pixney AB <hello@pixney.com>
 *  @author William Åström <william@pixney.com>
 *
 *  @link https://pixney.com
 */
class ShowSnapshots
{
    /**
     * return a collection of private Image entity
     *
     * @var boolean
     */
    protected $private;

    public function __construct($private = true)
    {
        $this->private = $private;
    }

    public function handle(DigitalOceanManager $digitalocean)
    {
        $image  = $digitalocean->image();
        return $image->getAll(['private' => $this->private]);
    }
}
