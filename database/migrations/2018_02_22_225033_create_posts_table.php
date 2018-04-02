<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->insigned(); //insigned significa que pertene a esa caracteristicas en este caso un post pertenece a un user
            $table->integer('category_id')->insigned(); //identificador del foreign key
            $table->string('name', 120);
            $table->string('slug', 130)->unique(); //URL amigables
            $table->mediumText('excerpt')->nullable();
            $table->text('body');
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT'); //ENUM SE MANEJA POR OPCIONES CONSTANTES EN MAYUSCULA, DONDE PUEDE TOMARSE UNA POR DEFECTO O NO DEPENDIENDO
            $table->string('file', 128)->nullable();

            $table->timestamps();

            //Relations
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
