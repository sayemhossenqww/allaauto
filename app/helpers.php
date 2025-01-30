<?php

use App\Models\Settings;

if (!function_exists('currency_format')) {
    function currency_format(float $number, bool $is_costume_currency = false): string
    {
        $settings = config('settings');

        $currencyThousandSeparator = $settings->currencyThousandSeparator;
        $currencyDecimalSeparator =  $settings->currencyDecimalSeparator;
        $showTrailingZeros =  $settings->trailingZeros;

        $formattedNumber = number_format(
            $number,
            $settings->currencyPrecision,
            is_null($currencyDecimalSeparator) ? ' ' : $currencyDecimalSeparator,
            is_null($currencyThousandSeparator) ? ' ' : $currencyThousandSeparator
        );
        if (!$showTrailingZeros) {
            $formattedNumber = str_replace("{$currencyDecimalSeparator}00", '', $formattedNumber);
        }
        $currency = $is_costume_currency ? Settings::getCurrency() :  $settings->currencySymbol;
        if ($settings->currencyPosition == "before") {
            return "{$currency} {$formattedNumber}";
        }
        return "{$formattedNumber} {$currency}";
    }
}
if (!function_exists('custom_currency_format')) {
    function custom_currency_format(float $number, string $currency = '$'): string
    {
        $formattedNumber = number_format($number, 2);
        return "{$currency}{$formattedNumber}";
    }
}

if (!function_exists('numberToWords')) {
    function numberToWords($number)
    {
        if (!is_numeric($number) || $number < 0) {
            return 'Invalid number';
        }

        $units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        $teens = ['eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
        $tens = ['', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
        $thousands = ['', 'thousand', 'million', 'billion', 'trillion'];

        if ($number == 0) {
            return 'zero';
        }

        $result = '';
        $place = 0;

        while ($number > 0) {
            $chunk = $number % 1000; // Process three digits at a time
            if ($chunk > 0) {
                $chunkWords = '';

                // Process hundreds
                if ($chunk >= 100) {
                    $chunkWords .= $units[(int)($chunk / 100)] . ' hundred ';
                    $chunk %= 100;
                }

                // Process tens and ones
                if ($chunk >= 20) {
                    $chunkWords .= $tens[(int)($chunk / 10)] . ' ';
                    $chunk %= 10;
                }

                if ($chunk > 10 && $chunk < 20) {
                    $chunkWords .= $teens[$chunk - 11] . ' ';
                    $chunk = 0;
                }

                if ($chunk > 0 && $chunk <= 10) {
                    $chunkWords .= $units[$chunk] . ' ';
                }

                $result = trim($chunkWords) . ' ' . $thousands[$place] . ' ' . $result;
            }

            $number = (int)($number / 1000);
            $place++;
        }

        return trim($result);
    }
}
