<?php

declare(strict_types=1);

namespace Lijinhua\HyperfExtCaptcha\Listener;

use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Validation\Event\ValidatorFactoryResolved;
use Lijinhua\HyperfExtCaptcha\CaptchaFactory;

class ValidatorFactoryResolvedListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            ValidatorFactoryResolved::class,
        ];
    }

    public function process(object $event): void
    {
        /** @var \Hyperf\Validation\Contract\ValidatorFactoryInterface $validatorFactory */
        $validatorFactory = $event->validatorFactory;

        $validatorFactory->extend('captcha', function ($attribute, $value, $parameters, $validator) {
            if (is_string($value) && str_contains($value, ',')) {
                [$ket, $text] = array_pad(explode(',', $value), 2, '');
                return ApplicationContext::getContainer()->get(CaptchaFactory::class)->validate($ket, $text);
            }
            return false;
        });
    }
}
