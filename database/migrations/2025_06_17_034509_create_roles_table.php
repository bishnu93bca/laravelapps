<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->enum('type', ['public', 'user', 'moderator', 'admin']); // Restricted options for type
            $table->enum('flag', ['default', 'superadmin', 'public'])->default('default'); // Restricted options for flag
            $table->timestamps();
        });

        // Insert default roles
        DB::table('roles')->insert([
            [
                'name' => 'Superadmin',
                'description' => 'Users of this role can modify all of your settings and data.  This level cannot be modified or deleted.',
                'type' => 'admin',
                'flag' => 'superadmin',
            ],
            [
                'name' => 'Admin',
                'description' => 'Users of this role have full access to all of your network settings and data.',
                'type' => 'admin',
                'flag' => 'default',
            ],
            [
                'name' => 'Moderators',
                'description' => 'Users of this role may edit user-side content.',
                'type' => 'user',
                'flag' => 'default',
            ],
            [
                'name' => 'Public',
                'description' => 'Settings for this role apply to users who have not logged in.',
                'type' => 'public',
                'flag' => 'public',
            ],
            [
                'name' => 'Default',
                'description' => 'This is the default user role.  New users are assigned to it automatically.',
                'type' => 'user',
                'flag' => 'default',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
