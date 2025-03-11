<?php

if (!function_exists('getROCWeights')) {
    function getROCWeights(): array
    {
        $weights = env('WP_ROC_WEIGHTS', '0.370,0.227,0.156,0.108,0.072,0.044,0.020');
        return array_map('floatval', explode(',', $weights));
    }
}
