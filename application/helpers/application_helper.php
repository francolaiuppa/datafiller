<?php
// here we will have the helper functions
function get_tables_array() {
	$CI =& get_instance();
	$tables = $CI->db->list_tables();
	return $tables; 
}


function get_table_li_items($current_table = null) {
	$tables = get_tables_array();
	$result = '';
	foreach ($tables as $table) {
		$selected = '';
		if ($current_table == $table) { $selected .= ' class="active"'; }
		$result .= '<li'.$selected.'>'.anchor('view/'.$table,$table).'</li>';
	}
	return $result;
}

function get_insert_rows_dropdown() {
	$CI =& get_instance();
	$data = array();
	for ($i=1;$i<=1000;$i++) {
		$data[] = $i;
	}
	return form_dropdown('how_many_rows',$data,null,'class="select-small"');
}

function get_data_filler_types_dropdown($field) {
  return '<select name="fields_fill_type['.$field.']" data-field_name="'.$field.'">
  	<option value="">Please select</option>
  	<option value="null">NULL</option>
  	<option value="md5">md5 of </option>
  	<option value="fixed_value">Fixed value (Single)</option>
  	<option value="fixed_value_multiple">Fixed value (Multiple)</option>
    <option value="fullname">Fullname (First+Last)</option>
    <option value="first_name">First Name</option>
    <option value="last_name">Last Name</option>
    <option value="email">Email</option>
    <option value="country">Country</option>
    <option value="other_table_key">Other table field</option>
    <option value="current_date">Current Date (Y-m-d)</option>
    <option value="current_datetime">Current DateTime (Y-m-d H:i:s)</option>
    <option value="current_mktime">Current mktime()</option>
    <option value="current_time">Current Time (H:i:s)</option>
    <option value="integer">Integer (No decimal numbers)</option>
    <option value="float">Float (Decimal numbers)</option>
    <option value="address">Address</option>
    <option value="phone">Phone</option>
    <option value="ip">IP Address</option>
    <option value="between_dates_date">Random between two dates (date)</option>
    <option value="between_dates_datetime">Random between two dates (datetime)</option>
    <option value="between_dates_mktime">Random between two dates (mktime)</option>
    <option value="url">URL</option>
  </select>';
}

function get_current_database_name() {
	$CI =& get_instance();
	return $CI->db->database;
}

function get_hardcoded_data_item($key) {
	$data = get_hardcoded_data($key);
	shuffle($data);
	if (!is_array($data)) { die(var_dump($data)); }
	return array_shift($data);
}

