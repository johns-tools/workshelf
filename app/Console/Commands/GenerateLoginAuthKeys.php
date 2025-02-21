<?php

namespace App\Console\Commands;

use App\Models\LoginAuthKey;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateLoginAuthKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'login:generate {count=0} {--reset : Reset the login_auth_keys table before generating keys}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a set of login auth keys';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         // If the --reset option is provided, truncate the table.
         if ($this->option('reset')) {
            LoginAuthKey::truncate();
            $this->info('The login_auth_keys table has been reset.');
        }

        $count = (int) $this->argument('count');

        if($count > 100)
        {
            $this->info("Number of records to create has to be 100 or less.");
            return 0; 
        }

        // If the count is 0 then reset without any data creation.
        if($this->option('reset') && !$count)
        {
            $this->info("The login_auth_keys reset with no records created.");
            return 0;
        }

        // If the count is more than 0 then reset and create data.
        for ($i = 0; $i < $count; $i++) {
            $loginAuthKey = LoginAuthKey::create([
                'key_01' => Str::uuid(),
                'key_02' => Str::uuid(),
            ]);

            $this->info("Created LoginAuthKey with ID: {$loginAuthKey->id}");
        }

        return 0;
    }
}
