<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\JourneyPatternSection;

class JourneyPatternSectionService
{
    /**
     * Insert JourneyPatternSection data in the database.
     *
     * @param array $journeyPatternSections An array of JourneyPatterns data to be inserted.
     *
     * @todo validation needs to be added.
     * 
     * @return void
     */
    public function insertJourneyPatternSections($journeyPatternSections): void
    {
        $journeyPatternSectionsArray = iterator_to_array($journeyPatternSections);
        $batchSize = 100;
        
        $chunks = array_chunk($journeyPatternSectionsArray, $batchSize);
    
        foreach ($chunks as $batch) {    
            $journeyPatternSectionData = [];
    
            // Map data for JourneyPatternSection within the current batch
            foreach ($batch as $journeyPatternSectionDataItem) {
                // Iterate through each "JourneyPatternTimingLink" in "JourneyPatternTimingLink" array
                foreach ($journeyPatternSectionDataItem->JourneyPatternTimingLink as $link) {
                    $journeyPatternSection = new JourneyPatternSection();
                    $journeyPatternSection->from_activity = (string) $link->From->Activity;
                    $journeyPatternSection->sequence_number = (int) $link->From->attributes()->SequenceNumber;
                    $journeyPatternSection->from_dynamic_destination_display = (string) $link->From->DynamicDestinationDisplay;
                    $journeyPatternSection->from_stop_point_reference = (string) $link->From->StopPointRef;
                    $journeyPatternSection->from_timing_status = (string) $link->From->TimingStatus;
                    $journeyPatternSection->to_activity = (string) $link->To->Activity;
                    $journeyPatternSection->to_dynamic_destination_display = (string) $link->To->DynamicDestinationDisplay;
                    $journeyPatternSection->to_stop_point_reference = (string) $link->To->StopPointRef;
                    $journeyPatternSection->to_timing_status = (string) $link->To->TimingStatus;
    
                    $journeyPatternSectionData[] = $journeyPatternSection->attributesToArray();
                }
            }
    
            // Insert the batch of data into the database
            JourneyPatternSection::insert($journeyPatternSectionData);
        };
    }
}