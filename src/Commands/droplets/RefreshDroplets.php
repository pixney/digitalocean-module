<?php 

namespace Pixney\DigitaloceanModule\Commands\Droplets;

use Illuminate\Support\Facades\Cache;

/**
 * Class ShowI\Support
 *
 *  @author Pixney AB <hello@pixney.com>
 *  @author William Åström <william@pixney.com>
 *
 *  @link https://pixney.com
 */
class RefreshDroplets
{
    public function handle()
    {
        Cache::forget('droplets');
    }
}
