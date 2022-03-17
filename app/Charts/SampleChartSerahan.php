<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Serahan;

class SampleChartSerahan extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'chartSerahan';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'SampleChartSerahan';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    public ?string $prefix = 'some_prefix';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth'];


    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $serahans = [];
        $data = [];
        $dataSerahan = [];
        for($i=0; $i<5; $i++)
        {
            $serahans[] = $serahan;

            $dataSerahan = Serahan::where('nama_serahan', 'like', '%' . $serahan . '%');
            $data[] = Record::where('serahan_id', 'like', '%'.$dataSerahan.'%')->count();

        }



        return Chartisan::build()
            ->labels($dataSerahan)
            ->dataset('Record', $data);
    }
}
