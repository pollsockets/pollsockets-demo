<?php

namespace App\Actions;

use Pollsockets\Pollsockets;

class UpdateFakerSeedAction
{
    public function __invoke(): void
    {
        \DB::table('faker')->update(['seed' => rand()]);
        Pollsockets::channel('pollsockets')->publish('refresh');
    }
}
