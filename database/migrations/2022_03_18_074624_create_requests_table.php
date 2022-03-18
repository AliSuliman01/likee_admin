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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('operation_id')->constrained();
            $table->boolean('is_succeed')->default(0);
            $table->boolean('is_failed')->default(0);
            $table->string('post_url');
            $table->integer('user_type')->nullable();
            $table->integer('requested_amount');
            $table->string('requested_comment')->nullable();
            $table->integer('number_of_page_posts')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
