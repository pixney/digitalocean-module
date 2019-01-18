<?php

namespace Pixney\DigitaloceanModule\Http\Controller\Admin;

use Pixney\DigitaloceanModule\Commands\Droplets\GetDroplets;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Pixney\DigitaloceanModule\Commands\Droplets\RefreshDroplets;
use Pixney\DigitaloceanModule\Commands\Snapshots\CreateSnapshot;
use Pixney\DigitaloceanModule\Commands\Snapshots\DeleteSnapshot;

class SnapshotsController extends AdminController
{
    public function index()
    {
        $this->asset->add('scripts.js', 'pixney.module.digitalocean::js/dist/digitalocean.js');
        return view('pixney.module.digitalocean::droplets');
    }

    public function getDroplets()
    {
        return $this->dispatch(new GetDroplets(true, true));
    }

    public function delete($id)
    {
        return $this->dispatch(new DeleteSnapshot($id));
    }

    public function create($dropletId)
    {
        return $this->dispatch(new CreateSnapshot($dropletId));
    }

    public function refresh()
    {
        $this->dispatch(new RefreshDroplets());
        return redirect('admin/digitalocean');
    }
}
