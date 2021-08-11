<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>
<style>
 
.nav-fostrap{
    display: block;
    margin-bottom: 15px 0;
    background: #3498db;
    -webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
    -moz-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
    -o-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
    z-index: 120;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.26);
}
.nav-fostrap ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: block;
}
.nav-fostrap li {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: inline-block;
    position: relative;
    font-size: 14px;
    color: #def1f0;
}
.nav-fostrap li a{
    padding: 15px 20px;
    font-size: 14px;
    color: #def1f0;
    display: inline-block;
    outline: 0;
    font-weight: 400;
    text-decoration: none;
}
.nav-fostrap li:hover ul.dropdown{
    display: block;
}
.nav-fostrap li ul.dropdown{
    position: absolute;
    display: none;
    width: 200px;
    background: #2980b9;
    -webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
    -moz-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
    -o-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
    z-index: 110;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.26);
    padding-top: 0;
    
}
.nav-fostrap li ul.dropdown li{
    display: block;
    list-style-type: none;
}

.nav-fostrap li ul.dropdown li a{
    padding: 15px 20px;
    font-size: 15px;
    color: #fff;
    display: block;
    font-weight: 400;
    

}
.nav-fostrap li ul.dropdown li:last-child a{
    border-bottom: none;
}
.nav-fostrap li:hover a{
    background: #16547e;
    color: #fff !important;
}

.nav-fostrap li:first-child:hover a{
    border-radius: 3px 0 0 3px;
}
.nav-fostrap li ul.dropdown li:hover a{
    background: rgba(0,0,0,0.1);
}
.nav-fostrap li ul.dropdown li:first-child:hover a{
    border-radius: 0;
}
.nav-fostrap li:hover.arrow-down{
    border-top: 5px solid #fff;
}
.arrow-down{
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #def1f0;
    position: relative;
    top: 15px;
    right: -5px;
    content: "";
}
.title-on-mobile{
    display: none;
}
/* make it responsive */
@media only screen and (max-width:900px){
    .nav-fostrap{
        background: #fff;
        width: 200px;
        height: 100%;
        display: block;
        position: fixed;
        left: -200px;
        top: 0px;
        -webkit-transition: left 0.25s ease;
        -moz-transition: left 0.25s ease;
        -ms-transition:left 0.25s ease;
        -o-transition: left 0.25s ease;
        transition: left 0.25s ease;
        margin: 0;
        border: 0;
        border-radius: 0;
        overflow-y: auto;
        overflow-x: hidden;
        height: 100%;
    z-index: 105;
    }
   .title-on-mobile{
       position: fixed;
       display: block;
       top: 10px;
       font-size: 24px;
       left: 100px;
       right: 100px;
       text-align: center;
       color: #fff !important;
       text-decoration: none;
   } 
   .nav-fostrap.visible{
       left: 0px;
       -webkit-transition: left 0.25s ease;
       -moz-transition: left 0.25s ease;
       -ms-transition:left 0.25s ease;
       transition: left 0.25s ease;
       z-index: 90;
   }
   .nav-bg-fostrap{
       display: inline-block;
       vertical-align: middle;
       width: 100%;
       height: 50px;
       margin: 0;
       position: absolute;
       top: 0px;
       left: 0px;
       background: #3498db;
       padding: 12px 0 0 10px;
       -webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
       -moz-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
       -o-box-shadow:0 2px 5px 0 rgba(0,0,0,0.26);
       z-index: 100;
       box-shadow: 0 2px 5px 0 rgba(0,0,0,0.26);
   }
   .navbar-fostrap{
       display: inline-block;
       vertical-align: middle;
       height: 50px;
       cursor: pointer;
       margin: 0;
       position: absolute;
       top: 0;
       left: 0;
       padding: 12px;
       z-index: 102;
   }
   .navbar-fostrap span{
       height: 2px;
       background: #fff;
       margin: 5px;
       display: block;
       width: 20px;
   }
   .navbar-fostrap span:nth-child(2){
       width: 20px;
   }
   .navbar-fostrap span:nth-child(3){
       width: 20px;
   }
   .nav-fostrap ul{
       padding-top: 50px;
   }
   .nav-fostrap li{
       display: block;
   }
   .nav-fostrap li a{
       display: block;
       color: #505050;
       font-weight: 600;
   }
   .nav-fostrap li:first-child:hover a{
       border-radius: 0;
   }
   .nav-fostrap li ul.dropdown{
       position: relative;
   }
   .nav-fostrap li ul.dropdown li a{
       background: #2980b9!important;
       border-bottom: none;
       color: #fff !important;
   }
   .nav-fostrap li:hover a{
       background: #3498db;
       color: #fff !important;
   }

   .nav-fostrap li ul.dropdown li a{
       padding:  10px 10px 10px 30px;
   }
   .nav-fostrap li:hover .arrow-down{
       border-top: 5px solid #fff;
   }
   .arrow-down{
       border-top: 5px solid #505050;
       position: absolute;
       top: 20px;
       right: 10px;
   }
   .cover-bg{
       background: rgba(0,0,0,0.5);
       position: fixed;
       top: 0;
       bottom: 0;
       left: 0;
       right: 0;
   }
}
@media only screen and (max-width:1199px){
    .container{
        width: 96%;
    }
}
.fixed-top{
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 120;
}

      
	  </style>
<script>
   
         $(document).ready(function(){
    $('.navbar-fostrap').click(function(){
        $('.nav-fostrap').toggleClass('visible');
        $('body').toggleClass('cover-bg');
    })
})
     
</script>

      
	  