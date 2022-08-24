<?php

namespace App\Console\Commands;

use App\Models\Logo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GetFlags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-logos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = Storage::disk('public')->allFiles('logos/countries');
        foreach ($files as $file){
            $path = "storage\\".str_replace("/","\\",$file);
            $logo = new Logo();
            $logo->logo_url = $path;
            $logo->save();
        }
    }
}
