<style type="text/css">
#menu:active{background: #2632FB;}
</style>
<?php
if($this->uri->segment(1) == 'blog' && $this->uri->segment(2) == 'home'):
	$link = '';
else:
	$link = "<a href='javascript:history.back(1);' class='navbar-brand' id='menu'><i class='glyphicon glyphicon-menu-left'></i></a>";
endif
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
  	<?=$link;?>
  </div>
</nav>
