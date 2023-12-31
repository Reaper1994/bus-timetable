
# Bus Mapper XML Data Importer

This Laravel command line tool imports XML data into a database. 

## Installation

1. Install Laravel.
2. Clone this repository.
3. Run `composer install`.
4. Create a `.env` file and add your database credentials.
5. Run `php artisan migrate`.

## Usage

To import XML data, run the following command:

```
php artisan import-bus-mapper-xml-data {file}
```

Where `{file}` is the path to the XML file. some example files are used in the public directory

eg
```
php artisan import-bus-mapper-xml-data public/mer_1-10-_-y11-40.xml
```

## Code Explanation

The code is divided into the following classes:

* `ImportBusMapperXmlDataCommand` - the main command class that imports the XML data.
* `StopService` - a service class that handles importing stop data.
* `NptgLocalityService` - a service class that handles importing NPTG locality data.
* `OperatorService` - a service class that handles importing operator data.
* `GarageService` - a service class that handles importing garage data.
* `RouteService` - a service class that handles importing route data.
* `RouteSectionService` - a service class that handles importing route section data.
* `VehicleJourneyService` - a service class that handles importing vehicle journey data.
* `JourneyPatternSectionService` - a service class that  handles importing journey pattern section data.
* `SeviceVehicleJourneyPatternService` - a service class that handles importing service vehicle journey pattern data.

The `ImportBusMapperXmlDataCommand` class is the main class that imports the XML data. It does this by calling the methods of the other service classes.

The `StopService` class handles stop data. It creates a new stop for each stop in the XML data.

The `NptgLocalityService` class handles NPTG locality data. It creates a new NPTG locality for each NPTG locality in the XML data.

The `OperatorService` class handles operator data. It creates a new operator for each operator in the XML data.

The `GarageService` class handles garage data. It creates a new garage for each garage in the XML data.

The `RouteService` class handles route data. It creates a new route for each route in the XML data.

The `RouteSectionService` class handles route section data. It creates a new route section for each route section in the XML data.

The `VehicleJourneyService` class handles vehicle journey data.

Generated by Osmar Rodrigues - @Reaper1994
