<?php

class Phlib {

	public static stripTags($str) {
		
		$ret = $str;
		$ret = str_replace('<?php', '', $ret);
		$ret .= str_replace('?>', '', $ret);

		return $ret;
	}

}