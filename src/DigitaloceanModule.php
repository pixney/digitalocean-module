<?php

namespace Pixney\DigitaloceanModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class DigitaloceanModule extends Module
{
    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-puzzle-piece';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'snapshots' => [
            'buttons' => [
               // 'new_snapshot',
            ],
        ],
    ];
}
