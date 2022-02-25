<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\SendNotificationController;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail';

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
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $cc = new SendNotificationController(); 
        $res = $cc->sendNotification($id)->getOriginalContent();

        $headers = ['Id', 'Email', 'Message', 'Result'];
        
        $data = [[

                'id' => $res['id'],
                'email' => $res['email'],
                'message' => $res['message'],
                'result' => $res['result'] === 0 ? 'FAIL' : 'OK',
        ]];

        $this->table($headers, $data);

        return 0;
    }
}
