<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealRepresentativesTable extends Migration
{
    public function up()
    {
        Schema::create('deal_representatives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('deals', function (Blueprint $table) {
            $table->unsignedBigInteger('deal_representative_id')->nullable();
            $table->foreign('deal_representative_id')->references('id')->on('deal_representatives')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropForeign(['deal_representative_id']);
            $table->dropColumn('deal_representative_id');
        });

        Schema::dropIfExists('deal_representatives');
    }
}
