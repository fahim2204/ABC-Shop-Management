<?php
    class Product{
        public $name;
        public $amount;
        public $pImage;
        public $price;

        function __construct($name, $amount, $pImage, $price){
            $this->name = $name;
            $this->amount = $amount;
            $this->pImage = $pImage;
            $this->price = $price;
           

            echo '<fieldset>
                    <center>
                        <table>
                            <tr height="200">
                                <td>
                                    <img src="/ABC-Shop-Management/images/ProductImage/'.$pImage.'" width="200" height="200">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    '.$name.'
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    '.$amount.'
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    '.$price.'
                                </td>
                            </tr>
                            <tr>
                                <td><center>
                                <form action="" method="POST">
                                    <input type="submit" name="buy" value="Buy"> &nbsp   
                                    <input type="submit" name="buy" value="Add to Cart">    
                                </form>
                                </center></td>
                            </tr>
                        </table>
                    </center>
                </fieldset><br>';
        }
    }
?>