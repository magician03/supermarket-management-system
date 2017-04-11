<?php
// Search 'element' in 'sqltable' under 'column id'
function Search_Table_For_Element($element,$sqltable,$column_id){
		//store the filtered table
		$table_check = mysql_query("SELECT * FROM $sqltable
									WHERE $column_id = '$element' ");
		$table_check_set = mysql_fetch_array($table_check);
		//table_check_set length is zero if the data doesnt exist otherwise its a +ve number
		$result = strlen((string)$table_check_set);
		return $result;
}
function article_write($fname,$_POST){
			$_POST['content'] = htmlspecialchars($_POST['content']);
			$_POST['content'] = addslashes($_POST['content']);
			if(strlen($_POST['content'])){
			$file_add = FILE_ADD."{$_SESSION['author_id']}\\{$fname}.txt";
			$file = fopen($file_add, "w");
			fwrite($file,$_POST['content']);
			fclose($file);
			$result = mysql_query("INSERT INTO posts (post_id, author_id, channel_id, title, content, rating, visible, labels, datetime) VALUES (NULL, '{$_SESSION['author_id']}', '{$_POST['channel']}', '{$_POST['title']}', '{$_POST['content']}', '0', '{$_POST['visible']}', '{$_POST['labels']}','{$_POST['datetime']}')");
			return $result;
			}
			else return false;
}
?>