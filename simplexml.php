<?php

$xmlArr = simplexml_load_file ('people.xml');

$html = '';

foreach ($xmlArr->items->item as $i) {
	$html .=  	'<div class="text">'.
					'<img class="img-block" width="43" height="43" src="'.$i->photo.'" alt="'.$i->name.'" />'.
					'<p class="block-paragraph">' . "\n".
						'<strong>'.$i->name.'</strong><br/>'.
						$i->description.
					'</p>'.
				'</div>';
}

echo $html;
?>