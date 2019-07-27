<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->default('ShopNow');
            $table->text('company_description')->nullable();
            $table->text('company_contact')->nullable();
            $table->text('company_email')->nullable();
            $table->text('company_address')->nullable();
            $table->text('company_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_information');
    }
}
