<!-- begin #footer -->
<div id="footer" class="footer">
    <span class="pull-right">
        <a href="javascript:;" class="btn-scroll-to-top" data-click="scroll-top">
            <i class="fa fa-arrow-up"></i> <span class="hidden-xs">Back to Top</span>
        </a>
    </span>
    &copy; <?= date("Y", time()) ?> <b>M L M Admin</b> All Right Reserved
</div>
<!-- end #footer -->
</div>
<!-- end #content -->

</div>
<!-- end page container -->

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close" onclick="document.getElementById('myModal').style.display = 'none'"><i class="fa fa-remove"></i></span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    $('.catSelection').change(function(){
            var catId = $(this).val();
            console.log(catId); return;
            $.post('<?=base_url()?>Home/getsubByCategoriesIDforparent', {ID:catId}, function(resp){

            }) //$.post('<?=base_url()?>Home/getsubByCategoriesID'
        }) //$('.catSelection').click  

});
</script>
<script>
    $(function(){
        
    }) // onload
</script>
<script>
    var base_url = '<?= base_url() ?>';

    var newImg = new Image();
        var height, width;

        newImg.onload = function() {
        height = newImg.height;
        width = newImg.width;

        };

    newImg.src = getElementById("image_5"); 
    alert(newImg.src);

function getImageSizeInBytes(imgURL) {
    var request = new XMLHttpRequest();
    request.open("HEAD", imgURL, false);
    request.send(null);
    var headerText = request.getAllResponseHeaders();
    var re = /Content\-Length\s*:\s*(\d+)/i;
    re.exec(headerText);
    return parseInt(RegExp.$1);
}


    var height = newImg.height;
        var width = newImg.width;       
        

   var size_image = getImageSizeInBytes('http://x0.org.ua/test/p/29/1.jpg');

 size_image = size_image / 1000; 


//  alert(getImageSizeInBytes('http://x0.org.ua/test/p/29/1.jpg'));             
                    
//    alert ('The image size is '+size+'*'+height);                 
                    


          $(".info").html( " "+width+" x "+height+", "+size_image+"  kb ");


</script>
<!-- ================== BEGIN BASE JS ================== -->
<script src="<?= base_url() . "assets/admin/plugins/jquery/jquery-1.9.1.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/jquery/jquery-migrate-1.1.0.min.js" ?>"></script>
<!--<script src="<?= base_url() . "assets/admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js" ?>"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="<?= base_url() . "assets/admin/plugins/bootstrap/js/bootstrap.min.js" ?>"></script>

<!--[if lt IE 9]>
        <script src="<?= base_url() . "assets/admin/crossbrowserjs/html5shiv.js" ?>"></script>
        <script src="<?= base_url() . "assets/admin/crossbrowserjs/respond.min.js" ?>"></script>
<![endif]-->
<script src="<?= base_url() . "assets/admin/plugins/slimscroll/jquery.slimscroll.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/jquery-cookie/jquery.cookie.js" ?>"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?= base_url() . "assets/admin/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/js/formvalidation.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/js/formvalidation_bootstrap.js" ?>"></script>

<script src="<?= base_url() . "assets/admin/plugins/sparkline/jquery.sparkline.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/jquery.flot.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/jquery.flot.time.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/jquery.flot.resize.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/jquery.flot.pie.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/jquery.flot.stack.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/jquery.flot.crosshair.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/jquery.flot.categories.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/flot/CurvedLines/curvedLines.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/plugins/DataTables/media/js/jquery.dataTables.js" ?>" ></script>
<script src="<?= base_url() . "assets/admin/plugins/DataTables/media/js/dataTables.bootstrap.min.js" ?>" ></script>
<script src="<?= base_url() . "assets/admin/plugins/DataTables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js" ?>" ></script>
<script src="<?= base_url() . "assets/admin/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>" ></script>
<script src="<?= base_url() . "assets/admin/js/page-table-manage-fixed-header.demo.min.js" ?> "></script>

<!-- ckedotor -->
<script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>

<script src="<?= base_url() . "assets/admin/js/jquery.blockUI.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/js/page-index.demo.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/js/demo.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/js/apps.min.js" ?>"></script>
<script src="<?= base_url() . "assets/admin/js/custom.js" ?> "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script type="text/javascript">
    var _URL = window.URL || window.webkitURL;
function displayPreview(files,imagenum) {
    var img = new Image(),
        fileSize=Math.round(files.size / 1024);
    
    img.onload = function () {
            var width=this.width,
                height=this.height,
                imgsrc=this.src;  
      
        doSomething(fileSize,width,height,imgsrc,imagenum); //call function
        
        };   
img.src = _URL.createObjectURL(files);
}

// Do what you want in this function
function doSomething(size,width,height,imgsrc,imagenumber)
{
     // $('#preview').append('<img src="'+imgsrc+'">');
     if (size < 1024 || width < 500 || height < 500) {
        // $('#preview').append('<p class="text-danger">Size='+size+'kb');
        alert("Image "+imagenumber+" size must be less then 5mb and dimensions must be 500 X 500");  
     } 
     // alert("Width="+width+" height="+height); 
}

$("#image_1").change(function () {
    var file = this.files[0];

    displayPreview(file,1);


});
$("#image_2").change(function () {
    var file = this.files[0];

    displayPreview(file,2);


});
$("#image_3").change(function () {
    var file = this.files[0];

    displayPreview(file,3);


});
$("#image_4").change(function () {
    var file = this.files[0];

    displayPreview(file,4);


});
</script>
<script>
    $(function(){
        $('.isParentClass').change(function(){
           var isParent = $(this).val();
        // alert(isParent); return;
           if(isParent=='0')
           {
                $('.parentSubCat').css('display','block');
           } 
           else{
                $('.parentSubCat').css('display','none');

           }
        });
    })
</script>
<script>
    $(document).ready(function () {
        App.init();
        Demo.init();
        PageDemo.init();
        CKEDITOR.replace('post_desc');

        
    });

    $('#country').select2({
        placeholder: 'Select Countries'
    });
    // $("#country_list").find('.select2-search__field').addClass("country_select");

    $('#states').select2({
        placeholder: 'Select States'
    });

    $('#city').select2({
        placeholder: 'Select Cities'
    });


    //$("#state_list").find('.select2-search__field').addClass("state_select");
</script>
<script>
    // function GetFileSize(image) {
    //     // var fi = document.getElementById('file'); // GET THE FILE INPUT.
    //     alert(image.files.size);
    //     // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
    //     if (image.files.length > 0) {
    //         // RUN A LOOP TO CHECK EACH SELECTED FILE.
    //         alert(image.files.length);
    //         for (var i = 0; i <= image.files.length - 1; i++) {

    //             var fsize = image.files.item(i).size;      // THE SIZE OF THE FILE.
    //             document.getElementById('fp').innerHTML =
    //                 document.getElementById('fp').innerHTML + '<br /> ' +
    //                     '<b>' + Math.round((fsize / 1024)) + '</b> KB';
    //         }
    //     }
    // }
</script>

</body>
</html>
