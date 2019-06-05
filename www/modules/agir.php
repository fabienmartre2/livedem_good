<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Agir');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->display('agir.tpl');