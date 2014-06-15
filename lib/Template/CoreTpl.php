<?php

/**
  模板引擎文件：实现美工设计与PHP程序分开
  已实现模板标签：include
  待完善
 */
class MyTpl {

    var $templateDir = 'lib/View/'; // 模板文件View目录下
    var $compileDir = 'lib/Template/Compile/'; //编译后的文件Compile目录下
    var $tplVars;     //成员变量

    function __construct($templateDir = '', $compileDir = '') {
        $this->templateDir = $templateDir;
        $this->compileDir = $compileDir;
        $this->tplVars = array();
    }

    function assign($tpl_var, $value = null) {
        if ($tpl_var != "") {
            $this->tplVars[$tpl_var] = $value;
        }
    }

    function display($fileName) {
        $tplFile = $this->templateDir . $fileName;
        if (!file_exists($tplFile)) {
            exit("错误：模板文件$fileName不存在！");
        }
        $comFile = $this->compileDir . $fileName . ".php";
        $tplContent = file_get_contents($tplFile);
        if (!file_exists($comFile) || filemtime($comFile) < filemtime($tplFile)) {
            $comContent = $this->tplReplace(file_get_contents($tplFile));
            if (!file_put_contents($comFile, $comContent)) {
                exit('失败：生成对应的编译文件失败！');
            }
        }
        //使模板中可以将分配的变量可以用PHP语法展示
        extract($this->tplVars);
        include "$comFile";
    }

    private function tplReplace($content) {
        $pattern = array(
            '/<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>/i', //匹配变量
            '/\{<\s*include\s+[\"\']?(.+?)[\"\']?\s*\}>/ie', //匹配include
        );

        $replacement = array(
            '<?php echo $this->tplVars["${1}"];?>',
            'file_get_contents($this->template_dir."${1}")',
        );

        $repContent = preg_replace($pattern, $replacement, $content);
        if (preg_match('/<\{([^(\}>)]{1,})\}\>/', $repContent)) {
            $repContent = $this->tpl_replace($repContent);
        }
        return $repContent;
    }

}

?>