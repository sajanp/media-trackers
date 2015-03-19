<?php

function navActive($route)
{
	if (Route::currentRouteName() == $route)
	{
		return 'active';
	}
}

function URLActive($route)
{
	if (Request::is($route))
	{
		return 'active';
	}
}