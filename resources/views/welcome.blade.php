<?php
if (isset($_GET['url'])) :
    $site = App\ScrapeSite::url($_GET['url']);
    echo $site->html;
    ?>
    <script src="/js/app.js"></script>
    <?php

else : ?>
<form action="/" method="GET">
    <input type="text" name="url" placeholder="Ange URL">
    <input type="submit">
</form>
<?php endif;?>