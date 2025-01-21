<?php

	    function invoice_id_generate(int $invoice_id): string
    {
        $default= "00000";
        $default_let= strlen($default);

        $number = "$invoice_id";
        $let    = strlen($number);

        for($i = 0; $i < $default_let; $i++){
            if($let-- > 0) continue;
            $number = "0$number";
        }

        return $number;
    }

echo invoice_id_generate(1);

?>
