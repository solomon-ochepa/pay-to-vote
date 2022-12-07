<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contestants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('event_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->unique();
            $table->bigInteger('number')->unsigned();
            $table->bigInteger('voted')->default(0);
            $table->boolean('active')->default(0);
            $table->foreignUuid('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('status_code')->default(1)->constrained('statuses', 'code')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('about')->nullable();
            $table->timestamps();

            $table->unique(['number', 'event_id', 'user_id'], 'contestant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contestants');
    }
};
