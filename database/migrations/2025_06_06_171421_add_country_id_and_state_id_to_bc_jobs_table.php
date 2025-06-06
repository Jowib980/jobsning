<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryIdAndStateIdToBcJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bc_jobs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('country_id')->nullable()->after('location_id');
            $table->unsignedBigInteger('state_id')->nullable()->after('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bc_jobs', function (Blueprint $table) {
            //
            $table->dropColumn(['country_id', 'state_id']);
        });
    }
}
