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
        Schema::create('events', function (Blueprint $table) {
            $table->string('name');
            $table->string('slug');
            $table->integer('min_vote');
            $table->decimal('vote_cost');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->boolean('active')->default(1);
            $table->foreignId('status_code')->default(1)->constrained('statuses', 'code')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('default')->default(0)->unique();
            $table->text('about')->nullable();
            //
            $table->uuid('id')->primary();
            $table->timestamps();

            $table->unique(['name', 'start_at', 'end_at'], 'event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
