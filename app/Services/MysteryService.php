<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MysteryService
{
    /**
     * Fixed BGN -> EUR rate
     */
    private const BGN_TO_EUR = 1.95583;

    public function getMysteries(): array
    {
        return Cache::remember('mysteries_values', 30, function () {

            $urls = config('services.mystery_apis');
            $items = [];

            foreach ($urls as $url) {
                $response = Http::timeout(5)->get($url);

                if (!$response->ok()) {
                    continue;
                }

                $json = $response->json();

                foreach ($json['jpsystems'] ?? [] as $system) {

                    // We force everything to EUR
                    $currency = 'EUR';

                    foreach ($system['jpsystem_current_levels'] ?? [] as $level) {

                        if (!isset($level['value_vis'])) {
                            continue;
                        }

                        // Raw value from API
                        $rawValue = (float) str_replace(',', '', $level['value_vis']);

                        // 🔥 FORCE BGN -> EUR conversion
                        $value = $this->toEur($rawValue);

                        // Keep only 1000+ EUR mysteries
                        if ($value < 1000) {
                            continue;
                        }

                        $range = $this->rangeForValue($value);

                        $items[] = [
                            'value'    => $value,
                            'currency' => $currency,
                            'label'    => $range['label'],
                            'range'    => $range['range'],
                        ];
                    }
                }
            }

            usort($items, fn($a, $b) => $a['value'] <=> $b['value']);

            return $items;
        });
    }

    /**
     * Force convert BGN to EUR
     */
    private function toEur(float $value): float
    {
        return round($value / self::BGN_TO_EUR, 2);
    }

    private function rangeForValue(float $value): array
    {
        return match (true) {
            $value < 1000 => [
                'label' => '🟢 Small Mystery',
                'range' => '0 – 1 000 EUR',
            ],

            $value < 2000 => [
                'label' => '🟡 Medium Mystery',
                'range' => '1 000 – 2 000 EUR',
            ],

            $value < 3000 => [
                'label' => '🟠 High Mystery',
                'range' => '2 000 – 3 000 EUR',
            ],

            $value < 4000 => [
                'label' => '🔥 Super Mystery',
                'range' => '3 000 – 4 000 EUR',
            ],

            $value < 6000 => [
                'label' => '💎 Mega Mystery',
                'range' => '4 000 – 6 000 EUR',
            ],

            $value < 8000 => [
                'label' => '👑 Ultra Mystery',
                'range' => '6 000 – 8 000 EUR',
            ],

            $value < 10000 => [
                'label' => '💥 Grand Mystery',
                'range' => '8 000 – 10 000 EUR',
            ],

            $value < 15000 => [
                'label' => '💠 Crystal Mystery',
                'range' => '10 000 – 15 000 EUR',
            ],

            $value < 30000 => [
                'label' => '🏆 Epic Mystery',
                'range' => '15 000 – 30 000 EUR',
            ],

            default => [
                'label' => '🤑 Legend Mystery',
                'range' => '30 000+ EUR',
            ],
        };
    }
}
