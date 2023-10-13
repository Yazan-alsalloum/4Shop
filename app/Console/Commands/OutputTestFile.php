<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OutputTestFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run phpunit tests';

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
     * @return mixed
     */
    public function handle()
    {
        shell_exec('del /f test_*');
        shell_exec('whoami > test_temp_out.txt');
        shell_exec('echo %date% %time% >> test_temp_out.txt');
        shell_exec('echo ------------------------------------------------- >> test_temp_out.txt');
        shell_exec('"./vendor/bin/phpunit" --testdox-text testdox.txt');
        shell_exec('type testdox.txt >> test_temp_out.txt');
        shell_exec('del /f testdox.txt');
        shell_exec('echo ------------------------------------------------- >> test_temp_out.txt');
        shell_exec('"./vendor/bin/phpunit" >> test_temp_out.txt');
        shell_exec('certutil -encode test_temp_out.txt test_output.txt');
        shell_exec('certutil -hashfile test_output.txt SHA512 | find /i /v "SHA512" | find /i /v "CertUtil" > test_key.txt');
        $this->line(shell_exec('type test_temp_out.txt'));
        shell_exec('del /f test_temp*');
    }
}
