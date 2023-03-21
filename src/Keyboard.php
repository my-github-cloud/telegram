<?php

namespace Telegram;

/**
 * Keyboard class
 */
class Keyboard
{
	public static function resizeKeyboard(array $keyboard = [])
	{
		if(!is_array($keyboard) || count($keyboard) == 0) return null;
		return json_encode(['resize_keyboard'=>true,'keyboard'=>[$keyboard]]);
	}

	public static function inlineKeyboard($keyboard = [])
	{
		if(!is_array($keyboard) || count($keyboard) == 0) return null;
		return json_encode(['inline_keyboard'=>[$keyboard]]);
	}

}