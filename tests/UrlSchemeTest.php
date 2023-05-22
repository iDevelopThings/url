<?php

use Spatie\Url\Exceptions\InvalidArgument;
use Spatie\Url\Url;

it('can set default schemes', function () {
    Url::setValidSchemes(['https', 'http']);

    expect(fn() => Url::fromString('ws://localhost/path')->withScheme('ws'))->toThrow(InvalidArgument::class);
});

it('can add custom schemes and they work', function () {
    Url::addValidScheme('ws', 'wss');

    $url = Url::fromString('ws://localhost/path')->withScheme('ws');

    expect($url)->getScheme()->toBe('ws')
        ->and($url->withScheme('wss'))->getScheme()->toBe('wss');
});

