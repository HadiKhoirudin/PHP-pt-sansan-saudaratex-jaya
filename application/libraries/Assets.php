<?php
class assets
{
	static function js($files)
	{
		$script = '';
		if (is_array($files))
		{
			foreach ($files as $file)
			{
				$script .= "<script src='".base_url()."assets/js/".$file."'></script>";
			}
		}
		else
		{
			$script = "<script src='".base_url()."assets/js/".$files."'></script>";
		}
		return $script;
	}
	static function css($files)
	{
		$script = '';
		if (is_array($files))
		{
			foreach ($files as $file)
			{
				$script .= "<link href='".base_url()."assets/css/".$file."' rel='stylesheet' type='text/css'>";
			}
		}
		else
		{
			$script = "<link href='".base_url()."assets/css/".$files."' rel='stylesheet' type='text/css'>";
		}
		return $script;
	}
	
	static function font($file)
	{
		return base_url().'/assets/font/'.$file;
	}
	
	static function icon($file)
	{
		return "<link href='".base_url()."assets/icon/".$file."' rel='icon'>";
	}
	static function img($file)
	{
		return "<img src='".base_url()."assets/img/".$file."' alt=''>";
	}

	static function images($file)
	{
		return "<img src='".base_url()."assets/images/".$file."' alt=''>";
	}

	static function logo($file)
	{
		return "<img style='display: block;
    margin-left: auto;
    margin-right: auto;' src='".base_url()."assets/img/".$file."' alt=''>";
	}

	static function post_images($file)
	{
		return "<img src='".base_url()."assets/images/upload/".$file."' alt=''>";
	}
	
	static function post_icon($file)
	{		return "<img src='".base_url()."assets/images/".$file."' alt=''>";	}	static function info_icon($file)	{		return "<img src='".base_url()."assets/images/".$file."' alt=''>";	}
	
	static function tentang_images($file)
	{
		return "<img src='".base_url()."assets/images/upload/".$file."' alt=''>";
	}
}