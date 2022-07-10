<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\Album;
use App\Models\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'song_name' => $this->faker->name(),
            'duration' => $this->faker->time($format = 'H:i:s'),
            'stream' => $this->faker->numberBetween($min=0),
            'release_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'parental_advisory' => $this->faker->boolean(),
            'rate' => $this->faker->numberBetween($min=0,$max=100),
            'album_id' =>Album::all()->random()->id,
            'location_id' =>Location::all()->random()->id,
            'delete'=>$this->faker->boolean($chanceOfGettingTrue = 0),
            'URL'=>$this->faker->randomElement(["https://www.mboxdrive.com/GTA%20San%20Andreas%20Theme%20Song%20Full%20!%20!.mp3","https://www.mboxdrive.com/Rick%20Astley%20-%20Never%20Gonna%20Give%20You%20Up.mp3","https://www.mboxdrive.com/Teriyaki_Boyz_-_Tokyo_Drift_Fast_Furious_48364314.mp3"])
        ];
    }
}
// 'duration' => $this->faker->time($format = 'H:i:s', $max = 'now'),