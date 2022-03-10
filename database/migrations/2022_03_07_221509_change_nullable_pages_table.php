<?php

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use TCG\Voyager\Models\Page;

class ChangeNullablePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Type::hasType('enum')) {
            Type::addType('enum', StringType::class);
        }
        // For point types
        // DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('point', 'string');
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        Schema::table('pages', function (Blueprint $table) {
            $table->integer('author_id')->nullable()->change();
            $table->enum('status', Page::$statuses)->default(Page::STATUS_INACTIVE)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->integer('author_id')->change();
            $table->enum('status', Page::$statuses)->default(Page::STATUS_INACTIVE)->change();
        });
    }
}
