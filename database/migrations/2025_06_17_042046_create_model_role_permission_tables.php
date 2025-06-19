<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Model to Role
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->id();
            $table->morphs('model'); // Creates model_id and model_type
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $table->timestamps();

            // Optional: Add a unique index to prevent duplicate entries
            $table->unique(['model_id', 'model_type', 'role_id'], 'model_roles_unique');
        });

        // Model to Permission
        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->id();
            $table->morphs('model'); // Creates model_id and model_type
            $table->foreignId('permission_id')->constrained('permissions')->cascadeOnDelete();
            $table->timestamps();

            // Optional: Add a unique index to prevent duplicate entries
            $table->unique(['model_id', 'model_type', 'permission_id'], 'model_permissions_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('model_has_permissions');
    }
};
