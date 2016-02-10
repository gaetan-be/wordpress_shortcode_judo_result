<?php
/**
 * @package Judo Resultat
 * @version 1.6
 */
/*
Plugin Name: judo_resultat
Plugin URI: 
Description: Permet de créer une table OR / ARGENT / BRONZE
Author: Gaëtan Denaisse
Version: 1.0
Author URI: http://github.com/gaetan-be
*/

function judo_result( $atts, $content = null )
{
	return judo_resultat($atts, $content);
}

function judo_resultat_parse($names){
	return preg_replace("/,/","<br/>", $names);
}

function judo_resultat( $atts, $content = null ) {
	$atts = shortcode_atts(
	    array(
	        'or' => '',
	        'ag' => '',
			'bz' => '',
			'flag'=>''
	    ), $atts);
	    //transforme les paramètres en variables
	    extract($atts);
		ob_start();
		
		echo "<table style=\"margin:none;\">";
		echo "<tr>";		
		if(strlen($flag) > 0){
			echo "<td style=\"padding: 0px; width:64px;align:center;vertical-align: top\";>";
			echo "<img style=\"width: 64px; height=auto;\" src=\"/wp-content/uploads/2015/11/Flag-of-$flag-150x150.png\" title=\"$flag\"/>";
			echo "</td>";
		}
		echo "<td style=\"border: none;vertical-align: top;\">";
		
		echo "<table style=\"border: none\">";
		echo "<tr>";
		
		if(strlen($or) > 0 ){
			echo "<td style=\"border: none;vertical-align: middle;\"><img style=\"width: 32px; height=auto;vertical-align:middle;\" src=\"/wp-content/uploads/2016/01/medal-gold.png\" title=\"Or\"/>&nbsp;&nbsp;&nbsp;Or</td>";
		}
		
		if(strlen($ag) > 0 ){
			echo "<td style=\"border: none;\"><img style=\"width: 32px; height=auto;vertical-align:middle;\" src=\"/wp-content/uploads/2016/01/medal-silver.png\" title=\"Argent\"/>&nbsp;&nbsp;&nbsp;Argent</td>";
		}
		
		if(strlen($bz) > 0 ){
			echo "<td style=\"border: none;\"><img style=\"width: 32px; height=auto;vertical-align:middle;\" src=\"/wp-content/uploads/2016/01/medal-bronze.png\" title=\"Bronze\"/>&nbsp;&nbsp;&nbsp;Bronze</td>";
		}
		
		echo "</tr>";
		echo "<tr>";
		if(strlen($or) > 0 ){
			echo "<td style=\"vertical-align: top;\">".judo_resultat_parse($or)."</td>";	
		}
		
		if(strlen($ag) > 0 ){
			echo "<td style=\"vertical-align: top;\">".judo_resultat_parse($ag)."</td>";
		}
		
		if(strlen($bz) > 0 ){
			echo "<td style=\"vertical-align: top;\">".judo_resultat_parse($bz)."</td>";
		}
		
		echo "</tr>";
		echo "</table>";
		
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		return ob_get_clean();
}
add_shortcode( 'judo_resultat','judo_resultat');
add_shortcode( 'judo_result','judo_result');

