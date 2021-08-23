<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgentLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->boolean('is_leave')->default(0);
            $table->enum('type', ['healthy', 'yearly'])->nullable();
            $table->date('date');

            $table->foreign('agent_id')->references('id')->on('agents')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_leaves');
    }
}
