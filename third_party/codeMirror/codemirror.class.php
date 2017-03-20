<?php
/**
 * TestLink Open Source Project - http://testlink.sourceforge.net/
 * This script is distributed under the GNU General Public License 2 or later.
 *
 * TestLink support for syntaxHighlighter web editor
 *
 * @package 	TestLink
 * @copyright 	2017-2017, TestLink community
 * @version    	1.0
 * @link 		http://www.teamst.org/index.php
 *
 * @internal Revisions:
 *
 *	20160315 - dennis@etern-it.de
 *      code created using as starting point:
 *      tinymce.class.php from francisco.mancardi@gruppotesi.com
 *
 *
 **/

class codemirror
{
	var $InstanceName;
	var $Value;
	var $rows = 12;
	var $cols = 80;

	function init(){

		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/lib/codemirror.js\"></script>";
		echo "<link rel=\"stylesheet\" href=\"/third_party/codeMirror/lib/codemirror.css\" />";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/mode/shell/shell.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/mode/tcl/tcl.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/edit/matchbrackets.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/edit/closebrackets.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/search/match-highlighter.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/hint/anyword-hint.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/hint/show-hint.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/search/jump-to-line.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/dialog/dialog.js\"></script>";
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"/third_party/codeMirror/addon/scroll/simplescrollbars.js\"></script>";
	}

	function __construct($instanceName)
 	{
  		$this->InstanceName	= $instanceName;
		$this->Value		= '';
	}

 	function Create($rows = null,$cols = null)
	{
		echo $this->CreateHtml($rows,$cols);
	}

	function CreateHtml($rows = null,$cols = null)
	{
	$HtmlValue = htmlspecialchars($this->Value);

    	$my_rows = $rows;
    	$my_cols = $cols;

	    if(is_null($my_rows) || $my_rows <= 0)
			$my_rows = $this->rows;
	    if(is_null($my_cols) || $my_cols <= 0)
	    	$my_cols = $this->cols;

	    // rows must count place for toolbar !!
		$Html = "<textarea style=\"font-size: medium\" name=\"{$this->InstanceName}\"" .
		        "id=\"{$this->InstanceName}\" rows=\"{$my_rows}\" cols=\"{$my_cols}\">".
		        "{$HtmlValue}</textarea>" ;
		$Html .= "<script type=\"text/javascript\">myCodeMirror{$this->InstanceName} = CodeMirror.fromTextArea(document.getElementById(\"{$this->InstanceName}\"), {lineNumbers: true, mode: \"text/x-sh\", matchBrackets: true, firstLineNumber: 52});</script>";
		return $Html ;
	}

} // class end


?>
