<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImportBusMapperXmlDataTest extends TestCase
{
    use RefreshDatabase; // Refresh the database before and after the test

    /**
     * Test the 'import-bus-mapper-xml-data {file}' Artisan command.
     */
    public function testImportBusMapperXmlDataCommand()
    {
        $filePath = 'public/mer_1-9-_-y11-19.xml';

         $this->artisan('import-bus-mapper-xml-data', ['file' => $filePath])
            ->expectsOutput('XML data imported successfully.') // Assert the expected console output
            ->assertExitCode(0); // Assert that the command exits with a success code

        // Assert: Verify that the data from the sample XML file is inserted into the 'nptg_localities' table
        $this->assertDatabaseHas('nptg_localities', [
            // Define the expected data that should be in the 'nptg_localities' table
                'locality_reference' => 'E0029682',
                'locality_name' => 'Dovecot',
        ]);

        // add more testcases
    }

}