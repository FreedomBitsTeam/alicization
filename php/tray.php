<?php
	if ($SYSTEM['quest']) {
		$display = "display: block;";
		if ($SYSTEM['autoedu']) $display = "display: none;";
		printf('<label class="trayb" id="drag1t" data-title="Обучение" style="%s" onClick="OpenWin(\'#drag1\');">[?]</label>', $display);
	}
	if ($SYSTEM['tlink']) printf('<label class="trayb" id="testb1" data-title="Анализатор" onClick="window.open(\'test.php\',\'_blank\');">[T]</label>');
	if ($SYSTEM['autht']) printf('<label class="trayb" id="testb2" data-title="Выход"      onClick="location.href = \'?logout=1\';">[Q]</label>');
?>