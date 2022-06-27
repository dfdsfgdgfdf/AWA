<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable();

            $table->enum('purpose', ['Sale', 'Rent'])->nullable();
            $table->double('price')->nullable();
            $table->double('size')->nullable();
            $table->enum('used', ['New', 'Used'])->nullble();

            $table->integer('floornumber')->nullable();
            $table->integer('no_of_floor')->nullable();
            $table->integer('elevator')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->string('hall')->nullable();
            $table->text('description')->nullable();
            $table->string('video')->nullable();

            $table->string('address')->nullable();
            $table->text('link')->nullable();

            $table->string('phone')->nullable();
            $table->boolean('top')->default(false);
            $table->boolean('status')->default(false);

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
        Schema::dropIfExists('project_details');
    }
}
