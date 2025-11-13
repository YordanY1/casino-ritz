<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MysteryService
{
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

                    foreach ($system['jpsystem_current_levels'] ?? [] as $level) {

                        $value = isset($level['value_vis'])
                            ? (float) str_replace(',', '', $level['value_vis'])
                            : null;

                        if ($value && $value >= 1000) {

                            $range = $this->rangeForValue($value);

                            $items[] = [
                                'value' => $value,
                                'label' => $range['label'],
                                'range' => $range['range'],
                            ];
                        }
                    }
                }
            }

            usort($items, fn($a, $b) => $a['value'] <=> $b['value']);

            return $items;
        });
    }

    private function rangeForValue(float $value): array
    {
        return match (true) {
            $value < 3000 => [
                'label' => '🟢 Small Mystery',
                'range' => '1 000 – 3 000 BGN'
            ],

            $value < 6000 => [
                'label' => '🟡 Medium Mystery',
                'range' => '3 000 – 6 000 BGN'
            ],

            $value < 8000 => [
                'label' => '🟠 High Mystery',
                'range' => '6 000 – 8 000 BGN'
            ],

            $value < 10000 => [
                'label' => '🔥 Super Mystery',
                'range' => '8 000 – 10 000 BGN'
            ],

            $value < 15000 => [
                'label' => '💎 Mega Mystery',
                'range' => '10 000 – 15 000 BGN'
            ],

            $value < 30000 => [
                'label' => '👑 Ultra Mystery',
                'range' => '15 000 – 30 000 BGN'
            ],

            default => [
                'label' => '🤑 Legend Mystery',
                'range' => '30 000+ BGN'
            ],
        };
    }
}
