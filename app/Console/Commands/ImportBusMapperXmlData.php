<?php

namespace App\Console\Commands;

use App\Services\GarageService;
use App\Services\JourneyPatternSectionService;
use App\Services\NptgLocalityService;
use App\Services\OperatorService;
use App\Services\RouteSectionService;
use App\Services\RouteService;
use App\Services\SeviceVehicleJourneyPatternService;
use App\Services\StopService;
use App\Services\VehicleJourneyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use SimpleXMLElement;

class ImportBusMapperXmlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-bus-mapper-xml-data {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import XML data into the database';

    protected $stopService;
    protected $nptgLocalityService;
    protected $operatorService;
    protected $garageService;
    protected $routeService;
    protected $routeSecionService;
    protected $vehicleJourneyService;
    protected $journeyPatternSectionService;
    protected $seviceVehicleJourneyPatternService;

    public function __construct(
        StopService $stopService,
        NptgLocalityService $nptgLocalityService,
        OperatorService $operatorService,
        GarageService $garageService,
        RouteService $routeService,
        RouteSectionService $routeSecionService,
        VehicleJourneyService $vehicleJourneyService,
        JourneyPatternSectionService $journeyPatternSectionService,
        SeviceVehicleJourneyPatternService $seviceVehicleJourneyPatternService )
    {
        parent::__construct();
        $this->nptgLocalityService = $nptgLocalityService;
        $this->stopService = $stopService;
        $this->operatorService = $operatorService;
        $this->garageService = $garageService;
        $this->routeService = $routeService;
        $this->routeSecionService = $routeSecionService;
        $this->vehicleJourneyService = $vehicleJourneyService;
        $this->journeyPatternSectionService = $journeyPatternSectionService;
        $this->seviceVehicleJourneyPatternService  =  $seviceVehicleJourneyPatternService ;
        
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $xmlFile = $this->argument('file');

        if (!File::exists($xmlFile)) {
            $this->error('XML file not found.');
            return;
        }

        try {
            $xmlContent = File::get($xmlFile);
            $xmlData = new SimpleXMLElement($xmlContent);
            
            // Call the nptgLocality service method passing the necessary data
             $this->nptgLocalityService->insertNptgLocalities($xmlData->NptgLocalities->AnnotatedNptgLocalityRef);

            // Call the stop service method passing the necessary data
            $this->stopService->createStop($xmlData->StopPoints->StopPoint);


             // Call the routeSection service method passing the necessary data
            $this->routeSecionService->insertRouteSections($xmlData->RouteSections->RouteSection);

             // Call the Routes service method passing the necessary data
            $this->routeService->insertRoutes($xmlData->Routes->Route);

             // Call the operator service method passing the necessary data
            $this->operatorService->insertOperators($xmlData->Operators->Operator);

             // Call the journey pattern service method passing the necessary data
            $this->journeyPatternSectionService->insertJourneyPatternSections($xmlData->JourneyPatternSections->JourneyPatternSection->JourneyPatternTimingLink);
              
             // Call the sevice VehicleJourney Patterns method and passs the necessary data
            $this->seviceVehicleJourneyPatternService->insertServicesJourneyPattern($xmlData->Services->Service);

              // Call the garage Service and passs the necessary data
            $this->garageService->insertGarages($xmlData->Operators->Operator->Garages->Garage);

             // Call the vehicle Journey Service and passs the necessary data
            $this->vehicleJourneyService->insertVehicleJourney($xmlData->VehicleJourneys->VehicleJourney);

            $this->info('XML data imported successfully.');
        } catch (\Exception $e) {
            dd($e->getLine(), $e->getMessage());
            Log::error('Error importing XML data: ' . $e->getMessage());
            $this->error('An error occurred while importing XML data.');
        }
    }
}
