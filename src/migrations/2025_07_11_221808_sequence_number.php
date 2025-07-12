<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sequence_number', function (Blueprint $table) {
            $table->string('key', 50)->default('')->comment('key值');
            $table->unsignedInteger('counter')->default(0)->comment('计次');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->timestamp('updated_at')->nullable()->comment('修改时间');

            $table->primary('key');

            $table->comment('编码计次表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sequence_number');
    }
};
