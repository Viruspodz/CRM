<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->enum('deal_type', ['realhomes', 'repay'])->after('deal_name')->default('realhomes');
        });
    }

    public function down(): void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('deal_type');
        });
    }
};
