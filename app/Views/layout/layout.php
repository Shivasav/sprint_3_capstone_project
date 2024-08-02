
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include('partials/head'); ?> 
</head>

<body>

<!-- Header START -->
<header class="navbar-light header-sticky">
<?= $this->include('partials/top_navigation'); ?> 
</header>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

 <!-- Render the content section -->
<?= $this->renderSection('content'); ?>
   
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START 
$this->include('partials/footer');
 =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"></div>

<?= $this->include('partials/scripts'); ?> 

<!--Start of Tawk.to Script-->
<!--<script type="text/javascript">-->
<!--    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();-->
<!--    (function(){-->
<!--    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];-->
<!--    s1.async=true;-->
<!--    s1.src='https://embed.tawk.to/6535b270f2439e1631e72802/1hdcs22e5';-->
<!--    s1.charset='UTF-8';-->
<!--    s1.setAttribute('crossorigin','*');-->
<!--    s0.parentNode.insertBefore(s1,s0);-->
<!--    })();-->
<!--</script>-->
<!--End of Tawk.to Script-->
</body>
</html>