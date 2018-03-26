<?php
    include_once "IGrade.php";

    class ElementaryGrade implements IGrade {
            public function getLetterGrade ($score){
                $status = "";
                if ($score >= 90){
                    $status = "excellent";
                }
                else if ($score >= 80){
                    $status = "good";
                }
                else if ($score >= 70){
                    $status = "average";
                }
                else if ($score >= 65){
                    $status = "passing";
                }
                else {
                    $status = "fail";
                }
                return $status;
            }
    }

?>