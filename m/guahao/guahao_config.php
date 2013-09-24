<?php
/*
// - 功能说明 : 修改挂号配置
// - 创建作者 : zhuwenya (zhuwenya@126.com)
// - 创建时间 : 2010-03-31 11:23
*/
require "../../core/core.php";
$table = "guahao_config";

if ($_POST) {
	$record = array();
	$record["config"] = $_POST["config"];

	$sqldata = $db->sqljoin($record);
	$sql = "update $table set $sqldata where name='filter' limit 1";

	if ($db->query($sql)) {
		msg_box("资料提交成功", "?self", 1);
	} else {
		msg_box("资料提交失败，系统繁忙，请稍后再试。", "back", 1, 5);
	}
}

$line = $db->query("select * from $table where name='filter' limit 1", 1);
$title = "修改配置";
?>
<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312">
<?php foreach ($common_bootstrap as $z){echo $z;}?>
<script language="javascript">
function check_data() {
	var oForm = document.mainform;
	return true;
}
</script>
</head>

<body>
<!-- 头部 begin -->

    <header class="jumbotron subhead"  style="margin-bottom: 20px;">
		<ul class="breadcrumb">
             <li><a href="javascript:void(0)" onclick="history.back()">返回</a> <span class="divider">/</span></li>
             <li class="active"><?php echo $title; ?></li>
        </ul>
	</header>
<!-- 头部 end -->

<div class="space"></div>

<div class="description">
	<div class="d_title">提示：</div>
	<div class="d_item">1. 请注意，该配置对本系统内的所有医院都生效，是全局的。</div>
</div>

<div class="space"></div>

<form name="mainform" action="" method="POST" onsubmit="return check_data()">
<table width="100%" class="table table-bordered table-striped">
	<tr>
		<td colspan="2" class="head">配置</td>
	</tr>
	<tr>
		<td class="left">过滤词汇：</td>
		<td class="right"><textarea name="config" style="width:60%; height:80px;"><?php echo $line["config"]; ?></textarea> <span class="intro">各词以逗号(,)隔开</span></td>
	</tr>
</table>

<div class="button_line"><input type="submit" class="btn" value="提交资料"></div>
</form>
</body>
</html>