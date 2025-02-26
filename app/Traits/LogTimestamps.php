<?php
namespace App\Traits;

trait LogTimestamps {
  public function printTimestampsToLog () {
    \Log::info('Created at: ' . $this->created_at);
    \Log::info('Updated at: ' . $this->updated_at);
  }
}