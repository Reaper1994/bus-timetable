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
          // Map data for JourneyPatternSection
          foreach ($journeyPatternSections as $journeyPatternSectionData) {
            $journeyPatternSection = new JourneyPatternSection();
            $journeyPatternSection->from_activity = (string) $journeyPatternSectionData->From->Activity;
            $journeyPatternSection->sequence_number = (int) $journeyPatternSectionData->From->attributes()->SequenceNumber;
            $journeyPatternSection->from_dynamic_destination_display = (string) $journeyPatternSectionData->From->DynamicDestinationDisplay;
            $journeyPatternSection->from_stop_point_reference = (string) $journeyPatternSectionData->From->StopPointRef;
            $journeyPatternSection->from_timing_status = (string) $journeyPatternSectionData->From->TimingStatus;
            $journeyPatternSection->to_activity = (string) $journeyPatternSectionData->To->Activity;
            $journeyPatternSection->to_dynamic_destination_display = (string) $journeyPatternSectionData->To->DynamicDestinationDisplay;
            $journeyPatternSection->to_stop_point_reference = (string) $journeyPatternSectionData->To->StopPointRef;
            $journeyPatternSection->to_timing_status = (string) $journeyPatternSectionData->To->TimingStatus;

            $journeyPatternSection->save();
        }
    }
}