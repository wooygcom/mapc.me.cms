<div class="row">

<?php
if(is_array($post_list)) {
	foreach($post_list as $key => $var) {
        $file_thum = str_replace('/original/', '/thum/', $var['file_url']);
        $file_url = is_file($file_thum) ? $file_thum : $var['file_url'];
?>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
	  <a href="<?= $URL['mapc']['view']; ?>&mapc_uid=<?= $var['post_uid']; ?>&mapc_lang=<?= $var['post_lang']; ?>" class="thumbnail">
        <img src="<?= $file_url; ?>" alt="...">
	  </a>
      <div class="caption">
        <p>
            <a href="<?= $URL['mapc']['view']; ?>&mapc_uid=<?= $var['post_uid']; ?>&mapc_lang=<?= $var['post_lang']; ?>"><?= $var['post_title']; ?></a>
            <br />
            <?= $var['post_write_date']; ?>
        </p>
        <p><?= nl2br(mb_strimwidth(htmlspecialchars($var['post_content']), 0, 127, '...', $CONFIG['encode'])); ?></p>
      </div>
    </div>
  </div>

<?php
	}
}
?>

</div>

<?php
	mapc_file_skin_include($TPL_DATA['paging']['file'], $TPL_DATA['paging']['data']);
?>
