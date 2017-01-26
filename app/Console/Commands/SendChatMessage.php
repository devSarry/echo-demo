<?php

namespace App\Console\Commands;

use App\Models\Channel;
use Illuminate\Console\Command;

class SendChatMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:message {message}';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send chat message on channel 1.';

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
        // Fire off an event, just randomly grabbing the first user for now
        $user = \App\Models\User::first();

        $message = $user->messages()->create([
            'text' => $this->argument('message'),
            'channel_id' => 1
        ]);


        $channel = Channel::find(1);

        event(new \App\Events\MessageCreated($message, $channel));
    }
}
