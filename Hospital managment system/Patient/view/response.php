<?php

$data = $_GET['datavalue'];

$a = array('Not_Known','Anxiety_Disorders','Depression','Paranoia','Psychosis');
$b = array('Not_Known','Refractive_Errors','Glaucoma','Amblyopia','Strabismus','Cataract');
$c = array('Not_Known','Cavities','Gingivitis','Periodontitis','Oral_Cancer');
$d = array('Not_Known','Arrhythmia','Atherosclerosis','Cardiomyopathy','Heart_Infections');
$e = array('Not_Known','Chronic','Kidney_Stones','Glomerulonephritis','Polycystic');
$f = array('Not_Known','Acne','Cold_Sore','Blister','Hives','Eczema','Lupus');
$g = array('Not_Known','Dementias','Brain_Cancer','Alzheimer','Parkinson’s_Disorder','Stroke');

if($data=="Mental-Health")
{
	foreach($a as $aone)
	{
		echo " <option> $aone </option>" ;
	}
}

if($data == "Eye")
{
	foreach($b as $bone)
	{
		echo " <option> $bone </option>" ;
	}
}

if($data == "Tooth")
{
	foreach($c as $cone)
	{
		echo " <option> $cone </option>" ;
	}
}


if($data == "Heart")
{
	foreach($d as $done)
	{
		echo " <option> $done </option>" ;
	}
}



if($data == "Kidney")
{
	foreach($e as $eone)
	{
		echo " <option> $eone </option>" ;
	}
}


if($data == "Skin")
{
	foreach($f as $fone)
	{
		echo " <option> $fone </option>" ;
	}
}


if($data == "Brain")
{
	foreach($g as $gone)
	{
		echo " <option> $gone </option>" ;
	}
}




?>