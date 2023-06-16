<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
{
  /**
   * Create the event listener.
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   */
  public function handle(VideoViewer $event): void
  {
    $this->updateViwer($event->video);
  }

  public function updateViwer($video)
  {
    $video->viewers = $video->viewers + 1;
    $video->save();
  }
}
