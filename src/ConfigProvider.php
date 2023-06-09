<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Lijinhua\HyperfExtCaptcha;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands'     => [
            ],
            'annotations'  => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish'      => [
                [
                    'id'          => 'config',
                    'description' => 'The config for lijinhua/hyperf-ext-captcha.',
                    'source'      => __DIR__ . '/../publish/captcha.php',
                    'destination' => BASE_PATH . '/config/autoload/captcha.php',
                ],
                [
                    'id'          => 'fonts',
                    'description' => 'The fonts for lijinhua/hyperf-ext-captcha.',
                    'source'      => __DIR__ . '/../publish/fonts',
                    'destination' => BASE_PATH . '/storage/fonts',
                ],
            ],
        ];
    }
}
