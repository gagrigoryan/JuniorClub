<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function user() {
        return$this->belongsTo('App\User');
    }

    public function student() {
        return$this->belongsTo('App\Student');
    }

    public function countLeft() {
        $currentDate = Carbon::now();
        $activeDate = $this->activeDate;
        return $currentDate->diffInWeeks($activeDate) * $this->product->count;
    }

    public function timeLeftPercent() {
        if (!$this->active || $this->active == -1) {
            return 0;
        }
        $currentDate = Carbon::now();
        $expireDate = new Carbon($this->expireDate);
        $diff =  $currentDate->diffInDays($this->activeDate);
        $absDiff = $expireDate->diffInDays($this->activeDate);
        if ($currentDate->greaterThan($expireDate)) {
            $this->active = -1;
            $this->save();
        }
        return intdiv($diff * 100, $absDiff);

//        $updateDate = $this->updated_at;
//        $updateDate->addMonth($this->product->period);
//        $diff = $currentDate->diffInDays($updateDate, false);
//        $diffAbs = $this->created_at->diffInDays($updateDate, false);
//        return intdiv((($diffAbs - $diff) * 100), $diffAbs);
    }
}
