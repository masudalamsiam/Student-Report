<?php
    function highLight($z, $y){
        if ($z == $y){
            return "active";
        }
        return "";        
    }
    
    function cGET($input,$x1){       
       if (isset($_GET[$input])){
            $x1 = $_GET[$input];
        }  
        return $x1;
    }
    $x =  cGET("region","*");
?>

<style>
    .sameLine {float: left;}
    .paddingRight {padding-right: 10px;}
</style>

<ul id="whichB" class="nav nav-pills sameLine paddingRight"> 
<li class="<?= highLight('*',$x) ?>">
<a data-county="*"> Display All </a>
</li>

<li class="<?= highLight('b',$x) ?>">
<a data-county="b"> Brooklyn </a>
</li>
<li class="<?= highLight('q',$x) ?>">
<a data-county="q"> Queens </a>
</li>
<li class="<?= highLight('x',$x) ?>">
<a data-county="x"> Bronx </a>
</li>
<li class="<?= highLight('l',$x) ?>">
<a data-county="l"> Long Island </a>
</li>
<li class="<?= highLight('w',$x) ?>">
<a data-county="w"> Westchester </a>
</li>
</ul> 


<div id="exam-filter" class="dropdown sameLine paddingRight">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Exams
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" data-exam-by="*">All Exam</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" data-exam-by="e1">avg greater than 90</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" data-exam-by="e2">avg greater than 80</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" data-exam-by="e3">avg greater than 70</a></li>            
      <li role="presentation"><a role="menuitem" tabindex="-1" data-exam-by="e4">avg greater than 60</a></li>    
    </ul>  
 </div>

<div id="sort-by" class="dropdown sameLine paddingRight">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Sort By
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" data-sort-by="1">1</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" data-sort-by="2">2</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" data-sort-by="3">3</a></li>            
	  <li role="presentation"><a role="menuitem" tabindex="-1" data-sort-by="4">4</a></li>            
	  <li role="presentation"><a role="menuitem" tabindex="-1" data-sort-by="5">5</a></li>            
    </ul>  
 </div>  


<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});

$('#whichB a').on("click",function(){    
    var county = $(this).attr("data-county");
    $( "#region" ).val(county)  ;
    $( "#target" ).submit()  ;    
    event.preventDefault();
})

$('#sort-by a').on("click",function(){    
    var sort = $(this).attr("data-sort-by");
    $( "#orderby" ).val(sort)  ;
    $( "#target" ).submit()  ; 
    event.preventDefault();
})


$('#exam-filter a').on("click",function(){    
    var exam = $(this).attr("data-exam-by");
    $( "#exam" ).val(exam)  ;
    $( "#target" ).submit()  ; 
    event.preventDefault();
})

</script>
<form id="target">
    <input id="region" name="region" type="hidden" value='<?=cGET("region","*") ?>' />
    <input id="orderby" name="orderby" type="hidden" value='<?=cGET("orderby","1") ?>' />
    <input id="exam" name="exam" type="hidden" value='<?=cGET("exam","*") ?>' />
</form>