<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });


        DB::table('portals')->insert([
            [
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'This is the administrator portal.',
                'icon' => null,
                'color' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Engineer',
                'slug' => 'engineer',
                'description' => 'This is the engineer portal.',
                'icon' => null,
                'color' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customers',
                'slug' => 'customers',
                'description' => 'This is the customer portal.',
                'icon' => null,
                'color' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cashier',
                'slug' => 'cashier',
                'description' => 'This is the cashier portal.',
                'icon' => null,
                'color' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer Service',
                'slug' => 'customer-service',
                'description' => 'This is the customer service portal.',
                'icon' => null,
                'color' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portals');
    }
};
