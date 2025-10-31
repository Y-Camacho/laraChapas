<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BottleCapState;
use App\Models\Collector;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bottle_caps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->enum(
                'state',
                array_column(BottleCapState::cases(), 'value')
            );
            $table->string('img_nom');
            $table->timestamp('date_edition')->nullable();
            $table->foreignIdFor(Collector::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bottle_caps');
    }
};
