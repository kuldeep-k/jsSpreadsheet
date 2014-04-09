<?php

session_start();

	$u = $_SESSION['auth']['u'];
	

?>

<style>
	.ex-grid tr td {
		width: 100px;
		border: 1px solid grey;
	}
	.ex-grid tr td input {
		width: 100px;
		border: 0px;
	}

	.cell-focus {
		border: 1px solid red;
	}

</style>

<table class="ex-grid" cellpadding=0 cellspacing=0>

<tr class="header-row">
	<td class="header-col">&nbsp;</td>
	<?php for($j=0;$j<10;$j++){ ?>
		<td><?php echo chr(65 + $j) ?></td>
	<?php } ?>
</tr>

<?php for($i=0;$i<10;$i++){ ?>

<tr class="body-row">
	<td class="header-col"><?php echo $i+1 ?></td>
	<?php for($j=0;$j<10;$j++){ ?>
		<td><input type="text" name="cell[<?php echo chr(65 + $j) ?>][<?php echo $i+1 ?>]" id="cell_<?php echo chr(65 + $j) ?>_<?php echo $i+1 ?>" /></td>
	<?php } ?>
</tr>

<?php } ?>


</table>

<script>
	function has_class(obj, className)
	{
		var str = '(?:^|\s)' + className + '(?!\S)';
		re = new RegExp(str);	
		return re.test(obj.className);
	}

	function add_class(obj, className)
	{
		obj.className += className;
	}

	function remove_class(obj, className)
	{
		obj.className.replace( /(?:^|\s)className(?!\S)/g , '' )
	}

	window.onload = function(){
		var grids = document.getElementsByClassName('ex-grid');
		var grid = grids[0];	
		var inputs = grid.getElementsByTagName('input');
		for(inp in inputs)
		{
			inputs[inp].onfocus = function(){
					console.log(has_class(this, 'cell-focus'));
				//console.log(typeof this);
				this.value = this.id;
				add_class(this, 'cell-focus');
			}
			inputs[inp].onblur = function(){
				//console.log(this);
				//console.log(typeof this);
				remove_class(this, 'cell-focus');	
				
				this.value = '';
			}
			inputs[inp].onkeypress = function(){
				console.log(this.id);
			}
		}	
	}
</script>
