<?php

namespace App\Http\Controllers\Patient\News;

use App\Models\MedicalRecord;
use App\Http\Controllers\Controller;
use jcobhams\NewsApi\NewsApi;

class IndexController extends Controller
{
    public function __invoke()
    {
        $your_api_key = 'b641524362db4286b8b009892f7c4233';
        $newsapi = new NewsApi('641524362db4286b8b009892f7c4233');

        # /v2/everything
        $param = "ru";
        $news = $newsapi->getEverything($param);
        var_dump($news);

        return view('patient.news.index', compact('news'));
    }
}
?>
