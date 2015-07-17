<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Copyright (C) 2006 - 2015 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
ELLISLAB, INC. BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Except as contained in this notice, the name of EllisLab, Inc. shall not be
used in advertising or otherwise to promote the sale, use or other dealings
in this Software without prior written authorization from EllisLab, Inc.
*/

/**
 * List_maker Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			EllisLab
 * @copyright		Copyright (c) 2004 - 2015, EllisLab, Inc.
 * @link			https://github.com/EllisLab/List-Maker
 */
class List_maker {

	public $return_data = '';

	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */
	function __construct($data = '', $type = '', $sep = '', $id = '', $class = '')
	{
		$data = ($data == '') ? trim(ee()->TMPL->tagdata) : $data;

		if ($type == '')
		{
			$type = (strtolower(ee()->TMPL->fetch_param('type')) == 'ol')? 'ol' : 'ul';
		}

		if ($sep == '')
		{
			// if separator is "newline" or not specified, make sure it's a newline character
			$sep = ( ! ee()->TMPL->fetch_param('separator')) ? "\n" : ee()->TMPL->fetch_param('separator');
			if ($sep == 'newline')
				$sep = "\n";
		}

		$id = ($id == '') ? ee()->TMPL->fetch_param('id') : $id;

		if ($class == '')
		{
			$class = ( ! ee()->TMPL->fetch_param('class')) ? 'list' : ee()->TMPL->fetch_param('class');
		}

		// break up the data into an array
		$data = explode($sep, $data);

		// open the list with the proper tag
		if ($id)
		{
			$list = "<$type id=\"$id\" class=\"$class\">\n";
		}
		else
		{
			$list = "<$type class=\"$class\">\n";
		}

		// insert the elements into <li> tags
		foreach ($data as $item)
		{
			$list .= "<li>" . $item . "</li>\n";
		}

		// close the list tag up
		$list .= "</$type>\n";

		$this->return_data = $list;
	}
}
