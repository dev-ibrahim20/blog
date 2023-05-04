<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:notify';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'send email notify for all user every day';

  /**
   * Execute the console command.
   */
  public function handle(): void
  {
    // $users = User::select('email')->get();
    $email = User::pluck('email')->toArray();
    // $data = ['title' => 'Programming', 'body' => 'php'];
    foreach ($email as $em) {
      Mail::To($em)->send(new NotifyEmail());
    }
  }
}
