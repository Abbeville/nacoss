<?php 

if (! function_exists('feeName')) {
    function feeName($fee_id) {
        return App\Fee::where('id', $fee_id)->pluck('code')->first();
    }
}

if (! function_exists('feeAmount')) {
    function feeAmount($fee_id) {
        return App\Fee::where('id', $fee_id)->pluck('amount')->first();
    }
}