<?php
/* 超级全局变量
	$GLOBALS
	$_SERVER
	$_POST
	$_GET
	$_FILE
	$_COOKIE
	$_SESSION */
	
/* 魔术变量
	__LINE__
	__FILE__
	__DIR__
	__FUNCTION__
	__CLASS__
	__METHOD__
	__NAMESPACE__ */
	
	// array and dictionary
	echo 'array and dictionary ------------------------<br/>';
	$cars = array('Volvo', 'BMW', 'Toyota');
	$lenghtOfCars = count($cars);
	echo 'I like ' . $cars[0] . ', ' . $cars[1] . ' and ' . $cars[2] . '.<br/>' ;
	echo 'length of array cars is ' . count($cars) . '<br/>';
	for($x=0;$x<$lenghtOfCars;$x++) {
		echo $cars[$x] . ' —— ';
	}
	
	echo '<br/><br/>';
	$age = array('Peter'=>'35', 'Ben'=>'37', 'Joe'=>'43');
	echo 'Peter is ' . $age['Peter'] . ' years old.<br/>';
	foreach ($age as $x => $x_value) {
		echo 'Key=' . $x . ', Value=' . $x_value . '<br/>';
	}
	
	// 判断语句 if...elseif...else and switch
	echo '<br/>';
	echo 'if...elseif...else and switch --------------------------<br/>';
	$data = date('H');
	if($t<'10') {
		echo 'Have a good morning!';
	} elseif($t<'20') {
		echo 'Have a good day!';
	} else {
		echo 'Have a good night!';
	}

	echo '<br/><br/>';
	$favcolor = 'red';
	switch ($favcolor) {
		case 'red':
			echo '你喜欢的颜色是红色！';
			break;
		case 'blue':
			echo '你喜欢的颜色是蓝色！';
			break;
		case 'green':
			echo '你喜欢的颜色是绿色！';
			break;
		default:
			echo '你喜欢的颜色不是 红，蓝，或绿色！';
	}
	
	// 循环语句 while | do...while | for | foreach 
	echo '<br/><br/>';
	echo 'while | do...while | for | foreach ---------------------------<br/>';
	$i = 1;
	while ($i<=3) {
		echo '1 — The number is ' . $i . '<br/>';
		$i++;
	}
	
	do {
		$i++;
		echo '2 — The number is ' . $i . '<br/>';
	} while ($i<=6);
	
	for ($i=1;$i<=3;$i++) {
		echo '3 — The number is ' . $i . '<br/>';
	}
	
	$x = array('one', 'two', 'three');
	print_r($x); echo '<br/>';
	var_dump($x);
	foreach ($x as $value) {
		echo $value . ' '; 
	}
	
	// 函数 function
	echo '<br/><br/>';
	echo 'function ----------------------------------<br/>';
	function add($x, $y) {
		$total = $x + $y;
		return $total;
	}
	echo '1 + 16 = ' . add(1, 16);
	
	// 面向对象 (属性与方法访问控制：public、protected、private) 
	// final
	echo '<br/><br/>';
	echo '面向对象 ------------------------------------<br/>';
	class Site {
		// 成员变量（类属性必须定义为公有，受保护，私有之一。如果用 var 定义，则被视为公有。）
		var $url;
		var $title;
		
//		// 构造函数（存在 __construct 函数的时候，php不会再提供默认的构建函数）
//		function __construct($par1, $par2) {
//			// echo 'Construct——————<br/>';
//			$this->url = $par1;
//			$this->title = $par2;
//		}
				
		// 成员函数
		function setUrl($par) {
			$this->url = $par;
		}
		function getUrl() {
			echo $this->url . '<br/>';
		}
		
		function setTitle($par) {
			$this->title = $par;
		}
		function getTitle() {
			echo $this->title . '<br/>';
		}
		
		// 析构函数
		function __destruct() {
			// echo 'Destruct——————<br/>';
		}
	}
	
	class Child_Site extends Site {
		var $category;
		const constant = '常量值';
		public static $my_static = 'Static_varible';
		
		public static function my_static_method() {
			echo 'static_Method';
		}
		
		function setCate($par) {
			$this->category = $par;
		}
		function getCate() {
			echo $this->category . '<br/>';
		}
		
		// 方法重写
		function getUrl() {
			echo 'Child_Site —————— getUrl<br/>';
		}
		function getTitle() {
			echo 'Child_Site —————— getTitle<br/>';
        }	
 	}
	
	$runoob = new Site;
	$runoob->setUrl('www.runoob.com');
	$runoob->setTitle('菜鸟教程');
	$runoob->getUrl();
	$runoob->getTitle();
	
	$taobao = new Child_Site;
	echo '*********************' . $taobao::constant . '<br/>';
	echo '*********************' . Child_Site::$my_static . '<br/>';
	echo '*********************' . Child_Site::my_static_method() . '<br/>';
	$taobao->setCate('Child_Site_category');
	$taobao->getCate();
	$taobao->getUrl();
	$taobao->getTitle();

//	$sina = new Site('www.sina.com', '新浪');
//	$sina->getUrl();
//	$sina->getTitle();
		
	// 接口 interface
	interface iTemplate {   // iTemplate 接口声明
		public function setVarible($name, $var);
		public function getHtml($template);
	}
	
	class Template implements iTemplate {   // 实现接口
		private $vars = array();
		
		public function setVarible($name, $var) {
			$this->vars[$name] = $var;
		}
		
		public function getHtml($template) {
			foreach ($this->vars as $name => $value) {
				$template = str_replace('{' . $name . '}', $value, $template);
			}
			return $template;
		}
	}
	
	// 抽象类
	echo '<br/>';
	echo '抽象类 --------------------------------------<br/>';
	abstract class AbstractClass {
		// 强制要求子类定义这些方法
		abstract protected function getValue();
		abstract protected function prefixValue($prefix);
		
		// 普通方法
		public function printOut() {
			print $this->getValue() . '<br/>';
		}
	}
	
	class ConcreteClass1 extends AbstractClass {
		protected function getValue() {
			return 'ConcreteClass1';
		}
		
		public function prefixValue($prefix) {
			return $prefix . 'ConcreteClass1';
		}
	}
	
	class ConcreteClass2 extends AbstractClass {
		protected function getValue() {
			return 'ConcreteClass2';
		}
	
		public function prefixValue($prefix) {
			return $prefix . 'ConcreteClass2';
		}
    }

	$class1 = new ConcreteClass1;
	$class1->printOut();
	echo $class1->prefixValue('FOO_') . '<br/>';
	
	$class2 = new ConcreteClass2;
	$class2->printOut();
	echo $class2->prefixValue('FOO_') . '<br/>';
	
	
	
	