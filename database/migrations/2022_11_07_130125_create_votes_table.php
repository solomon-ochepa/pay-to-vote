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
        Schema::create('votes', function (Blueprint $table) {
            $table->foreignUuid('event_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('contestant_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('voter_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('total');
            $table->decimal('amount');
            $table->boolean('active')->default(0);
            $table->foreignId('status_code')->default(1)->constrained('statuses', 'code')->cascadeOnUpdate()->cascadeOnDelete();
            //
            $table->uuid('id')->primary();
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
        Schema::dropIfExists('votes');
    }
};
