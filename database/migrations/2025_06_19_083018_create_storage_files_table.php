<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('storage_files', function (Blueprint $table) {
            $table->id(); // Primary key
            //$table->unsignedBigInteger('parent_file_id')->nullable(); // Self-referencing key
            $table->string('type', 50)->nullable(); // Type of file (e.g., image, document)
            $table->string('parent_type', 50)->nullable(); // Entity type (e.g., post, user)
            $table->unsignedBigInteger('parent_id')->nullable(); // Entity ID
            $table->unsignedBigInteger('user_id')->nullable(); // Uploader's ID
            $table->unsignedBigInteger('service_id')->default('1'); // Associateddefault 1 in local
            $table->string('storage_path', 255); // File path
            $table->string('extension', 10)->nullable(); // File extension
            $table->string('name', 255)->nullable(); // Original file name
            $table->string('mime_major', 50)->nullable(); // MIME type (major)
            $table->string('mime_minor', 50)->nullable(); // MIME type (minor)
            $table->unsignedBigInteger('size')->nullable(); // File size in bytes
            $table->timestamps(); // Created and updated timestamps

            // Foreign keys
            //$table->foreign('parent_file_id')->references('id')->on('storage_files')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            //$table->foreign('service_id')->references('id')->on('services')->onDelete('SET NULL');
        });
    }

    public function down()
    {
        Schema::dropIfExists('storage_files');
    }
};
