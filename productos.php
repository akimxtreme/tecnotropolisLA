<?php
require_once("tags.php");
$html = new Html();
$html->html_i();


?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<?php
$html->nav(); 
?>


    <!-- Intro Header -->
    <header class="intro" style="height: 12%;">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-lg-offset-2">           
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    
    <!-- About Section -->
    <section id="contenido" class="  text-center">
    
        <div class="row">
            <div class="col-lg-2" >
                
                <div class="" >
                    <img src="img/logotipo3.png">
                </div>                
                
                <ul class="nav nav-pills nav-stacked ">
                    <li class="active"><a href="#">Nokia</a></li>
                    <li><a href="#">Samsung</a></li>
                    <li><a href="#">Sony</a></li>
                    <li><a href="#">Motorola</a></li>
                    <li><a href="#">HTC</a></li>
                    <li><a href="#">Huawei</a></li>
                    <li><a href="#">Lenovo</a></li>
                    <li><a href="#">Apple</a></li>
                    <li><a href="#">Alcatel</a></li>                   
                </ul>

            </div>
            <div class="col-lg-10" >        
                <h2 class="col-lg-12"><a href="#">Productos</a></h2>
                <!--<div class="col-lg-4"><img src=""></div>-->
            </div>
        </div>
    </section>

<?php
$html->html_f();    
?>
