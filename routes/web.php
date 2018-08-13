<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/', function () {
	/*
	$posts = array(
        		[
	        		"title" => "Построение орбит небесных тел средствами Python",
	        		"description" => "Для нахождения траекторий относительных движений в классической механике используется предположение об абсолютности времени во всех системах отсчета (как инерциальных, так и неинерциальных).",
	        		"content" => "Для нахождения траекторий относительных движений в классической механике используется предположение об абсолютности времени во всех системах отсчета (как инерциальных, так и неинерциальных). 
					Используя данное предположение, рассмотрим движение одной и той же точки в двух различных системах отсчета К и К', из которых вторая движется относительно первой с произвольной скоростью ",
	        		"imgurl" => "https://habrastorage.org/webt/od/ie/1k/odie1kfvgxwkus8qxtmateofkek.png",
	        		"tags" => "Разработка под Windows, Математика, Астрономия, Алгоритмы, Python",
	        		"access" => "free"
	        	],
	        	[
	        		"title" => "Индустрия запусков в Великобритании пробуждается и намечает цели",
	        		"description" => "После множества усилий, предпринятых британским правительством, и долгих лет лоббирования интересов космической индустрии Соединённое Королевство, похоже, возвращается на рынок услуг запуска. Источник изображения: оригинальная статья",
	        		"content" => "После множества усилий, предпринятых британским правительством, и долгих лет лоббирования интересов космической индустрии Соединённое Королевство, похоже, возвращается на рынок услуг запуска. Источник изображения: оригинальная статья

28 октября 1971 года ракета-носитель Black Arrow («Чёрная Стрела») стартовала с испытательного полигона Вумера в Австралии; она успешно вывела небольшой спутник под названием Prospero, созданный с целью изучить влияние космического пространства на орбитальные аппараты. Это был первый случай в истории Британии, когда она запустила полезную нагрузку на ракете собственной разработки и постройки; увы, такое событие стало одновременно и последним подобным, до сих пор.

Ведь тремя месяцами ранее правительство закрыло программу Black Arrow, однако запуск всё равно состоялся, поскольку РН уже доставили в Австралию. По сути, Великобритания стала ещё и первой страной, которая обрела возможность производить орбитальные пуски только чтобы потом тут же отказаться от неё. 

Но теперь, после множества усилий, предпринятых британским правительством, и долгих лет лоббирования интересов космической индустрии Соединённое Королевство, похоже, возвращается на рынок услуг запуска. На Международном авиасалоне в Фарнборо, проходившем в середине июля, официальными лицами был сделан ряд заявлений, согласно которым запланировано восстановление способности страны выводить полезную нагрузку в космос с пусковых площадок на территории государства; однако средства вывода, в большинстве своём, пока будут стороннего производства.",
	        		"imgurl" => "https://habrastorage.org/webt/qt/9v/op/qt9vop-j3kdllpqrw3n_66od--c.jpeg",
	        		"tags" => "Научно-популярное, Космонавтика",
	        		"access" => "free"
	        	],
	        	[
	        		"title" => "Построение орбит небесных тел средствами Python",
	        		"description" => "Для нахождения траекторий относительных движений в классической механике используется предположение об абсолютности времени во всех системах отсчета (как инерциальных, так и неинерциальных).",
	        		"content" => "Для нахождения траекторий относительных движений в классической механике используется предположение об абсолютности времени во всех системах отсчета (как инерциальных, так и неинерциальных). 
					Используя данное предположение, рассмотрим движение одной и той же точки в двух различных системах отсчета К и К', из которых вторая движется относительно первой с произвольной скоростью ",
	        		"imgurl" => "https://habrastorage.org/webt/od/ie/1k/odie1kfvgxwkus8qxtmateofkek.png",
	        		"tags" => "Разработка под Windows, Математика, Астрономия, Алгоритмы, Python",
	        		"access" => "free"
	        	],
        	);
    */ 
    $posts = DB::table("posts")->get();
    return view('index', compact('posts'));

});
