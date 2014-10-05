<?php
/**
 * @param function mapc_file_skin_include($file_arr, $data_arr)
 * @param string $_SESSION['mapc_user_id'] user ID
 * @param string $_SESSION['mapc_user_type'] user Type (nor, adm, mng)
 * @param string $_SESSION['mapc_user_status'] (normal, vip, banned, etc...)
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            foreach($publish_data['headhook'] as $key => $var) {
                include($var . $key);
            }
        ?>
        <?php
            if(is_array($publish_data['head']['css'])) {

                foreach($publish_data['head']['css'] as $file => $dir) {

                    echo '<link href="', $dir, $file, '" rel="stylesheet" type="text/css" media="screen" />', "\n";

                }

            }
        ?>
        <style type="text/css">
            body {
                padding-top: 60px;
            }
            .panel-info {
                padding:10px;
            }
            .credit {
                text-align: center;
            }
        </style>
    </head>
    <body class="pre-scrollable">

    <!-- Fixed navbar -->
    <header class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= $URL['core']['main']; ?>"><?= $CONFIG['meta']['title']; ?></a>
        </div>
      </div>
    </header>

    <div class="container">

        <div class="col-md-offset-2 col-md-8 jumbotron text-center">

<!-- 본문:H -->
            <h2><a href="<?= $url; ?>"><?= $message; ?></a></h2>
            <br />
            <a href="<?= $url; ?>" class="btn btn-primary btn-lg" role="button"><?= $LANG['core']['home']; ?></a>
<!-- 본문:T -->

        </div>

    </div><!--/.container-->

    <div id="footer" class="navbar-inverse">
      <div class="well">
        <p class="text-muted credit">Copyright <?= $CONFIG['meta']['copyright']; ?></p>
      </div>
    </div>

    </body>

</html>
