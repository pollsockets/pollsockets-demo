<?php

namespace App\Console\Commands;

use App\Actions\UpdateFakerSeedAction;
use Illuminate\Console\Command;

class UpdateSeedCommand extends Command
{
	protected $signature = 'update:seed';

	protected $description = 'Command description';

	public function handle(): int
	{
        $action = new UpdateFakerSeedAction;
        $action();

		return self::SUCCESS;
	}
}
