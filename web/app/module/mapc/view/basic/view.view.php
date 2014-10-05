<?php
/**
 * 원본 자료를 화면에 출력
 *
 * 원본의 타입과 PATH를 기준으로 화면에 출력할 수 있게끔 변환
 * 예1, 그림화일이면 copyright를 붙이고 img태그를 사용해서 출력하는등의 작업을 함
 * 예2, 마크다운이면 html로 변환 후 출력
 *
 * @param function module_mapc_convert_file($type, $origin_url) 브라우저 출력에 맞게끔 각 화일을 변환해주는 함수, 화면에 표시할 수  없는 화일은 다운로드링크로 변환
 */

// #TODO 마크다운에 이미지가 있을 경우 file_url 값의 디렉토리를 기준으로 변환 (../abc/ => file_path_A/path_B/abc/)
?>
<section>

	<article class="blog-post">

		<h1>
			<?= $post_info['post_title']; ?>
		</h1>
		<ul class="meta clearfix well">
			<?php
				if(! empty($post_info['post_write_date'])) {
					echo '<li>글쓴날 : ' . $post_info['post_write_date'] . '</li>';
				}
				if(! empty($post_info['post_edit_date_latest'])) {
					echo '<li>고친날 : ' . $post_info['post_edit_date_latest'] . '</li>';
				}
			?>
			<li>
                <a href="<?= $URL['mapc']['edit']; ?>&mapc_uid=<?= $post_info['post_uid']; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">편집</a>
                / <a href="<?= $URL['mapc']['del']; ?>&mapc_uid=<?= $post_info['post_uid']; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">삭제</a>
                <?php
                    if($view_prev[0]) {
                ?>
                / <a href="<?= $URL['mapc']['view']; ?>&mapc_uid=<?= $view_prev[0]; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">이전글</a>
                <?php
                    }
                    if($view_next[0]) {
                ?>
                / <a href="<?= $URL['mapc']['view']; ?>&mapc_uid=<?= $view_next[0]; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">다음글</a>
                <?php
                    }
                ?>
			</li>
		</ul>
		<p>
            <?php
                module_mapc_convert_file($post_info['post_origin_type'], $PATH['mapc']['data'].$post_info['post_origin_url'], $post_info['post_content'], $post_info);
            ?>
		</p>

		<ul class="meta clearfix well">
			<li>
                <a href="<?= $URL['mapc']['edit']; ?>&mapc_uid=<?= $post_info['post_uid']; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">편집</a>
                / <a href="<?= $URL['mapc']['del']; ?>&mapc_uid=<?= $post_info['post_uid']; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">삭제</a>
                <?php
                    if($view_prev[0]) {
                ?>
                / <a href="<?= $URL['mapc']['view']; ?>&mapc_uid=<?= $view_prev[0]; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">이전글</a>
                <?php
                    }
                    if($view_next[0]) {
                ?>
                / <a href="<?= $URL['mapc']['view']; ?>&mapc_uid=<?= $view_next[0]; ?>&mapc_lang=<?= $post_info['post_lang']; ?>">다음글</a>
                <?php
                    }
                ?>
			</li>

	        <?php
	        	// 덧붙임1 : H
	            if(count($title_another_lang) > 1) {
	        ?>
	        <li>
	            다른 언어 :
	            <?php
	                $temp_sep = '';
	                // 다른 언어로 된 똑같은 글 리스트 보기
	                foreach($title_another_lang as $var) {
	                    echo $temp_sep . ' <a href="' . $URL['mapc']['view'] . '&mapc_uid=' . $post_info['post_uid'] . '&mapc_lang=' . $var['postmeta_lang'] . '">'
	                        . '[' . $var['postmeta_lang'] . '] ' . $var['postmeta_value']
	                        . '</a>';
	                    $temp_sep = ', ';
	                }
	            ?>
	        </li>
	        <?php
	            }
	        	// 덧붙임1 : T
	        ?>
	
			<?php
	        	// 덧붙임search : H
			?>
				<li>
					[<?= $post_info['post_title']; ?>]으로 검색하기 :
					<a href="http://www.google.com/search?q=<?= $post_info['post_title']; ?>">구글</a> / 
					<a href="http://search.naver.com/search.naver?query=<?= $post_info['post_title']; ?>">네이버</a> / 
					<a href="http://search.daum.net/search?q=<?= $post_info['post_title']; ?>">다음</a> / 
					<a href="http://ko.wikipedia.org/wiki/<?= $post_info['post_title']; ?>">위키피디아</a>
				</li> 
			<?php
	        	// 덧붙임search : T
			?>
		</ul>

        <!-- shareaholic : h -->
        <script type="text/javascript">
        //<![CDATA[
          (function() {
            var shr = document.createElement('script');
            shr.setAttribute('data-cfasync', 'false');
            shr.src = '//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js';
            shr.type = 'text/javascript'; shr.async = 'true';
            shr.onload = shr.onreadystatechange = function() {
              var rs = this.readyState;
              if (rs && rs != 'complete' && rs != 'loaded') return;
              var apikey = 'd9b084943e1d15fddb5c5ee670772f36';
              try { Shareaholic.init(apikey); } catch (e) {}
            };
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(shr, s);
          })();
        //]]>
        </script>
        <div class='shareaholic-canvas' data-app='share_buttons' data-app-id='4649131'></div>
        <!-- shareaholic : t -->

	</article>

</section>
