<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DataFiller</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Simple tool that allows you to fill your database with random data">
    <meta name="author" content="Franco Laiuppa">

    <!-- Le styles -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/js/datepicker/css/datepicker.css')?>" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }

      #random_data > div.random_data_item, #random_data > div.dynamic {
      	float: left;
      }

      .clear {
      	clear: both;
      }

      #current_database_navbar {
				color: #FFFFFF;
				display: block;
				left: 260px;
				position: absolute;
				top: 10px;
				width: 420px;
      }
    </style>
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
<!--     <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png"> -->

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?=site_url('/')?>">Data Filler</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?=site_url('setup')?>"><strong>Setup</strong></a></li>
              <li><a href="<?=site_url('about')?>">About</a></li>
            </ul>
          </div><!--/.nav-collapse -->
					<p id="current_database_navbar">Current database <span class="label label-success"><?=get_current_database_name()?></span></p>

        </div>
      </div>
    </div>

    <div class="container-fluid">

        <div class="row-fluid">

            	<?php 
							if (!isset($current_table)) { $current_table = null; }
              $table_li_items = get_table_li_items($current_table);
              if ($table_li_items != '') { ?>
								<div class="span3">
									<div class="well sidebar-nav">
										<ul class="nav nav-list">
											<li class="nav-header">Tables</li>
											<?=$table_li_items?>
										</ul>
									</div><!--/.well -->
								</div><!--/span-->
              <?php } ?>

        <div class="span9">