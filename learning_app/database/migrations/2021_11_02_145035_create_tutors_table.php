<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->on('countries')->references('id')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->on('cities')->references('id')
                ->cascadeOnUpdate()->cascadeOnDelete();



            $table->string('age_groups', 500)->nullable();
            $table->string('skills', 500)->nullable();
            $table->string('headline', 500)->nullable();
            $table->text('bio')->nullable();
            $table->string('video', 500)->nullable();
            $table->double('hourly_rate', 8, 2)->nullable();
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_banned')->default(0);

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
        Schema::dropIfExists('tuters');
    }
}
