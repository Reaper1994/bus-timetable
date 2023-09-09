<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Operator;

class OperatorService
{
    /**
     * Insert Operators data in the database.
     *
     * @param array $operators An array of Operators data to be inserted.
     *
     * @todo validation needs to be added
     * 
     * @return void
     */
    public function insertOperators($operators): void
    {
         // Map data for Operators
         foreach ($operators as $operatorData) {
           // Try to find an operator by its operator code
            Operator::firstOrCreate([
                'operator_code' => (string) $operatorData->OperatorCode,
            ], [
                'national_operator_code' => (string) $operatorData->NationalOperatorCode,
                'operator_short_name' => (string) $operatorData->OperatorShortName,
                'licence_number' => (string) $operatorData->LicenceNumber,
                // Map other attributes to columns
            ]);
        }
    }
}