<?php

it("validates a text", function () {
    expect(\Core\Validator::Text('foobar'))->toBeTrue();
    expect(\Core\Validator::Text('false'))->toBeTrue();
    expect(\Core\Validator::Text(false))->toBeFalse();
    expect(\Core\Validator::Text(''))->toBeFalse();
});


it("validate a text with minimum characters", function () {
    expect(\Core\Validator::Text("Hi", 5))->toBeFalse();
    expect(\Core\Validator::Text('Hello', 4))->toBeTrue();
    expect(\Core\Validator::Text('1234567890', 5, 10))->toBeTrue();
     expect(\Core\Validator::Text('1234567890', 5, 9))->toBeFalse();
});
