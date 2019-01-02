<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>




<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php' ;
/**
* 
*/
class PAger{
	public $page_size,$page_holder;
	public $page_start,$page_last,$page_current,$page_previous,$page_next;
	public $sql;

	function __construct($sql,$page_size=2,$page_holder='page'){
		//全局变量与局部变量的区别
		global $db;

		$this->page_start = 1;
		$this->page_holder = $page_holder;  
		$this->page_size = $page_size;  
		$this->sql = $sql;  

		$sql_amount = 'select count(*) as amount  ' . substr($sql, strpos($sql,'from' ) ) ;
		//计算总记录数
		$row_amount = $db->query($sql_amount)->fetchObject()->amount;

		//计算总页数	
		$this->page_last = ceil($row_amount / $page_size);
	}

	function query($page_current = 1){
		//全局变量与局部变量的区别
		global $db;

		$this->page_current = $page_current ;
		//当未指定页号，或者页号错误时	
		if (empty($page_current) || $page_current < 1){
			$this->page_current = 1;
		}elseif($page_current > $this->page_last){
			$this->page_current = $this->page_last;
		}

		//生成上一页、下一页
		$this->page_previous = ($this->page_current <= $this->page_start ) ? $this->page_start : $this->page_current - 1 ;
		$this->page_next = ($this->page_current >= $this->page_last ) ? $this->page_last : $this->page_current + 1 ;

		//计算返回纪录的起点与记录数
		$row_base= ($this->page_current-1) * $this->page_size;
		$page_sql = " LIMIT {$this->page_size} OFFSET {$row_base}";

		$sql = $this->sql .  $page_sql;
		return $db->query($sql);

	}

	public function nav_html($value=''){
		$query_str = "{$_SERVER['SCRIPT_NAME']}?" ;

		$arr = [
			'page_first' =>'page_start',
			'page_previous'=>'page_previous',
			'page_next'=>'page_next',
			'page_last'=>'page_last'
		];
		
		//as $_GET or $_POST
		$params = $_REQUEST;
		foreach ($arr as $key => $value) {
			$params[$this->page_holder] = $this->$value;	
			$key .= '_q';
			$$key =  $query_str . http_build_query($params);
		}
		
		
		return <<< EOT
	  <div id="pager"> 
	    <ul class="pagination">
		  <li><a href="$page_first_q">首页</a></li>
		  <li><a href="$page_previous_q">上一页</a></li>
		  <li><a href="$page_next_q">下一页</a></li>
		  <li><a href="$page_last_q">末页</a></li>
		  <li><span>$this->page_current/$this->page_last</span></li>
		</ul>
	  </div>    
EOT;
	}


}//end of class






 ?>
 </body>
</html>