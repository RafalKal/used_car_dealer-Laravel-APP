<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new PostgreSQL database based on the database config file or the provided name';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $schemaName = $this->argument('name') ?: config("database.connections.pgsql.database");
        $charset = config("database.connections.pgsql.charset", 'utf8mb4');
        $collation = config("database.connections.pgsql.collation", 'utf8mb4_unicode_ci');

        config(["database.connections.pgsql.database" => null]);

        $query = "DROP DATABASE $schemaName WITH (FORCE);";

        try {
            DB::statement($query);
        }catch (Exception $exception){

        }
        $query = "CREATE DATABASE $schemaName;";

        DB::statement($query);

        config(["database.connections.pgsql.database" => $schemaName]);

        return 0;
    }
}
