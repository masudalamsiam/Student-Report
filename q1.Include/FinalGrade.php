<?php
    include_once "IGrade.php";

    class FinalGrade implements IGrade {
            public function getLetterGrade($score){
                $status = "";
                if ($score >= 90){
                    $status = "A";
                }
                else if ($score >= 80){
                    $status = "B";
                }
                else if ($score >= 70){
                    $status = "C";
                }
                else if ($score >= 65){
                    $status = "D";
                }
                else {
                    $status = "F";
                }
                return $status;
            }
    }

?>