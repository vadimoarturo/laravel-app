<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Currency;
use DateTime;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

          $schedule->call(function () {
             Currency::truncate();
            $now = date('Y-m-d H:i:s');
            $date = new DateTime($now);
            $datecheck =  $date->format('Y-m-d\TH:i:s.v');
            $datexml = $date->format('d/m/Y');
            $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req='.$datexml;
            $xml = simplexml_load_file($url,"SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            foreach ($array['Valute'] as $currencyarray) {
              if($currencyarray['CharCode'] == 'USD' || $currencyarray['CharCode'] == 'EUR' ){
              Currency::insert(['name' => $currencyarray['Name'],'currency' => $currencyarray['CharCode'],'nominal' => $currencyarray['Nominal'],'value' => (float)$currencyarray['Value'], 'date' => $datecheck]);
              }
              if($currencyarray['CharCode'] == 'UAH'){
                $valuearray = (float)$currencyarray['Value'];
                $value = ($valuearray / 10);
              Currency::insert(['name' => $currencyarray['Name'],'currency' => $currencyarray['CharCode'],'nominal' => 1,'value' =>  $value, 'date' => $datecheck]);
              }

            }
          })->dailyAt('11:45');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
