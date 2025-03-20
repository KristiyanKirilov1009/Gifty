<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tests = ['44,99', '44.99'];

        foreach ($tests as $key => $element) {
            if (is_numeric($element)) {
                echo var_export($element, true) . " is numeric", PHP_EOL;
            } else {
                echo var_export($element, true) . " is NOT numeric", PHP_EOL;
            }
        }
    }
}
