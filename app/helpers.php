<?php

function navActive($route)
{
	if (Request::is($route))
	{
		return 'active';
	}
}