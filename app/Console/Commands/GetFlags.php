<?php

namespace App\Console\Commands;

use App\Models\Logo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
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

        /*dd(asset('storage/logos/countries/tr.svg'));
        //dd(asset(Storage::disk('local')->url('logos/countries/tr.svg')));
        $files = Storage::disk('public')->allFiles('logos/countries');
        foreach ($files as $file){
            $path = asset(Storage::disk('public')->url($file));
            $logo = Logo::firstOrCreate([
                'logo_url' => $path
            ], [
                'logo_url' => $path
            ]);
        }

        $files = Storage::disk('public')->allFiles('logos/teams');
        foreach ($files as $file){
            $path = asset(Storage::disk('public')->url($file));
            $logo = Logo::firstOrCreate([
                'logo_url' => $path
            ], [
                'logo_url' => $path
            ]);
        }*/
    }
}
