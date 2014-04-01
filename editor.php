<!DOCTYPE html>
<HTML>
<body>
<!--<script src="/firebug-lite/build/firebug-lite.js"></script>--><?php
if(isset($_REQUEST['save']))
{
$f = $_REQUEST['file'];
$nc = $_REQUEST['nc'];
if(file_put_contents($f,$nc))
{
?><script>alert('file successfully edited');document.location="?file=<?php echo $f; ?>&edit=true&s=<?php echo $_REQUEST['s']; ?>";</script>
<!--<form id="form" method="post">
<input type="text" name="file" value="<?php echo $f; ?>" /><br />
<input type="submit" name="edit" value="Edit" />
</form>
<script>
setTimeout('document.getElementById("form").submit();',100);</script>-->
<?php
}
else
{
echo "somthing went wrong";
}
}
elseif(isset($_REQUEST['edit']))
{
$f = $_REQUEST['file'];
$fc = file_get_contents($f);
?>
<form method="post"><input id="s" type="hidden"  value="<?php echo $_REQUEST['s']; ?>" name="s" />
<textarea id="nc" onscroll="document.getElementById('s').value=this.scrollTop;" name="nc"  style="width:100%;height:300px;"><?php echo htmlspecialchars($fc); ?></textarea><script>
setTimeout('document.getElementById("nc").scrollTop=document.getElementById("s").value;',50);
document.getElementById("nc").style.height=screen.availHeight/1.2;
</script>

<input type="hidden" name="file" value="<?php echo $f; ?>" />
<input type="submit" name="save" value="Save" />
</form>
<?php
}
else
{
?>
<form method="post">
<input type="text" name="file" id="file" /><br />
<input type="submit" name="edit" value="Edit" />
<script src="/jquery.min.js"></script>
<link rel="stylesheet" href="/jquery-ui-1.10.3/themes/base/jquery-ui.css" />
<script src="/jquery-ui-1.10.3/ui/minified/jquery-ui.min.js"></script>
<script>
$(function() {
		
		$( "#file" ).autocomplete({
			source: "/ns.php",
			minLength: 1,
			
		});
	});
</script>
</form>
<?php
}
?></body>
</HTML>
