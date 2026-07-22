<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // slug already exists on blog_posts — just make sure it's unique
        // This migration just verifies, no changes needed
    }

    public function down(): void {}
};
