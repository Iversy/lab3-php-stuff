<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id(); 
            $table->string('performer'); 
            $table->string('album_name'); 
            $table->string('cover_image_url')->nullable();
            $table->string('description')->nullable();
            $table->year('year_of_release'); 
            $table->timestamps(); 
        });

        Schema::create('tracks', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('album_id'); 
            $table->string('name'); 
            $table->string('length'); 
            $table->timestamps(); 

            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Rollback migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
        Schema::dropIfExists('albums');
    }
}
