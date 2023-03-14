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
        Schema::create('user_personal_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name', 150);
            $table->string('middle_name', 150)->nullable();
            $table->string('last_name', 150)->nullable();
            $table->string('email_id', 250);
            $table->string('mobile_number', 250);
            $table->dateTime('date_of_birth');
            $table->smallInteger('gender')->unsigned();
            $table->smallInteger('marital_status')->unsigned();
            $table->smallInteger('dependents')->unsigned();
            $table->string('address', 250)->nullable();
            $table->smallInteger('countries')->unsigned();
            $table->smallInteger('states', 11)->unsigned();
            $table->smallInteger('cities', 11)->unsigned();
            $table->integer('pin_code', 11)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
