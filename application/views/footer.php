 </div>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
<script src="<?=base_url('assets/js/datepicker/js/bootstrap-datepicker.js')?>"></script>
<?php if (isset($scripts) and !empty($scripts)) {
	foreach ($scripts as $script) {
		echo '<script type="text/javascript" src="'.$script.'"></script>';
	}
} ?>
  </body>
</html>