<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bc_job_candidates', function (Blueprint $table) {
            //
            $table->date('interview_date')->nullable()->after('status');
            $table->time('interview_time')->nullable()->after('interview_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bc_job_candidates', function (Blueprint $table) {
            //
            $table->dropColumn(['interview_date', 'interview_time']);
        });
    }
};
