<?php

use App\Domain\Event\Models\Event;
use App\Domain\Event\Models\Track;
use App\Domain\Slot\Enums\SlotType;
use App\Domain\Slot\Models\Slot;
use Faker\Generator as Faker;

$factory->define(Slot::class, function (Faker $faker) {
    $startsAt = $faker->dateTimeBetween('-2 years', '+1 year');
    $amountOfMinutes = $faker->randomElement([15, 30]);
    $endsAt = (clone $startsAt)->add(new DateInterval("P{$amountOfMinutes}M"));

    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraphs(3, true),
        'event_id' => factory(Event::class),
        'type' => $faker->randomElement(SlotType::values()),
        'track_id' => factory(Track::class),
        'starts_at' => $startsAt,
        'ends_at' => $endsAt,
    ];
});
