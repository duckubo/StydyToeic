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
        Schema::create('cmtgrammar', function (Blueprint $table) {
            $table->id('cmtgrammarid');
            $table->text('cmtgrammarcontent');
            $table->foreignId('memberid')->nullable()->constrained('users', 'id')->onDelete('set null');
            $table->foreignId('grammarguidelineid')->nullable()->constrained('grammarguidelines', 'grammarguidelineid')->onDelete('set null');
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
        Schema::dropIfExists('cmtgrammar');
    }
};
