<?php
	//解析类
	class Parser {
		private $_tpl;                    
		
		//构造方法获取模板文件
		public function __construct($_tplFile) {
			if(!$this->_tpl = file_get_contents($_tplFile)) {
				exit('ERROR，模板文件读取错误。');
			}
		}
		
		//解析系统变量
		private function parConfig() {
			$_parttermConfig = '/<!--\{([\w]+)\}-->/';
			if(preg_match($_parttermConfig, $this->_tpl)) {
				$this->_tpl = preg_replace($_parttermConfig, '<?php echo \$this->_config["$1"];?>', $this->_tpl);
			}
		}
		
		//解析普通变量
		private function parVar() {
			$_patterm = '/\{\$([\w]+)\}/';
			if(preg_match($_patterm, $this->_tpl)) {
				$this->_tpl = preg_replace($_patterm, "<?php echo \$this->_vars['$1'];?>", $this->_tpl);
			} else {
				echo 'error';
			}
		}
		
		//解析if语句
		private function parIf() {
			$_pattermIf = '/\{if\s+\$([\w]+)\}/';
			$_pattermEndIf = '/\{\/if\}/';
			$_pattermElse = '/\{else\}/';
			if(preg_match($_pattermIf, $this->_tpl)) {
				if(preg_match($_pattermEndIf, $this->_tpl)) {
					$this->_tpl = preg_replace($_pattermIf, '<?php  if(\$this->_vars["$1"]) {?>', $this->_tpl);
					$this->_tpl = preg_replace($_pattermEndIf, '<?php }?>', $this->_tpl);
					if(preg_match($_pattermElse, $this->_tpl)) {
						$this->_tpl = preg_replace($_pattermElse, '<?php } else {?>', $this->_tpl);
					}
				} else {
					exit('ERROE，if语句没有被关闭。');
				}
			} 
		}
		
		//解析注释内容
		private function parCommon() {
			$_pattermCommon = '/\{#\}(.*)\{#\}/';
			if(preg_match($_pattermCommon, $this->_tpl)) {
				$this->_tpl = preg_replace($_pattermCommon, '<?php /* $1 */?>', $this->_tpl);
			}
		}
		
		//解析foreach语句
		private function parForeach() {
			$_pattermForeach = '/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
			$_pattermEndForeach = '/\{\/foreach\}/';
			$_pattermVar = '/\{\@([\w]+)\}/';
			if(preg_match($_pattermForeach, $this->_tpl)) {
				if(preg_match($_pattermEndForeach, $this->_tpl)) {
					$this->_tpl = preg_replace($_pattermForeach, '<?php foreach (\$this->_vars["$1"] as \$$2=>\$$3) {?>', $this->_tpl);
					$this->_tpl = preg_replace($_pattermEndForeach, '<?php }?>', $this->_tpl);
					if(preg_match($_pattermVar, $this->_tpl)) {
						$this->_tpl = preg_replace($_pattermVar, '<?php echo \$$1?>', $this->_tpl);
					}		
				} else {
					exit('ERROR，foreach必须有结束标签。');
				}
			}
		}
		
		//解析include语句
		private function parInclude() {
			$_pattermInclude = '/\{include\s+file=\"([\w\.\-\/]+)\"\}/';
			if(preg_match($_pattermInclude, $this->_tpl, $_files)) {
				if(!file_exists($_files[1]) || empty($_files)) {
					exit('ERROR，包含文件出错。');
				}	
				$this->_tpl = preg_replace($_pattermInclude, '<?php include "$1";?>', $this->_tpl);
			}
		}
		
		//对外公共方法
		public function complie($_parFile) {
			//解析模板内容
			$this->parVar();
			$this->parIf();
			$this->parCommon();
			$this->parForeach();
			$this->parInclude();
			$this->parConfig();
			
			//生成编译文件
			if(!file_put_contents($_parFile, $this->_tpl)) {
				exit('ERROR，编译文件生成出错。');
			}
		}
	}