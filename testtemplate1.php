    <?
    include("templates/class.FastTemplate.php3");
    $tpl = new FastTemplate("templates");
    $tpl->define( array( main   => "fashion/index.html",
                         table  => "table.tpl",
                         row    => "row.tpl"    ));

  //  $tpl->cache_expire (main, 3600);
  //  $tpl->cache_refresh (main, "day");

    $tpl->assign(TITLE,"FastTemplate Test");

   
       for ($n=1; $n <= 3; $n++)
       {
           $Number = $n;
           $BigNum = $n*10;
           $tpl->assign( array(  NUMBER      =>  $Number,
                                 BIG_NUMBER  =>  $BigNum ));

       }
       //$tpl->write_cache (ROWS,".row");
    
    $tpl->parse(MAIN, array("table","main"));
    Header("Content-type: text/html");
    $tpl->FastPrint();
    exit;
    ?>