function get_hardcoded_data($key) {
// random data arrays
$random_data = array(
	'first_name'=>array(
'Darren',
'Max',
'Maricela',
'Neil',
'Allan',
'Louisa',
'Odessa',
'Benita',
'Nita',
'Cody',
'Tameka',
'Zelma',
'Elnora',
'Tania',
'Tia',
'Sofia',
'Nelson',
'Alejandra',
'Earlene',
'Selena',
'Chandra',
'Maricela',
'Clayton',
'Jamie',
'Sofia',
'Marylou',
'Clayton',
'Penelope',
'Guy',
'Allan',
'Jamie',
'Neil',
'Julio',
'Nita',
'Esmeralda',
'Julio',
'Tyrone',
'Harriett',
'Nelson',
'Kelly',
'Clinton',
'Jeanie',
'Tyrone',
'Neil',
'Lance',
'Noreen',
'Mallory',
'Lonnie',
'Rosalinda',
'Guy',
'Neva',
'Fernando',
'Chandra',
'Esmeralda',
'Allyson',
'Gay',
'Nelson',
'Cody',
'Clinton',
'Dona',
'Kelly',
'Guy',
'Kelly',
'Clayton',
'Alejandra',
'Nannie',
'Kelly',
'Kurt',
'Rosalinda',
'Amie',
'Hugh',
'Edwina',
'Loraine',
'Louisa',
'Tyrone',
'Nannie',
'Serena',
'Nelson',
'Dollie',
'Alejandra',
'Neil',
'Lorrie',
'Clayton',
'Annabelle',
'Milagros',
'Lorrie',
'Earnestine',
'Louisa',
'Darryl',
'Noreen',
'Allie',
'Hillary',
'Roslyn',
'Darren',
'Jessie',
'Julio',
'Cody',
'Cody',
'Tabatha',
'Clinton',
'Avis',
'Sofia',
'Kathrine',
'Dona',
'Cody',
'Tameka',
'Mathew',
'Eve',
'Rae',
'Alejandra',
'Mathew',
'Alana',
'Alana',
'Julio',
'Cody',
'Clinton',
'Lonnie',
'Rosalinda',
'Kathrine',
'Sharron',
'Rosalinda',
'Annabelle',
'Neil',
'Earlene',
'Clinton',
'Ashlee',
'Fernando',
'Javier',
'Benita',
'Ted',
'Eve',
'Allan',
'Jessie',
'Erik',
'Allan',
'Mathew',
'Guy',
'Earnestine',
'Mallory',
'Darren',
'Julio',
'Katy',
'Kelly',
'Julio',
'Sofia',
'Louisa',
'Darryl',
'Benita',
'Javier',
'Selena',
'Cody',
'Penelope',
'Hugh',
'Darryl',
'Lonnie',
'Jamie',
'Clayton',
'Rae',
'Neva',
'Marcie',
'Erik',
'Erik',
'Max',
'Jeanie',
'Allan',
'Lance',
'Kelly',
'Fernando',
'Clare',
'Christian',
'Julio',
'Tyrone',
'Karina',
'Annabelle',
'Mallory',
'Karina',
'Clinton',
'Darren',
'Clinton',
'Clinton',
'Penelope',
'Javier',
'Nita',
'Allan',
'Esmeralda',
'Darryl',
'Allan',
'Clare',
'Sharron',
'Erik',
'Elinor',
'Ericka',
'Max',
'Mallory',
'Alejandra',
'Hugh',
'Kurt',
'Allan',
'Guy',
'Katy',
'Kurt',
'Mathew',
'Lakisha',
'Malinda',
'Christian',
'Pearlie',
'Tanisha',
'Lance',
'Margery',
'Ericka',
'Darryl',
'Rae',
'Kelly',
'Allie',
'Lonnie',
'Clayton',
'Amie',
'Lonnie',
'Lorrie',
'Mathew',
'Ted',
'Christian',
'Jessie',
'Lakisha',
'Darryl',
'Mathew',
'Ericka',
'Ted',
'Fernando',
'Ted',
'Selena',
'Ericka',
'Noreen',
'Cody',
'Edwina',
'Cody',
'Jessie',
'Guy',
'Tabatha',
'Elinor',
'Christian',
'Elnora',
'Elnora',
'Malinda',
'Edwina',
'Mathew',
'Hugh',
'Tania',
'Darryl',
'Mathew',
'Harriett',
'Darryl',
'Fernando',
'Jessie',
'Sofia',
'Mathew',
'Liza',
'Alejandra',
'Earnestine',
'Darren',
'Javier',
'Erik',
'Neil',
'Erik',
'Darryl',
'Benita',
'Lonnie',
'Marcie',
'Jamie',
'Liza',
'Mathew',
'Kenya',
'Clayton',
'Jamie',
'Fernando',
'Allie',
'Malinda',
'Lilia',
'Jessie',
'Fernando',
'Alana',
'Lance',
'Cody',
'Harriett',
'Zelma',
'Darryl',
'Hugh',
'Malinda',
'Rosalinda',
'Julio',
'Sharron',
'Amie',
'Benita',
'Christian',
'Erik',
'Fernando',
'Tania',
'Carmella',
'Julianne',
'Darryl',
'Carmella',
'Cody',
'Kathrine',
'Lakisha',
'Clare',
'Tabatha',
'Kurt',
'Jami',
'Clinton',
'Christian',
'Clinton',
'Annabelle',
'Tania',
'Fernando',
'Javier',
'Noemi',
'Nelson',
'Pearlie',
'Tia',
'Max',
'Clayton',
'Cody',
'Christian',
'Kelly',
'Roxie',
'Allyson',
'Ashlee',
'Lilia',
'Kelly',
'Carlene',
'Erik',
'Max',
'Guy',
'Tyrone',
'Louisa',
'Dollie',
'Tabatha',
'Neva',
'Tyrone',
'Kurt',
'Hillary',
'Odessa',
'Milagros',
'Zelma',
'Max',
'Javier',
'Allyson',
'Emilia',
'Lance',
'Penelope',
'Dollie',
'Chandra',
'Dollie',
'Margery',
'Max',
'Fernando',
'Neva',
'Rosalinda',
'Nelson',
'Clinton',
'Allan',
'Jamie',
'Darryl',
'Allie',
'Clinton',
'Lance',
'Benita',
'Annabelle',
'Selena',
'Julio',
'Hugh',
'Neil',
'Melisa',
'Darryl',
'Carmella',
'Darren',
'Javier',
'Elnora',
'Pearlie',
'Tyrone',
'Rae',
'Sharron',
'Lonnie',
'Kelly',
'Alejandra',
'Clayton',
'Malinda',
'Lilia',
'Neil',
'Max',
'Tameka',
'Ashlee',
'Christian',
'Neil',
'Roxie',
'Hugh',
'Kelly',
'Cody',
'Clayton',
'Roxie',
'Lenore',
'Annabelle',
'Lonnie',
'Tabatha',
'Nita',
'Javier',
'Liza',
'Noreen',
'Lonnie',
'Javier',
'Tabatha',
'Tania',
'Mathew',
'Guy',
'Christian',
'Carlene',
'Margery',
'Kelly',
'Erik',
'Mathew',
'Rae',
'Lakisha',
'Edwina',
'Allyson',
'Jamie',
'Lakisha',
'Roxie',
'Jessie',
'Fernando',
'Selena',
'Christian',
'Roslyn',
'Jerri',
'Mallory',
'Julianne',
'Edwina',
'Malinda',
'Lance',
'Hugh',
'Darryl',
'Lonnie',
'Loraine',
'Clinton',
'Chandra',
'Max',
'Eve',
'Rae',
'Max',
'Neil',
'Max',
'Kurt',
'Tyrone',
'Nita',
'Hugh',
'Allan',
'Lonnie',
'Allyson',
'Jessie',
'Julio',
'Gay',
'Tabatha',
'Loraine',
'Guy',
'Ted',
'Erik',
'Tyrone',
'Fernando',
'Kenya',
'Mathew',
'Roxie',
'Tabatha',
'Lance',
'Julio',
'Odessa',
'Kelly',
'Allan',
'Max',
'Kelly',
'Jamie',
'Karina',
'Jeanie',
'Kurt',
'Max',
'Zelma',
'Julianne',
'Christian',
'Penelope',
'Julio',
'Neil',
'Kurt',
'Tia',
'Max',
'Cody',
'Odessa',
'Sharron',
'Nita',
'Jessie',
'Clayton',
'Clinton',
'Sharron',
'Amie',
'Amie',
'Allan',
'Allan',
'Max',
'Dona',
'Benita',
'Kathrine',
'Fernando',
'Neil',
'Hugh',
'Max',
'Javier',
'Louisa',
'Fernando',
'Tyrone',
'Jessie',
'Kathrine',
'Allyson',
'Louisa',
'Noreen',
'Darcy',
'Hugh',
'Lonnie',
'Jamie',
'Javier',
'Roslyn',
'Cody',
'Tia',
'Clayton',
'Julio',
'Clinton',
'Eve',
'Dona',
'Lance',
'Darryl',
'Tabatha',
'Clayton',
'Cody',
'Dona',
'Nelson',
'Jessie',
'Tyrone',
'Elinor',
'Tia',
'Lilia',
'Allan',
'Ted',
'Cody',
'Clayton',
'Max',
'Kurt',
'Ted',
'Lakisha',
'Avis',
'Max',
'Cody',
'Mathew',
'Tyrone',
'Neva',
'Tabatha',
'Mallory',
'Mallory',
'Erik',
'Julio',
'Hugh',
'Fernando',
'Lance',
'Zelma',
'Elnora',
'Lenore',
'Allan',
'Jessie',
'Saundra',
'Allan',
'Mathew',
'Pearlie',
'Darren',
'Mathew',
'Guy',
'Lakisha',
'Jerri',
'Nita',
'Allie',
'Kelly',
'Hugh',
'Guy',
'Ted',
'Erik',
'Christian',
'Marcie',
'Elinor',
'Zelma',
'Neil',
'Jamie',
'Max',
'Lonnie',
'Lance',
'Nelson',
'Nelson',
'Darryl',
'Nelson',
'Sharron',
'Ted',
'Edwina',
'Nita',
'Ted',
'Jessie',
'Edwina',
'Clinton',
'Pearlie',
'Katy',
'Lance',
'Jamie',
'Mallory',
'Nelson',
'Darren',
'Guy',
'Nelson',
'Elinor',
'Lance',
'Clinton',
'Clayton',
'Roxie',
'Neil',
'Avis',
'Chandra',
'Tyrone',
'Rae',
'Selena',
'Selena',
'Dollie',
'Hugh',
'Ted',
'Saundra',
'Noemi',
'Esmeralda',
'Fernando',
'Allie',
'Avis',
'Carmella',
'Jamie',
'Julio',
'Noreen',
'Noreen',
'Marylou',
'Marylou',
'Tyrone',
'Allyson',
'Hugh',
'Sofia',
'Lakisha',
'Kathrine',
'Sharron',
'Rae',
'Gay',
'Dona',
'Nannie',
'Tabatha',
'Clinton',
'Lonnie',
'Javier',
'Allyson',
'Hugh',
'Esmeralda',
'Jessie',
'Darren',
'Christian',
'Christian',
'Darryl',
'Kelly',
'Allan',
'Guy',
'Clayton',
'Penelope',
'Lakisha',
'Lonnie',
'Gay',
'Lance',
'Maricela',
'Kelly',
'Selena',
'Jamie',
'Allan',
'Karina',
'Ericka',
'Avis',
'Gay',
'Christian',
'Clinton',
'Nelson',
'Serena',
'Clare',
'Penelope',
'Rosalinda',
'Darren',
'Darryl',
'Max',
'Lance',
'Darren',
'Max',
'Dona',
'Tyrone',
'Erik',
'Odessa',
'Sofia',
'Kurt',
'Darcy',
'Clinton',
'Chandra',
'Kelly',
'Katy',
'Tyrone',
'Javier',
'Selena',
'Roxie',
'Roxie',
'Kurt',
'Noreen',
'Julianne',
'Carmella',
'Tameka',
'Darryl',
'Julio',
'Clayton',
'Neva',
'Darryl',
'Cody',
'Javier',
'Hugh',
'Althea',
'Chandra',
'Javier',
'Jamie',
'Tabatha',
'Allan',
'Allie',
'Jessie',
'Lilia',
'Jessie',
'Jamie',
'Erik',
'Clinton',
'Sharron',
'Roslyn',
'Alana',
'Elnora',
'Mathew',
'Julio',
'Hillary',
'Tyrone',
'Darryl',
'Max',
'Clayton',
'Alana',
'Allan',
'Gay',
'Tabatha',
'Allie',
'Tameka',
'Sharron',
'Julianne',
'Liza',
'Tyrone',
'Fernando',
'Kelly',
'Edwina',
'Clayton',
'Clayton',
'Lonnie',
'Clayton',
'Darcy',
'Nannie',
'Mathew',
'Mathew',
'Lilia',
'Allan',
'Mathew',
'Nelson',
'Lonnie',
'Darcy',
'Tyrone',
'Guy',
'Pearlie',
'Ericka',
'Kelly',
'Lance',
'Clayton',
'Ericka',
'Nita',
'Gay',
'Lonnie',
'Lonnie',
'Allie',
'Darryl',
'Mallory',
'Esmeralda',
'Julianne',
'Lorrie',
'Milagros',
'Cody',
'Margery',
'Julio',
'Jessie',
'Alejandra',
'Clayton',
'Javier',
'Hugh',
'Alejandra',
'Odessa',
'Allan',
'Javier',
'Tania',
'Darren',
'Clare',
'Tania',
'Cody',
'Lenore',
'Tia',
'Selena',
'Lorrie',
'Serena',
'Mathew',
'Kurt',
'Lakisha',
'Hugh',
'Hugh',
'Pearlie',
'Dollie',
'Benita',
'Tyrone',
'Tanisha',
'Kurt',
'Allan',
'Harriett',
'Tyrone',
'Earnestine',
'Kelly',
'Guy',
'Julio',
'Penelope',
'Carlene',
'Darren',
'Clayton',
'Earlene',
'Neil',
'Maricela',
'Jamie',
'Jami',
'Harriett',
'Annabelle',
'Ericka',
'Noemi',
'Cody',
'Neil',
'Max',
'Emilia',
'Dollie',
'Hugh',
'Liza',
'Emilia',
'Zelma',
'Lonnie',
'Jamie',
'Clare',
'Avis',
'Althea',
'Christian',
'Javier',
'Julio',
'Julio',
'Rae',
'Mathew',
'Fernando',
'Pearlie',
'Tyrone',
'Hugh',
'Tyrone',
'Hugh',
'Erik',
'Sharron',
'Nelson',
'Guy',
'Noreen',
'Tania',
'Jamie',
'Lance',
'Ted',
'Tyrone',
'Tabatha',
'Lakisha',
'Tania',
'Christian',
'Julianne',
'Julio',
'Elnora',
'Avis',
'Julianne',
'Cody',
'Carmella',
'Noreen',
'Hillary',
'Mathew',
'Carmella',
'Clinton',
'Jamie',
'Serena',
'Nita',
'Erik',
'Dona',
'Kelly',
'Ted',
'Darcy',
'Kathrine',
'Lance',
'Erik',
'Jerri',
'Clinton',
'Lonnie',
'Tanisha',
'Rae',
'Rae',
'Clayton',
'Sofia',
'Amie',
'Hugh',
'Clayton',
'Darryl',
'Jessie',
'Ted',
'Guy',
'Mathew',
'Tyrone',
'Kenya',
'Tia',
'Clinton',
'Mathew',
'Katy',
'Jerri',
'Maricela',
'Kathrine',
'Lonnie',
'Javier',
'Lonnie',
'Earnestine',
'Allie',
'Allyson',
'Max',
'Lakisha',
'Earnestine',
'Dollie',
'Ashlee',
'Edwina',
'Clare',
'Tyrone',
'Ericka',
'Avis',
'Rosalinda',
'Lance',
'Noemi',
'Lance',
'Ted',
'Ericka',
'Earnestine',
'Neva',
'Tameka',
'Penelope',
'Althea',
'Avis',
'Javier',
),
	'last_name'=>array(
'Hetherington',
'Dardon',
'Frankhouser',
'Riesgo',
'Glaude',
'Arn',
'Hur',
'Sparr',
'Ausmus',
'Paneto',
'Eckley',
'Gossard',
'Everly',
'Ranney',
'Flock',
'Revel',
'Doughtie',
'Gendreau',
'Jakubowski',
'Lauber',
'Fravel',
'Mallari',
'Resto',
'Kilman',
'Cashen',
'Lucien',
'Hajek',
'Chilson',
'Deng',
'Penman',
'Uhrig',
'Wiltsie',
'Winegar',
'Conely',
'Karle',
'Rakow',
'Haxton',
'Brumm',
'Pomerleau',
'Petters',
'Benbow',
'Blowe',
'Enger',
'Hannaman',
'Frakes',
'Darrah',
'Mccausland',
'Acklin',
'Willmore',
'Comes',
'Haar',
'Dildy',
'Meaux',
'Hendershott',
'Mentzer',
'Lanasa',
'Matton',
'Baden',
'Madere',
'Cervone',
'Stumpff',
'Andrzejewski',
'Boonstra',
'Points',
'Wolski',
'Wire',
'Wilhoite',
'Susi',
'Conkle',
'Beesley',
'Steptoe',
'Newbern',
'Wehrle',
'Blomquist',
'Shelnutt',
'Liner',
'Tinnin',
'Orso',
'Fugitt',
'Liberto',
'Fetterman',
'Pikes',
'Servin',
'Herriott',
'Slonaker',
'Rentz',
'Swihart',
'Notter',
'Girouard',
'Kleckner',
'Militello',
'Mraz',
'Hymas',
'Bien',
'Gundlach',
'Grivas',
'Barnaby',
'Reagle',
'Tewell',
'Wirta',
'Fowkes',
'Diekmann',
'Bouyer',
'Mcnichol',
'Witty',
'Niver',
'Gimpel',
'Gosha',
'Brodmerkel',
'Jiggetts',
'Lev',
'Teston',
'Hartson',
'Arn',
'Avans',
'Gauna',
'Herford',
'Kantor',
'Mork',
'Leduc',
'Kogut',
'Melgarejo',
'Bonacci',
'Vanhorne',
'Pryce',
'Rabon',
'Pannone',
'Burman',
'Scurry',
'Pottorff',
'Bustillos',
'Brungardt',
'Loudon',
'Creasey',
'Horstmann',
'Gander',
'Pilato',
'Corprew',
'Ashlock',
'Mangual',
'Bologna',
'Mailhot',
'Ritenour',
'Edgemon',
'Nickols',
'Bohannan',
'Cardon',
'Hillenbrand',
'Meals',
'Osornio',
'Alcina',
'Bartolo',
'Gilford',
'Highland',
'Wolbert',
'Moeckel',
'Oda',
'Uselton',
'Stirling',
'Newbury',
'Sypher',
'Kreider',
'Pavone',
'Mccane',
'Aumann',
'Boer',
'Zier',
'Macintosh',
'Bausch',
'Criado',
'Baltes',
'Charney',
'Langner',
'Perl',
'Loose',
'Nolley',
'Elsey',
'Colgan',
'Pullin',
'Spurling',
'Iliff',
'Bronk',
'Perham',
'Thiele',
'Labree',
'Astorga',
'Broad',
'Griffeth',
'Tookes',
'Alejandre',
'Mackowiak',
'Hutsell',
'Baskins',
'Phung',
'Cristobal',
'Coby',
'Grajales',
'Polich',
'Beiler',
'Pillot',
'Serrao',
'Pavia',
'Messana',
'Moor',
'Klosterman',
'Hadlock',
'Seibold',
'Fauntleroy',
'Heitzman',
'Henegar',
'Hodo',
'Lan',
'Gaudin',
'Mei',
'Smidt',
'Kemble',
'Hering',
'Every',
'Tineo',
'Colgan',
'Davalos',
'Hansford',
'Jurgensen',
'Leite',
'Mcchriston',
'Krawczyk',
'Hamric',
'Honore',
'Zwick',
'Deshotel',
'Ebron',
'Stam',
'Saltsman',
'Tristan',
'Vigna',
'Netzer',
'Mosbey',
'Giang',
'Kalin',
'Pettey',
'Kosinski',
'Mcgarrah',
'Blandford',
'Mae',
'Galle',
'Trembly',
'Lamphear',
'Maker',
'Vannote',
'Heggie',
'Nghiem',
'Stringfield',
'Westerberg',
'Buff',
'Mcgarrah',
'Heffelfinger',
'Cousineau',
'Merideth',
'Klumpp',
'Taul',
'Syring',
'Wehling',
'Widger',
'Fagin',
'Plotkin',
'Vena',
'Cumpston',
'Dahlin',
'Finnen',
'Haigler',
'Winship',
'Uplinger',
'Racanelli',
'Braatz',
'Brannigan',
'Bohan',
'Locust',
'Drinkard',
'Mansker',
'Masiello',
'Saleem',
'Wedge',
'Marchal',
'Crownover',
'Skoglund',
'Compos',
'Rosinski',
'Ormiston',
'Pulsifer',
'Tillett',
'Even',
'Smelcer',
'Vaquera',
'Kinman',
'Ta',
'Duley',
'Gillooly',
'Boon',
'Mahood',
'Ivers',
'Biondi',
'Freels',
'Slifer',
'Storment',
'Tomczak',
'Turmelle',
'Gidley',
'Mcgowin',
'Steimle',
'Chattin',
'Burciaga',
'Utz',
'Schwabe',
'Kandoll',
'Caughman',
'Karter',
'Valenza',
'Adan',
'Morrisette',
'Hem',
'Gaccione',
'Isakson',
'Pastrana',
'Swatzell',
'Montanye',
'Cavins',
'Poeppelman',
'Mckissack',
'Gelinas',
'Wilken',
'Roker',
'Lis',
'Bradway',
'Mignone',
'Detamore',
'Mari',
'Sheedy',
'July',
'Mccaw',
'Luckie',
'Bartee',
'Carlen',
'Printup',
'Ramthun',
'Sheahan',
'Nathaniel',
'Siers',
'Ruse',
'Mudge',
'Bonet',
'Latimore',
'Powley',
'Liberty',
'Jaillet',
'Applin',
'Corl',
'Braverman',
'Montealegre',
'Choiniere',
'Pyper',
'Longwell',
'Pou',
'Guglielmo',
'Dancer',
'Timothy',
'Pallas',
'Madeiros',
'Goza',
'Hobdy',
'Doi',
'Tollison',
'Lafuente',
'Severa',
'Racicot',
'Cortese',
'Ballweg',
'Campas',
'Urick',
'Kafka',
'Renna',
'Loman',
'Edlin',
'Knappenberger',
'Sutera',
'Smullen',
'Whitmarsh',
'Lotts',
'Fane',
'Weary',
'Barwick',
'Spiro',
'Deaner',
'Palau',
'Reller',
'Granville',
'Kimler',
'Fiorita',
'Rohlfing',
'Mill',
'Ruge',
'Hagedorn',
'Carrales',
'Marth',
'Twine',
'Ronco',
'Human',
'Gryder',
'Fleig',
'Puzo',
'Mcquillan',
'Bal',
'Orsborn',
'Sluss',
'Lapoint',
'Sharon',
'Basnett',
'Kotch',
'Bontrager',
'Ceron',
'Spohn',
'Stumpff',
'Cripps',
'Kawasaki',
'Reder',
'Kervin',
'Schiel',
'Arline',
'Ostendorf',
'Levert',
'Kuo',
'Lizaola',
'Gasper',
'Meaney',
'Kealey',
'Launius',
'Wegman',
'Donis',
'Herzig',
'Neitzel',
'Nasser',
'Lovick',
'Cashin',
'Slaugh',
'Dehn',
'Mccullah',
'Kieser',
'Lundblad',
'Glowacki',
'Ell',
'Mazariegos',
'Pablo',
'Eells',
'Kerbs',
'Blass',
'Casebolt',
'Guarisco',
'Riveria',
'Culley',
'Simerly',
'Leroux',
'Trojanowski',
'Mcmorran',
'Bucholz',
'Husain',
'Sullenger',
'Dedios',
'Schoenberger',
'Larimore',
'Snellgrove',
'Welles',
'Kazee',
'Skelley',
'Luebbert',
'Odowd',
'Sobczak',
'Reppert',
'Rackers',
'Dashiell',
'Stuber',
'Bonam',
'Xu',
'Plum',
'Rasch',
'Savard',
'Yarger',
'Willmon',
'Tignor',
'Gedeon',
'Garron',
'Cotnoir',
'Fonder',
'Wilcoxon',
'Crofts',
'Ketterman',
'Petrowski',
'Rossow',
'Shiner',
'Maysonet',
'Corprew',
'Courtemanche',
'Sturges',
'Vroman',
'Sloss',
'Gundlach',
'Kennerson',
'Chilcott',
'Recalde',
'Soderstrom',
'Kollman',
'Valenzula',
'Mahar',
'Raske',
'Leinen',
'Gerena',
'Lint',
'Velasques',
'Markgraf',
'Rexroad',
'Siddiqui',
'Dillahunty',
'Revard',
'Jozwiak',
'Mazzeo',
'Cranfield',
'Gosier',
'Flug',
'Sparkes',
'Moench',
'Heatherly',
'Hendryx',
'Vanzile',
'Vital',
'Giard',
'Mannings',
'Mill',
'Knopf',
'Mcelveen',
'Cassese',
'Mcgahan',
'Lichtenberg',
'Emling',
'Cheslock',
'Officer',
'Calise',
'Sterba',
'Marsden',
'Neifert',
'Eckley',
'Rine',
'Rolls',
'Helbig',
'Barranco',
'Empson',
'Hoggan',
'Storck',
'Strohm',
'Antunez',
'Wanke',
'Compos',
'Montealegre',
'Zebrowski',
'Maag',
'Depaoli',
'Bongiorno',
'Kesten',
'Hinkson',
'Valcourt',
'Holtsclaw',
'Gast',
'Urenda',
'Kuehne',
'Palomares',
'Vess',
'Pecora',
'Lozoya',
'Houchin',
'Nilles',
'Clever',
'Blandford',
'Caicedo',
'Whitelow',
'Veiga',
'Byford',
'Orso',
'Briski',
'Zingaro',
'Lozoya',
'Sybert',
'Odonoghue',
'Castrejon',
'Lamoreaux',
'Miceli',
'Crosier',
'Giuliani',
'Widner',
'Satterlee',
'Labuda',
'Michaelsen',
'Trezza',
'Plaster',
'Farabee',
'Willet',
'Cartledge',
'Wolak',
'Knerr',
'Corp',
'Bundrick',
'Manzi',
'Fernando',
'Lamer',
'Rentschler',
'Cuffee',
'Beecham',
'Schwenk',
'Tillison',
'Smale',
'Obannon',
'Homes',
'Crichlow',
'Lewellyn',
'Seo',
'Mowrer',
'Shawgo',
'Bruder',
'Sayegh',
'Melder',
'Brownson',
'Wink',
'Schorr',
'Boyton',
'Fuentez',
'Petermann',
'Dusek',
'Waldrep',
'Faries',
'Liebman',
'Adkisson',
'Schiavone',
'Cueto',
'Haycock',
'Lape',
'Wansley',
'Hitz',
'Flaugher',
'Mcgilvray',
'Hippert',
'Dunsmore',
'Aten',
'Knapik',
'Cansler',
'Harstad',
'Melder',
'Flatley',
'Stroope',
'Alvis',
'Crown',
'Dillenbeck',
'Landi',
'Glickman',
'Randel',
'Hudkins',
'Harth',
'Garton',
'Schuh',
'Morfin',
'Caster',
'Pennywell',
'Mork',
'Sherrow',
'Lokey',
'Temblador',
'Sieren',
'Fairweather',
'Byard',
'Diller',
'Pon',
'Rugh',
'Batterton',
'Grange',
'Twist',
'Castrejon',
'Padula',
'Wiesner',
'Strelow',
'Nesby',
'Arcos',
'Spalla',
'Ragon',
'Rieves',
'Kostka',
'Burgoon',
'Amado',
'Vannorman',
'Pasley',
'Diebold',
'Renard',
'Mccollom',
'Allgeier',
'Truesdell',
'Seligman',
'Patout',
'Endo',
'Imai',
'Bossert',
'Ravencraft',
'Rients',
'Folson',
'Warnke',
'Buchner',
'Hicklin',
'Arjona',
'Preslar',
'Lollar',
'Hixenbaugh',
'Pilot',
'Reisinger',
'Gallucci',
'Sandavol',
'Eble',
'Lembke',
'Spainhour',
'Ewen',
'Edgington',
'Kier',
'Zenz',
'Mitra',
'Vanderhoff',
'Madonia',
'Schlagel',
'Roughton',
'Sylvest',
'Bovee',
'Patz',
'Jaqua',
'Tolan',
'Domenech',
'Millette',
'Sambrano',
'Munos',
'Kulesza',
'Rieder',
'Grossen',
'Retherford',
'Parrinello',
'Lords',
'Medders',
'Aday',
'Justis',
'Crimi',
'Longmore',
'Whipkey',
'Suddarth',
'Prim',
'Beerman',
'Michalec',
'Cypher',
'Hornbaker',
'Chia',
'Callejas',
'Elsberry',
'Reith',
'Demay',
'Bartram',
'Hoda',
'Haddox',
'Hassinger',
'Giuliano',
'Mccay',
'Kellerhouse',
'Weibel',
'Seegmiller',
'Taitt',
'Beagle',
'Kenton',
'Mcfarlain',
'Mcroy',
'Reichel',
'Lobo',
'Lynde',
'Keesling',
'Doner',
'Mealey',
'Bento',
'Lax',
'Detweiler',
'Biondo',
'Denicola',
'Alexandre',
'Glad',
'Yin',
'Bjornstad',
'Rieser',
'Kai',
'Kells',
'Mcfate',
'Lentine',
'Quesnel',
'Hodo',
'Vidaurri',
'Jusino',
'Nodal',
'Edgerly',
'Toft',
'Yearsley',
'Jess',
'Roiger',
'Cossey',
'Hughston',
'Mangels',
'Dalby',
'Goodfellow',
'Hitchings',
'Kopczynski',
'Lagace',
'Mayeux',
'Castano',
'Nordin',
'Zukowski',
'Jamal',
'Kolstad',
'Trojanowski',
'Attebery',
'Hedman',
'Samms',
'Milo',
'Stodola',
'Kluck',
'Crafts',
'Calero',
'Rowse',
'Hentges',
'Nees',
'Kinkade',
'Ethington',
'Allaire',
'Virden',
'Thurmon',
'Lesesne',
'Haydel',
'Zwiebel',
'Beauvais',
'Koelling',
'Gouge',
'Fuson',
'Weist',
'Hoefer',
'Bondi',
'Wiseley',
'Lamacchia',
'Columbia',
'Navarrette',
'Lederer',
'Bernhard',
'Wallner',
'Igoe',
'Knuth',
'Smit',
'Pantaleo',
'Maez',
'Eriksson',
'Hasler',
'Teets',
'Mervis',
'Wishon',
'Ozment',
'Filippini',
'Tippett',
'Weinman',
'Malatesta',
'Lueders',
'Krall',
'Burda',
'Clasen',
'Sharpless',
'Blough',
'Facer',
'Eilerman',
'Engelke',
'Tusing',
'Pinckard',
'Corl',
'Overholt',
'Paglia',
'Vandever',
'Swims',
'Dahmer',
'Oldenkamp',
'Gaver',
'Giberson',
'Hohman',
'Escalona',
'Ventimiglia',
'Defrank',
'Towles',
'Boxx',
'Situ',
'Irion',
'Mike',
'Vanguilder',
'Kantner',
'Felten',
'Hawbaker',
'Ducan',
'Cataldo',
'Hsieh',
'Stalzer',
'Castello',
'Myrie',
'Pentz',
'Officer',
'Simental',
'Mondor',
'Schwein',
'Gajewski',
'Hedman',
'Tagle',
'Bellman',
'Rezentes',
'Lipinski',
'Garofalo',
'Gerhart',
'Bartholow',
'Sermons',
'Carle',
'Gallager',
'Woolverton',
'Utz',
'Heims',
'Amodeo',
'Villar',
'Matsunaga',
'Bilby',
'Hug',
'Gilbo',
'Hoekstra',
'Ruffo',
'Hardrick',
'Truelove',
'Kennan',
'Stanko',
'Hollen',
'Brassfield',
'Hennis',
'Reddin',
'Najarro',
'Evanson',
'Hixenbaugh',
'Shawl',
'Trinkle',
'Sobol',
'Nobbe',
'Sermons',
'Schiavo',
'Bohnsack',
'Willison',
'Corns',
'Heffron',
'Obregon',
'Pietsch',
'Guilbault',
'Cheeseman',
'Lafromboise',
'Pinzon',
'Grado',
'Hooser',
'Finkel',
'Lamark',
'Elks',
'Sequeira',
'Killeen',
),
	'country'=>array(
		"Afghanistan",
		"Albania",
		"Algeria",
		"Andorra",
		"Angola",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bhutan",
		"Bolivia",
		"Bosnia and Herzegovina",
		"Botswana",
		"Brazil",
		"Brunei",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cape Verde",
		"Central African Republic",
		"Chad",
		"Chile",
		"China",
		"Colombi",
		"Comoros",
		"Congo (Brazzaville)",
		"Congo",
		"Costa Rica",
		"Cote d'Ivoire",
		"Croatia",
		"Cuba",
		"Cyprus",
		"Czech Republic",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic",
		"East Timor (Timor Timur)",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Ethiopia",
		"Fiji",
		"Finland",
		"France",
		"Gabon",
		"Gambia, The",
		"Georgia",
		"Germany",
		"Ghana",
		"Greece",
		"Grenada",
		"Guatemala",
		"Guinea",
		"Guinea-Bissau",
		"Guyana",
		"Haiti",
		"Honduras",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran",
		"Iraq",
		"Ireland",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea, North",
		"Korea, South",
		"Kuwait",
		"Kyrgyzstan",
		"Laos",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macedonia",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands",
		"Mauritania",
		"Mauritius",
		"Mexico",
		"Micronesia",
		"Moldova",
		"Monaco",
		"Mongolia",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepa",
		"Netherlands",
		"New Zealand",
		"Nicaragua",
		"Niger",
		"Nigeria",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines",
		"Poland",
		"Portugal",
		"Qatar",
		"Romania",
		"Russia",
		"Rwanda",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Vincent",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Serbia and Montenegro",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Slovakia",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"Spain",
		"Sri Lanka",
		"Sudan",
		"Suriname",
		"Swaziland",
		"Sweden",
		"Switzerland",
		"Syria",
		"Taiwan",
		"Tajikistan",
		"Tanzania",
		"Thailand",
		"Togo",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates",
		"United Kingdom",
		"United States",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Vatican City",
		"Venezuela",
		"Vietnam",
		"Yemen",
		"Zambia",
		"Zimbabwe"
	),
'ccTLDs'=>array(
'com',
'net',
'org',
'biz',
'me',
'tv',
'fm'));

	return $random_data[$key];
}