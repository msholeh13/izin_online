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
        Schema::create('approval_flows', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cuti_request_id');
            $table->foreign('cuti_request_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('approver_id');
            $table->foreign('approver_id')->references('id')->on('cuti_requests')->onDelete('cascade');

            $table->enum('level_approval', ['kepala_ruang', 'kepala_unit', 'kepala_sdm', 'direktur']);
            $table->enum('status', ['waiting', 'approved', 'not approved'])->default('waiting');
            $table->text('catatan');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('approval_flows', function (Blueprint $table) {
            $table->dropForeign(['cuti_request_id']);
            $table->dropForeign(['approver_id']);
        });
        Schema::dropIfExists('approval_flows');
    }
};
