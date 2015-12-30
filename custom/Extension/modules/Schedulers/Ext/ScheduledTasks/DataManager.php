<?php
$job_strings[] = 'DMPruneDatabase';
$job_strings[] = 'DMDiscoverDupes';
$job_strings[] = 'DMBackgroundRecycler';

function DMPruneDatabase(){
	$GLOBALS['log']->fatal('Running: DMPruneDatabase');
	return true;
}
function DMDiscoverDupes(){
	$GLOBALS['log']->fatal('Running: DMDiscoverDupes');
	return true;
}
function DMBackgroundRecycler(){
	$GLOBALS['log']->fatal('Running: DMBackgroundRecycler');
	return true;
}