<?php 

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use App\Services\Importer\IImportService;

class ImportCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'run:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Execute Import method. Creating Random Customers.";

    private IImportService $importService;

    public function __construct(IImportService $importService)
    {
        parent::__construct();
        $this->importService = $importService;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function __invoke()
    {

        $nationality = $this->input->getOption('nationality');

        $limit = $this->input->getOption('limit');

        $this->importService->getData($nationality, $limit);

        $this->info("Random customers generated in $limit with nationality from $nationality");

    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('nationality', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', 'au'),

            array('limit', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', '100'),
        );
    }

}