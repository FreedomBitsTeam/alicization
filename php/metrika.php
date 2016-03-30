	<?php
		if ($SYSTEM['mwidget']) {
		printf('
			<!-- Yandex.Metrika informer --> 
			<a href="https://metrika.yandex.ru/stat/?id=36214560&amp;from=informer" target="_blank" rel="nofollow">
			<img src="https://informer.yandex.ru/informer/36214560/3_0_2096DAFF_0076BAFF_1_uniques" 
			style="width:88px; height:31px; border-radius: 5px; position: absolute; border: 1px solid white; background: url(img/metrika.png);" alt="" title="Яндекс.Метрика: данные за сегодня" onclick="try{Ya.Metrika.informer({i:this,id:36214560,lang:\'ru\'});return false}catch(e){}" />
			</a>
			<!-- /Yandex.Metrika informer -->
		');}
	?>
	
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter36214560 = new Ya.Metrika({
                    id:36214560,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true,
                    ut:"noindex",
                    triggerEvent:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { 
        	f(); 
        }
        
        MetrikaON = true; // MY BOOL TEST
        
    })(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/36214560?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->