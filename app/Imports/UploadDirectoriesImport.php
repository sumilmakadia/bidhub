<?php

namespace App\Imports;

use App\Models\Crest\DirectoryUploads;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadDirectoriesImport implements ToCollection, WithBatchInserts, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        
        
        
        foreach ($rows as $row) 
        {
        
        if($row[0] != 'businessName' && $row[0] !== '' && $row[0] !== null) {
        
        // $lat_long = DB::table('zip_lat_long')->where('zip', $row[7])->first();
							  
		$latitude = '';
		$longitude = '';
							  
// 		if(isset($lat_long)){
// 			$latitude = $lat_long->latitude;
// 			$longitude = $lat_long->longitude;
// 		}
        
        
            DirectoryUploads::updateOrCreate(['businessName'  => $row[0],'email' => $row[2]],
            [
                'businessName'  => $row[0],
				'contactName'   => $row[1],
				'email'         => $row[2],
				'category'      => $row[3],
				'street'        => $row[4],
				'city'          => $row[5],
				'state'         => $row[6],
				'postal'        => $row[7],
				'phoneNumber'   => $row[8],
				'webSite'       => $row[9],
				'contactUrl'    => $row[10],
				'facebook'      => $row[11],
				'twit'          => $row[12],
				'linkdn'        => $row[13],
				'url'           => $row[14],
				'latitude'      => $latitude,
				'longitude'     => $longitude
				
            ]);
        }
        
        }
    }
    
    public function batchSize(): int
    {
        return 50;
    }
    
    public function chunkSize(): int
    {
        return 50;
    }
 
}
