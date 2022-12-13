<?php
 require('db-xyz-abc.php');
 require('php_helper.php');

 if(isset($_POST['isset_get_portfolio'])){
   $col_id = realEscape('col_id');
   $get_data = fetch_data('portfolio','*', "col_id = '$col_id'");
   $get_f = $get_data['data'];
      
   $img = $get_f[0]['img'];
   $category = get_category_name($get_f[0]['cat_id']);
   $des = $get_f[0]['des'];
   $url = $get_f[0]['url'];
   $title = $get_f[0]['title'];
   echo "
   <div class='row' id='portolio-content'>
   <div class='col-lg-6'>
       <div class='portfolio-popup-thumbnail'>
           <div class='image'>
               <img class='w-100' src='assets/img/portfolio/$img' alt='slide'>
           </div>
       </div>
   </div>
   <div class='col-lg-6'>
       <div class='text-content'>
          <strong>$category</strong>
           <h3>
               $title
           </h3>
           <p class='mb--30'>$des</p>
           <div class='button-group mt--20'>
               <a href='$url' class='rn-btn'>
                   <span>View project</span>
                   <i data-feather='chevron-right'></i>
               </a>
           </div>
       </div>
   </div>
</div>
   ";
 }
?>