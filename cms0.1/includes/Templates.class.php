<?php
	//模板类
	class Templates {
		private $_vars = array();         //接收注入变量
		private $_config = array();       //接收系统变量
		
		//构造方法判断一些目录是否存在
		public function __construct() {
			if(!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE)) {
				exit('ERROR，模板目录或编译目录或缓存目录不存在！请手工添加！');
			}
			
			//保存系统变量
			$_sxe = simplexml_load_file(ROOT_PATH.'/config/profile.xml');
			$_tagLib = $_sxe->xpath('/root/taglib');
			foreach ($_tagLib as $_tag) {
				$this->_config["$_tag->name"] = $_tag->value;
			}
		}
		
		//assign()方法，用于注入变量
		public function assign($_var, $_value) {
			if(isset($_var) && !empty($_var)) {
				$this->_vars[$_var] = $_value;
			} else {
				exit('ERROR，请设置模板变量。');
			}
		}
		
		//display()方法
		public function display($_file) {
			$_tplFile = TPL_DIR.$_file;
			
			//判断模板文件是否存在
			if(!file_exists($_tplFile)) {
				exit('ERROR，模板文件不存在！');
			}
			
			//编译文件
			$_parFile = TPL_C_DIR.md5($_file).$_file.'.php';
			
			//缓存文件
			$_cacheFile = CACHE.md5($_file).$_file.'.html';
			
			if(IS_CACHE) {
				if(file_exists($_cacheFile) && file_exists($_parFile)) {
					if(filemtime($_parFile)>=filemtime($_tplFile) && filemtime($_cacheFile)>=filemtime($_parFile)) {
						include $_cacheFile;
						return;
					}
				}
			}
			
			if(!file_exists($_parFile) || filemtime($_parFile)<filemtime($_tplFile)) {
				require_once ROOT_PATH.'/includes/Parser.class.php';
				$_parser = new Parser($_tplFile);
				$_parser->complie($_parFile);
			}
			
			//引入编译文件
			include $_parFile;
			
			if(IS_CACHE) {
				//获取缓冲区内的数据，并创建缓存文件
				file_put_contents($_cacheFile, ob_get_contents());
				
				//清除缓冲区
				ob_end_clean();
				
				//载入缓存文件
				include $_cacheFile;
			}
		}
	}