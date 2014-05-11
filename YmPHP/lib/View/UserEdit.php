<html>
<head>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<title><?=$test?></title>
</head>
<body>
<table border=0 align=center>
<caption><?=$test?></caption>
<tr><td>ID</td><td>用户名</td><td>密码</td><td colspan=3>操作</td></tr>
<tr><td><?=$v['id']?></td><td><?=$v['username']?></td><td><?=$v['password']?></td>
<td><a href="./index.php?control=User&method=update&id=<?=$v['id']?>"> 修改</a></td>
<td><a href="./index.php?control=User&method=showDetail&id=<?=$v['id']?>"> / 查看</a></td>
<td><a href="./index.php?control=User&method=del&id=<?=$v['id']?>">/ 删除</a></td>
</tr>
<tr><td colspan=6><a href="./index.php?control=User&method=add&id=<?=$v['id']?>">新增</a></td></tr>
</table>
</body>
</html>