<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ensure existing NULL values become 0, then set a default for future inserts
        DB::statement('UPDATE `outputs` SET `masuk` = 0 WHERE `masuk` IS NULL');
        DB::statement('ALTER TABLE `outputs` MODIFY `masuk` INT DEFAULT 0');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove default (note: this will keep existing values)
        DB::statement('ALTER TABLE `outputs` MODIFY `masuk` INT');
    }
};
