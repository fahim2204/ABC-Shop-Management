<?php
    class MenuBar{
        public $tiltle;
        public $url;
        public $lImage;

        function __construct($tiltle, $url, $lImage){
            $this->tiltle = $tiltle;
            $this->url = $url;
            $this->lImage = $lImage;
          

            echo '
                <img src="'.$lImage.'"/> &nbsp
                <a color="black" href="'.$url.'">'.$tiltle.'</a>
                <hr>
            ';
        }
    }
?>