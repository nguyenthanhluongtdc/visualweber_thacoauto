<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Platform\Base\Supports\BaseSeeder;
use Platform\Language\Models\LanguageMeta;
use Platform\Location\Models\State;
use Platform\Location\Repositories\Interfaces\StateInterface;

class DatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->activateAllPlugins();

        // $this->call(UserSeeder::class);
        // $this->call(LanguageSeeder::class);
        // $this->call(PageSeeder::class);
        // $this->call(GallerySeeder::class);
        // $this->call(BlogSeeder::class);
        // $this->call(MemberSeeder::class);
        // $this->call(ContactSeeder::class);
        // $this->call(StaticBlockSeeder::class);
        // $this->call(MenuSeeder::class);
        // $this->call(WidgetSeeder::class);
        // $this->call(ThemeOptionSeeder::class);
        // $this->call(SettingSeeder::class);

        $states = DB::table('tinhthanhpho')->select('name')
            // ->whereNotIn('matp', ['01', '79'])
            ->get();

        DB::beginTransaction();
        foreach ($states as $item) {
            $state = State::create([
                'name' => $item->name,
                'country_id' => 3
            ]);

            $originValue = null;

            $originValue = LanguageMeta::where([
                'reference_id'   => $state->id,
                'reference_type' => State::class,
            ])->value('lang_meta_origin');

            LanguageMeta::saveMetaData($state, 'en_US', $originValue);
        }
        DB::commit();
    }
}
