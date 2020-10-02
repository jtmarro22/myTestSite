
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class="navbar">
  <div class="navbar-inner">
    <div class="left"><a href="#" class="back link"> <i class="icon icon-back"></i><span>Back</span></a></div>
    <div class="center sliding">Form</div>
    <div class="right">
      <!-- Right link contains only icon - additional "icon-only" class--><a href="#" class="link icon-only open-panel"> <i class="icon icon-bars"></i></a>
    </div>
  </div>
</div>
<div class="pages">
  <!-- Page, data-page contains page name-->
  <div data-page="email" class="page">
  <form id="emailForm" name="" action="test4.php" method="POST">
    <!-- Scrollable page content-->
    <div class="page-content">
    <div class="content-block-title">
      <div  style="color:#fff;width:58%;float:left;white-space:normal;line-height:18px;">Share Your Photo to Friends By E-mail or Text or Both</div>
      <div style="width:40%;float:left;margin-left:2%;"><img id="photo" src="" alt="Hi From the Salty Dog Cafe" title="Hi From The Salty Dog Cafe" style="width:100%;"></div>
      </div>
      <div style="clear:both;"></div>
      <div class="list-block" style="margin-bottom:20px;margin-top:0;">
      
        <ul>
          <li>
          <style>
          
		  input[type="text"],input[type="email"],input[type="tel"],textarea{
			  border:1px solid #4c5f73 !important;
			  background:#3f5165 !important;
			  padding:10px !important;
			  border-radius:3px !important;
			  width:100% !important;
			  color:#fff !important;
		  }
      select{
        border:1px solid #4c5f73 !important;
			  background:#3f5165 !important;
			  padding:10px !important;
			  border-radius:3px !important;
			  width:100% !important;
			  color:#fff !important;
        appearance: menulist;
      }
		  .list-block li{
			  margin:10px 0 !important;
		  }
		  .list-block textarea{
			  height:70px !important;
		  }
		  .message{
			  max-width:100%;
		  }
		  </style>
            <!-- <div class="item-content">
              <div class="item-media"><i class="icon icon-form-name"></i></div>
              <div class="item-inner"> 
               
                <div class="item-input">
                  <input type="text" name="name" placeholder="Your Name"/>
                </div>
              </div>
            </div>
          </li>
          <li> -->
            <div class="item-content">
              <div class="item-media"><i class="icon icon-form-email"></i></div>
              <div class="item-inner"> 
        
                <div class="item-input">
                  <input type="email" name="email" id="formEmail" placeholder="Enter Your Friend's E-mail" required/>
                </div>
              </div>
            </div>
          </li>
          <!-- <li>
          <div class="item-content">
              <div class="item-media"><i class="icon icon-form-tel"></i></div>
              <div class="item-inner"> 
              <div class="item-input">
                <input type="tel" name="phone" placeholder="Text To Your Friend’s Phone Number"/>
                </div>
              </div>
              </div>
          </li> -->
   
          <!-- <li>
          <div class="item-content">
          <div class="item-media">Your Friend's Carrier (required)</div>
          <div class="item-inner"> 
          <div class="item-input">
              <select name="carrier" id="carrier" required >
                <option>Choose One</option>
                <option>Verizon</option>
                <option>AT&T</option>
                <option>T-Mobile</option>
                <option>Sprint</option>
                <option>Virgin Mobile</option>
                <option>Tracfone</option>
                <option>Boost Mobile</option>
                <option>U.S. Cellular</option>
                <option>Metro PCS</option>
                <option>Ting</option>
              </select>
    </div>
    </div>
    </div>
          </li> -->
          <li class="align-top">
            <div class="item-content">
              <div class="item-media"><i class="icon icon-form-comment"></i></div>
              <div class="item-inner"> 
             
                <div class="item-input">
                  <textarea name="message" class="message" placeholder="Your Message Goes Here"></textarea>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <input type="hidden" id="email-image" name="image" value="">
      <div class="content-block" style="max-width:95%;margin:0 auto;">
        <div class="row">
          <div class="col-50"><a href="#" class="cancel button button-big button-fill">Cancel</a></div>
          <div class="col-50">
            <input type="submit" id="submit" value="Submit" class="button button-big button-fill color-green"/>
          </div>
        </div>
      </div>
  
    </div>
    </form>
  </div>
</div>
<script>
// jQuery(function ($) {
//   var $inputs = $('input[name=phone],input[name=email]');
//   $inputs.on('input', function () {
//       // Set the required property of the other input to false if this input is not empty.
//       $inputs.not(this).prop('required', !$(this).val().length);

//   });
// });

// $('#emailForm').submit(function() {
//   var $phoneInput = $('input[name=phone]');
//   var $emailInput = $('input[name=email');

//   if($phoneInput.val() == "" && $emailInput.val() == "" ){
//     $phoneInput.prop('required' , true);
//     $emailInput.prop('required' , true);
//   }
// });

// $('#emailForm').submit(function() {
//   e.preventDefault(); // avoid to execute the actual submit of the form.

//   $.ajax({
//            type: "POST",
//            url: "test4.php",
//            data: this.serialize(), // serializes the form's elements.
//            success: function(data)
//            {
//                alert(data); // show response from the php script.
//            }
//          });
// });
</script>