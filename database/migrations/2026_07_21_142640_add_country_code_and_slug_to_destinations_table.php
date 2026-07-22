<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('country_code', 5)->nullable()->after('flag'); // e.g. 'gb', 'au', 'nz'
            $table->string('slug')->nullable()->after('country_code');    // e.g. 'united-kingdom'
            $table->text('details')->nullable()->after('description');   // full detail content for the detail page
        });
    }

    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn(['country_code', 'slug', 'details']);
        });
    }
};
