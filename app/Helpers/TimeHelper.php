<?php

namespace App\Helpers;
use Carbon\Carbon;

class TimeHelper{
  public function timeAgo($datetime) {
      $now = Carbon::now();
      $ago = Carbon::parse($datetime);
      
      if ($now->diffInWeeks($ago) > 0) {
          return $now->diffInWeeks($ago) . ' weeks ago';
      } elseif ($now->diffInMonths($ago) > 0) {
          return $now->diffInMonths($ago) . ' months ago';
      } elseif ($now->diffInHours($ago) > 0) {
          return $now->diffInHours($ago) . ' hours ago';
      } elseif ($now->diffInMinutes($ago) > 0) {
          return $now->diffInMinutes($ago) . ' minutes ago';
      } else {
          return 'now';
      }
  }

}