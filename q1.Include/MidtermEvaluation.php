<?php
    include_once "IGrade.php";

    class MidtermEvaluation implements IGrade {
            public function getLetterGrade($score){
                $status = "failing";
                if ($score >= 65){
                    $status = "passing";
                }
                return $status;
            }
    }

?>