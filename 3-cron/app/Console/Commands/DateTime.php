<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DateTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:datetime';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '30 minute interval which checks all rows in the database - if there are at least 10 entries, deletes the 10th oldest entry, adds the latest date / time entry';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get all rows in table
        $rows = DB::table('dateTime')->get();
        

        // Delete the oldest 10th row 
        if ($rows->count() >= 10) {
            $firstRow = DB::table('dateTime')->first();

            $oldest = $firstRow->dateTimeVal;

            //dd($oldest);

            DB::table('dateTime')
                ->where('dateTimeVal', $oldest)
                ->delete();
        }


        // Capture current date & time
        $now = date("r");


        // Insert latest date & time
        DB::table('dateTime')->insert(
            ['dateTimeVal' => $now]
        );
    }
}
