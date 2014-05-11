YmPHP框架目录说明：
 YmPHP|-
      |-index.php(项目入口文件)
      |-lib（YmPHP核心库框架）
           |-Control(控制器目录)
	            |-coreControl.php(核心控制器)
		    |-UserControl.php(示例；用户管理控制器)
	   |-Model(模型目录)
		  |-Model.php (模型基类)
		  |-UserModel.php(示例：用户管理模型)
	   |-Statics(静态资源目录)
	            |-css(css文件)
		    |-fonts(fonts文件)
		    |-images(images文件)
		    |-js(js文件)
	   |-Template(模板引擎及生成的编译目录)
	             |-Compile（编译生成的视图模板）
		     |-CoreTpl.php（模板引擎类）
	   |-View(视图目录)
	         |-test.tpl(视图文件)
		 |-UserShow.tpl(用户信息展示视图文件)
	   |-config.php(配置文件)
       
     
运行说明：
  1.在主入口文件里包含：config.php
  2.在MVC框架下写项目


待完善：
  1.Model.php缺少安全验证
  2.CoreTpl.php需要增加更多的模板标签
  。。。。
	    

