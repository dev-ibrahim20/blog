<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class expiration extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:expiration';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';


  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   */
  public function handle(): void
  {
    $Users = User::where('expire', 0)->get(); // Collection Of Users

    foreach ($Users as $user) {
      $user->update(['expire' => 1]);
    }
  }
}
