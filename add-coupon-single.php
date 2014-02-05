	<div class="changeable forth">
        <div id="header-bg" class="header-single-coupon"><h2>Below you can create a single coupon.</h2></div>
<div><span class='error'><?php echo $couzoo->GetErrorMessage(); ?></span></div>
            <div id="create-a-coupon">
              <div id="advancedCall">
   				<form style="" id="form1" action="<?php echo $couzoo->GetSelfScript(); ?>" method="post" enctype="multipart/form-data" name="advancedCall">
			       <input type='hidden' name='submit_coupon' id='submitted' value='1'/>
				<input type='hidden' name='promo_code' id='promo_code_form' value='0'/>
                <ul class="acc" id="acccreate">

 					<li>
                 		 <h3 id="step-1"><span class="cc-step-title"><strong>1:</strong>Create Coupon Title</span><a href="#help-step3" class="fancybox help-icon" >[&nbsp;?&nbsp;]</a>
				 <span class="error" id="err-step-1">**Please select a final title for your coupon</span></h3>

                        <div class="acc-section">
                           <div id="step-1-change" class="acc-content">
                            
                            <div style="width:100%; height:68px; margin:0px; overflow:hidden; position:relative; top:1px;">
                            <p><span class="step-copy" style="margin-top:1px;">What is this coupon for?</span></p>
                            <br clear="all"/>
                                <span>
                                <input type="radio" value="0" class="required step-1-change"  id="titletype1" name="coupontype" style="border:none;"/> 
                                <label for="titletype1"><span class="step-copy">Specific Product or Service</span></label>
                                </span>                              
                                <span>
                                <input type="radio" value="1" class="required step-1-change"  id="titletype2" name="coupontype" style="border:none; margin-left:25px;"/> 
                                <label for="titletype2"><span class="step-copy">Any Purchase at <?=$bname?></span></label>
                                </span>
                            </div>
                                    
                            <div class="product-service-title" style="display:none; width:720px; margin:15px 0px;">
                                 <p style="padding-bottom:4px;"><span class="step-copy">What is the product or service being featured in this coupon?</span></p>
                                 <input type="text" name="featureditemselect" id="featured-item" class="required apfeaturename step-1-change"  value="Enter Product or Service Featured" maxlength="35" style="width:696px; margin-left:3px;"/>
                                    
                                 <p id="footnote">&nbsp;&nbsp;<strong>examples:</strong> "lunch and a drink" , "a hair coloring" , "an oil change" , "a massage" , "a mani pedi" </p>
                             </div><!--End product service title-->
                             
                             
                             
                             
                             <!--Start Percent amount section-->
                                   <div class="retail-minimum-selector" style="display:none; width:720px; float:left; margin:0px 0px;" id="blk-2">
                                       <p class="step-copy">
                                                                               
                                           <div class="store-discont" style="width:720px;">        
                                               <span class="step-field-title-box">What is the mimimum purchase required for this coupon to be valid?&nbsp; $&nbsp;</span>
                                               <input type="number" name="min_purchase_any" id="minimum-purchase" class="required apminpurch step-1-change" value="" style="width:70px; margin-left:1px;"/>
                                           </div>
                                           
                                           <div class="item-discount" style="width:720px; margin-top:2px">
                                               <span class="step-field-title-box">What is the retail value of the <span class="apfeaturename-field item-discount autopop-pricing-copy"></span>?&nbsp; $&nbsp;</span>
                                               <input type="number" name="retail_price" id="retail-price" class="required apretail step-1-change" value="" style="width:70px; text-align:center; padding-left:0px;"/>
                                           </div>
                                        
                                       </p>
                                   </div>
                             <!--End Percent amount section--> 
                             
                             
                               
                                
                              <div class="dollars-or-percent-selector" style="width:auto; display:none;">
                                   <span class="step-copy" style="margin:-10px 0px 10px 0px;">
                                   		How will the <span class="store-discont" style="font-size:inherit;">customer's purchase</span><span class="apfeaturename-field item-discount autopop-pricing-copy"></span> be discounted?<br />
                                   		<span id="footnote"><strong>note:</strong> you may only select one</span>
                                   </span> 
                                      
                                   <!--Start Off Item amount section-->
                                   <div class="toHide off-item-selector" style="float:left; margin:0px 0px;" id="blk-1">
                                       <p class="step-copy">
                                        
                                           <div style="width:auto; float:left;"> 
                                               <span class="step-field-title-box">
                                               Dollars Off: $&nbsp;
                                               </span>
                                               <input type="number" name="dollars_off" id="dollars-off" class="required apdollarsoff step-1-change"  value="" style="width:70px; margin-left:1px; text-align:center; padding-left:0px;"/>
                                           </div>
                                           
                                           <div style="width:auto; float:left;">
                                               <span class="step-field-title-box">
                                                   <span style="color:#f26625; font-weight:bold; font-size:14px;" >
                                                   &nbsp;&nbsp;&nbsp;-OR-&nbsp;&nbsp;
                                                   </span> 
                                                   Percent Off: &nbsp;
                                                </span>
                                                <input type="number" name="percent_off" id="percent-off" class="required appercentoff step-1-change percent-off" value="" style="width:70px; margin-left:1px; text-align:center; padding-left:0px;"/>&nbsp;<font color="#603912">%</font>
                                           </div>
                                           
                                           <div style="width:auto; float:left;">  
											   <span class="step-field-title-box">
                                                   <span style="color:#f26625; font-weight:bold; font-size:14px;" >
                                                   &nbsp;&nbsp;&nbsp;-OR-&nbsp;&nbsp;
                                                   </span>
	                                               A Lower Price: $&nbsp;
                                               </span>
                                               <input type="number" name="lower_price" id="sale-price" class="required apsale step-1-change"  value="" style="width:70px; margin-left:1px; text-align:center; padding-left:0px;"/>    
                                           </div>
                                           </p>
                                   </div>
                                   <!--End Dollar amount section-->
                                   
                                   <!--Start Off Total amount section-->
                                   <div class="toHide off-total-selector" style="float:left; margin:0px 0px;" id="blk-1">
                                       <p class="step-copy">                                           
                                                                                     
                                           <div style="width:auto; float:left;"> 
                                               <span class="step-field-title-box">
                                               Dollars Off: $&nbsp;
                                               </span>
                                               <input type="number" name="dollars_off_any" id="dollars-off-total" class="required apdollarsofftotal step-1-change"  value="" style="width:70px; margin-left:1px; text-align:center; padding-left:0px;"/>
                                           </div>
                                           
                                           <div style="width:auto; float:left;">
                                               <span class="step-field-title-box">
                                                   <span style="color:#f26625; font-weight:bold; font-size:14px;" >
                                                   &nbsp;&nbsp;&nbsp;-OR-&nbsp;&nbsp;
                                                   </span> 
                                                   Percent Off: &nbsp;
                                                </span>
                                                <input type="number" name="percent_off_any" id="percent-off-total" class="required appercentofftotal step-1-change percent-off" value="" style="width:70px; margin-left:1px; text-align:center; padding-left:0px;"/>&nbsp;<font color="#603912">%</font>
                                           </div>
                                        
                                       </p>
                                   </div>
                                   <!--End Dollar amount section-->
                                   
                                   <br clear="all"/>       
                              </div>
                              
                                                            
                              <div class="step-3-dollars" style="display:none;"><!--START  Title Options-->
                                 <br clear="all"/>
                                  <div id="select-title-format">Select the Final Title of Your Coupon</div>
                                  	<input type="hidden" name="id_user" value="<?=$id_user?>">
                              
                              	  <div class="dollars-off-option" style="display:none;"><!--START Dollars Off Item Title Options-->         
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-dollars-op1" id="step-2-dollars-op1" name="title_format" />
                                          <label for="step-2-dollars-op1">
                                                <p id="p-step-2-dollars-op1" class="step-copy step-3-copy">
                                                    $<span class="apdollarsoff-field autopop-pricing-copy"></span> off a $<span class="apretail-field autopop-pricing-copy"></span> <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-dollars-op2" id="step-2-dollars-op2" name="title_format" />
                                          <label for="step-2-dollars-op2">
                                                <p id="p-step-2-dollars-op2" class="step-copy step-3-copy">
                                                    $<span class="apdollarsoff-field autopop-pricing-copy"></span> off $<span class="apretail-field autopop-pricing-copy"></span> worth of <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-dollars-op3" id="step-2-dollars-op3" name="title_format" />
                                          <label for="step-2-dollars-op3">
                                                <p id="p-step-2-dollars-op3" class="step-copy step-3-copy">
                                                Save $<span class="apdollarsoff-field autopop-pricing-copy"></span> on a $<span class="apretail-field autopop-pricing-copy"></span> <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-dollars-op4" id="step-2-dollars-op4" name="title_format" />
                                          <label for="step-2-dollars-op4">
                                                <p id="p-step-2-dollars-op4" class="step-copy step-3-copy">
                                                Save $<span class="apdollarsoff-field autopop-pricing-copy"></span> on <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-dollars-op5" id="step-2-dollars-op5" name="title_format" />
                                          <label for="step-2-dollars-op5">
                                                <p id="p-step-2-dollars-op5" class="step-copy step-3-copy">
                                                    $<span class="apdollarsoff-field autopop-pricing-copy"></span> off <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-dollars-op6" id="step-2-dollars-op6" name="title_format" />
                                          <label for="step-2-dollars-op6">
                                                <p id="p-step-2-dollars-op6" class="step-copy step-3-copy">
                                                    $<span class="apdollarsoff-field autopop-pricing-copy"></span> off <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?> (Regularly $<span class="apretail-field autopop-pricing-copy"></span>)
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                  </div><!--END Dollars Off Item Title Options-->
                              	  
                                  <div class="percent-off-option" style="display:none;"><!--START Percent Off Item Title Options-->         
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-percent-op1" id="step-2-percent-op1" name="title_format" />
                                          <label for="step-2-percent-op1">
                                                <p id="p-step-2-percent-op1" class="step-copy step-3-copy">
                                                    <span class="appercentoff-field autopop-pricing-copy"></span>% off a $<span class="apretail-field autopop-pricing-copy"></span> <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-percent-op2" id="step-2-percent-op2" name="title_format" />
                                          <label for="step-2-percent-op2">
                                                <p id="p-step-2-percent-op2" class="step-copy step-3-copy">
                                                    <span class="appercentoff-field autopop-pricing-copy"></span>% off $<span class="apretail-field autopop-pricing-copy"></span> worth of <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-percent-op3" id="step-2-percent-op3" name="title_format" />
                                          <label for="step-2-percent-op3">
                                                <p id="p-step-2-percent-op3" class="step-copy step-3-copy">
                                                Save <span class="appercentoff-field autopop-pricing-copy"></span>% on a $<span class="apretail-field autopop-pricing-copy"></span> <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-percent-op4" id="step-2-percent-op4" name="title_format" />
                                          <label for="step-2-percent-op4">
                                                <p id="p-step-2-percent-op4" class="step-copy step-3-copy">
                                                Save <span class="appercentoff-field autopop-pricing-copy"></span>% on <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-percent-op5" id="step-2-percent-op5" name="title_format" />
                                          <label for="step-2-percent-op5">
                                                <p id="p-step-2-percent-op5" class="step-copy step-3-copy">
                                                    <span class="appercentoff-field autopop-pricing-copy"></span>% off <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-percent-op6" id="step-2-percent-op6" name="title_format" />
                                          <label for="step-2-percent-op6">
                                                <p id="p-step-2-percent-op6" class="step-copy step-3-copy">
                                                    <span class="appercentoff-field autopop-pricing-copy"></span>% off <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?> (Regularly $<span class="apretail-field autopop-pricing-copy"></span>)
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                  </div><!--END Percent Off Item Title Options-->
                                  
                                  <div class="sale-price-option" style="display:none;"><!--START Sale Price Title Options-->
                                  	  <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-saleprice-op1" id="step-2-saleprice-op1" name="title_format" />
                                          <label for="step-2-saleprice-op1">
                                                <p id="p-step-2-saleprice-op1" class="step-copy step-3-copy">
                                                	$<span class="apsale-field autopop-pricing-copy"></span> for a $<span class="apretail-field autopop-pricing-copy"></span> <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                                                                                                                                    
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-saleprice-op2" id="step-2-saleprice-op2" name="title_format" />
                                          <label for="step-2-saleprice-op2">
                                                <p id="p-step-2-saleprice-op2" class="step-copy step-3-copy">
                                                	$<span class="apsale-field autopop-pricing-copy"></span> for $<span class="apretail-field autopop-pricing-copy"></span> worth of <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>
                                      
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-saleprice-op3" id="step-2-saleprice-op3" name="title_format" />
                                          <label for="step-2-saleprice-op3">
                                                <p id="p-step-2-saleprice-op3" class="step-copy step-3-copy">
                                                	$<span class="apretail-field autopop-pricing-copy"></span> <span class="apfeaturename-field autopop-pricing-copy"></span> for only $<span class="apsale-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span> 
                                      
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-saleprice-op4" id="step-2-saleprice-op4" name="title_format" />
                                          <label for="step-2-saleprice-op4">
                                                <p id="p-step-2-saleprice-op4" class="step-copy step-3-copy">
                                                	$<span class="apretail-field autopop-pricing-copy"></span> worth of <span class="apfeaturename-field autopop-pricing-copy"></span> for only $<span class="apsale-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span> 
                                      
                                      <span>
                                          <input type="radio" class="required title-option" value="step-2-saleprice-op5" id="step-2-saleprice-op5" name="title_format" />
                                          <label for="step-2-saleprice-op5">
                                                <p id="p-step-2-saleprice-op5" class="step-copy step-3-copy">
                                                	$<span class="apsale-field autopop-pricing-copy"></span> for <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?> (Regularly $<span class="apretail-field autopop-pricing-copy"></span>)
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>   
                                      
                                      <span>                                  
                                          <input type="radio" class="required title-option" value="step-2-saleprice-op6" id="step-2-saleprice-op6" name="title_format" />
                                          <label for="step-2-saleprice-op6">
                                                <p id="p-step-2-saleprice-op6" class="step-copy step-3-copy">
                                                	$<span class="apsale-field autopop-pricing-copy"></span> for a <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                      </span>                    
                                  </div><!--END Sale Price Title Options-->
                                  
                         <!-- START Discount on Purchs (not item)-->
                         			
                                  <!--START Dollars Off Item Title Options-->
                                  <div class="dollars-off-total-option" style="display:none;">         
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-dollarst-op1" id="step-2-dollarst-op1" name="title_format" />
                                          <label for="step-2-dollarst-op1">
                                                <p id="p-step-2-dollarst-op1" class="step-copy step-3-copy">
                                                    $<span class="apdollarsofftotal-field autopop-pricing-copy"></span> off your purchase at <?=$bname?> when you spend $<span class="apminpurch-field autopop-pricing-copy"></span> or more
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                       </span>
                                       
                                       <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-dollarst-op2" id="step-2-dollarst-op2" name="title_format" />
                                          <label for="step-2-dollarst-op2">
                                                <p id="p-step-2-dollarst-op2" class="step-copy step-3-copy">
                                                    $<span class="apdollarsofftotal-field autopop-pricing-copy"></span> off at <?=$bname?> when you spend $<span class="apminpurch-field autopop-pricing-copy"></span> or more
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                       </span>
                                       
                                       <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-dollarst-op3" id="step-2-dollarst-op3" name="title_format" />
                                          <label for="step-2-dollarst-op3">
                                                <p id="p-step-2-dollarst-op3" class="step-copy step-3-copy">
                                                    $<span class="apdollarsofftotal-field autopop-pricing-copy"></span> off your purchase of $<span class="apminpurch-field autopop-pricing-copy"></span> or more at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                       </span>
                                  </div><!--END Dollars Off Item Title Options-->
                              	  
                                  <!--START Percent Off Item Title Options-->
                                  <div class="percent-off-total-option" style="display:none;">         
                                      <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-percentt-op1" id="step-2-percentt-op1" name="title_format" />
                                          <label for="step-2-percentt-op1">
                                                <p id="p-step-2-percentt-op1" class="step-copy step-3-copy">
                                                    <span class="appercentofftotal-field autopop-pricing-copy"></span>% off your purchase at <?=$bname?> when you spend $<span class="apminpurch-field autopop-pricing-copy"></span> or more
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                       </span>
                                       
                                       <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-percentt-op2" id="step-2-percentt-op2" name="title_format" />
                                          <label for="step-2-percentt-op2">
                                                <p id="p-step-2-percentt-op2" class="step-copy step-3-copy">
                                                    <span class="appercentofftotal-field autopop-pricing-copy"></span>% off at <?=$bname?> when you spend $<span class="apminpurch-field autopop-pricing-copy"></span> or more
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                       </span>
                                       
                                       <span>                                      
                                          <input type="radio" class="required title-option" value="step-2-percentt-op3" id="step-2-percentt-op3" name="title_format" />
                                          <label for="step-2-percentt-op3">
                                                <p id="p-step-2-percentt-op3" class="step-copy step-3-copy">
                                                    <span class="appercentofftotal-field autopop-pricing-copy"></span>% off your purchase of $<span class="apminpurch-field autopop-pricing-copy"></span> or more at <?=$bname?>
                                                </p>
                                          </label>
                                          <br clear="all"/> 
                                       </span>
                                  </div><!--END Percent Off Item Title Options-->                       

					<!-- Final input text sent to server for saving -->
					<input type="hidden" value="" id="title_final" name="title_final" />
                                
                                  <div class="next-step-button next-step2"><a href="" id="open2">Next Step</a></div>

                              </div><!--END Title Options-->
                                  <br clear="all"/>
                          </div>
                        </div>
                	</li>
                   
                    <li>
                       <h3 id="step-2"><span class="cc-step-title"><strong>2:</strong>Select Coupon Image</span>
				<span class="error" id="err-step-2"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">

				<!-- Select an image to reuse - fancybox -->
                		<div id="reuse-img" style="width:700px;display: none;">
					<h2 style="font-family: Arial, Helvetica, sans-serif; color: #f26625; font-size: 22px; text-align: center; padding-bottom: 5px;">
						Click on the image that you want to reuse
					</h2>
					<?php
						$qry = mysql_query("SELECT id_coupon FROM CouZoo_Coupons WHERE id_user = '$id_user' ORDER BY date");
						$i=0;
						while ($res = mysql_fetch_array($qry)) {
							echo '
								<div class="reuse-img" id="'.$res['id_coupon'].'" style="cursor: pointer; padding: 0 20px; display: inline-block;">
								    <img width="180" height="100" src="uploads/coupons/'.$res['id_coupon'].'.jpg">
								</div>
							';
							$i++;
							if ($i==3) { echo "<div style='padding-top: 10px;'></div>"; $i=0; }
						}
						if (!mysql_num_rows($qry)) { echo "<center>There are not coupons to reuse. Please upload a new image!</center>"; }
					?>
				</div>

                                 <p><span class="step-copy">What image would you like to use on this coupon?</span></p>
                                  <br clear="all"/><br clear="all"/>
                                    <div style="float:left; width:400px;">

						  <input type="hidden" id="img_type" class="select-image-btn" name="img_type">
						  <input type="hidden" id="reuse_id" class="select-image-btn" name="reuse_id">

						  <div class="upload-image"><input type="file" class="select-image-btn" name="coupon_img" id="uploadImg" /></div>
                                            <div class="use-profile-pic"></div>
                                            <a href="#reuse-img" class="fancybox"><div class="reuse-image"></div></a>
						  <div id="rmImg" style="display: none; cursor: pointer; width: 100%">
                          		  <font color="red">Remove current image</font>
		                          <br clear="all"/>
                                  <div class="next-step-button next-step3"><a href="" id="open3">Next Step</a></div>
                          </div>
						  <div id="img-loader" style="display: none;"><img src="images/ajax-loader.gif"></img></div>
                                         </div>
                                      
                                        <div style="float:left; overflow: hidden; margin:-30px 0px 0px 20px; width:200px; height:200px; border:1px solid #CCC; background-image:url(images/create-coupon-image-preview.jpg)">
						<span class="img-helper"></span>
						<img src="#" id="imgPreview" class="img-upload">
                                  </div>
                                  <br clear="all"/>
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="step-3"><span class="cc-step-title"><strong>3:</strong>Create Coupon Description</span>
				<span class="error" id="err-step-3"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <p><span class="step-copy">Describe the product or service in which this coupon is featuring. </span></p>
                                   
                                   <div style="margin-top:12p; clear:both;">
                                    <font style="font-weight:bold; color:#f26625">*425 character max.  &nbsp; &nbsp; 
                                    *Sepatare words or phrases with with commas</font> </span>
					<div id="description">
                                      <textarea name="description" class="coupon-description-field" cols="93" rows="5" onkeypress="textCounterDesc(this,this.form.counter,425);" value="Enter a description of the product or service featured in this coupon"></textarea>
					</div>
                                      <script type="text/javascript"/>
                                            function textCounterDesc( field, countfield, maxlimit ) {
                                              if ( field.value.length > maxlimit )
                                              {
                                                field.value = field.value.substring( 0, maxlimit );
                                                alert( 'There is a 425 characters in length limit to the Coupon Description.' );
                                                return false;
                                              }
                                              else
                                              {
                                                countfield.value = maxlimit - field.value.length;
                                              }
                                            }
                                      </script>
                                      
                                  </div>
                                  <div class="next-step-button next-step4"><a href="" id="open4">Next Step</a></div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <h3 id="step-4"><span class="cc-step-title">
                        	<strong>4:</strong>Select Coupon Dates & Purchase Limit</span><a href="#help-step4" class="fancybox help-icon" >[&nbsp;?&nbsp;]</a>
  			       			<span class="error" id="err-step-4"></span>
                        </h3>
                        
                        <div class="acc-section">
                            <div class="acc-content">
                                <p>
                                	<span class="step-copy">For how long would you like this coupon to appear on CouZoo.com 
                                    and would you like there to be a maximum number of total coupons that can be sold on couzoo.com?</span>
                                </p>
                                
                            <div  style="width:100%; height:26px; padding-top:10px; margin:0px; overflow:hidden;">
                                <span>
                                <input type="radio" value="30" class="required"  id="run-date-30" name="run-dates" style="border:none;"/> 
                                <label for="run-date-30"><span class="step-copy" style="margin-right:30px;">30 days from now</span></label>
                                </span>                              
                                <span>
                                <input type="radio" value="60" class="required"  id="run-date-60" name="run-dates" style="border:none;"/> 
                                <label for="run-date-60"><span class="step-copy" style="margin-right:30px;">60 days from now</span></label>
                                </span>
                                <span>
                                <input type="radio" value="90" class="required"  id="run-date-90" name="run-dates" style="border:none;"/> 
                                <label for="run-date-90"><span class="step-copy" style="margin-right:15px;">90 days from now</span></label>
                                </span>                              
                                <span>
                                <input type="radio" value="custom" class="required"  id="run-date-custom" name="run-dates" style="border:none; margin-left:15px;"/> 
                                <label for="run-date-custom"><span class="step-copy">Custom date range</span></label>
                                </span>
                            </div>
                                
                                
                                      <div style="width:310px; height:auto; float:left; margin:0px 20px 0px 0px; padding:0px 20px 0px 0px;">
                                             <div style="margin:8px 0px 0px 0px;">
                                                <input type="checkbox" value="1" class="maxpurchchbx" id="maxpurchchbx" name="maxPurch"/><label for="maxpurchchbx"><span class="step-copy">
                                                Enable Maximum Purchases Amount</span>
                                                </label>
                                              </div>
                                       	   <br clear="all"/>
                                              <div class="toHide" style="display:none; float:left; margin:0px 0px;" id="paymaxp-1">
                                                    <div style="width:320px; height:55px; margin-top:15px; ">
                                                        <span class="step-field-title-box">Purchase Limit*&nbsp;:&nbsp;</span>
                                                        <input type="number" name="maxPurchases_num" id="maxPurchases_num" placeholder="2,500" style="width:80px;" />
                                                    </div>
                                              <p id="footnote" style="margin:10px 0px;">
                                              *This coupon will be removed from CouZoo after it has been purchased the amount of times entered in the "Purchase Limit" field.<br clear="all"/>
                                              </p>
                                          	</div> 
                                          <br clear="all"/>    
                                      </div>
                                      
                                      
                                      
                                    <div style="width:340px; height:auto; display:none; float:right;" class="custom-date-range-container">
                                        <p class="step-copy" style="margin:8px 0px 6px 45px;">Select Custom Date Range</p>
                                        <br clear="all"/>
                                            <input type="hidden" id="posting_date_formatted" name="posting_date_formatted" class="required">
                                            <input type="hidden" id="removal_date_formatted" name="removal_date_formatted" class="required">
                                            <span class="step-field-title-box" style="width:130px;">Posting Date*&nbsp;:</span>
                                            <input type="text" id="posting_date" name="posting_date" class="required" placeholder="click to select" style="width:150px;"/>
                                              <br clear="all"/>
                                              <span class="step-field-title-box" style="width:130px;">Removal Date**&nbsp;:</span>
                                              <input type="text" id="removal_date" name="removal_date" class="required" placeholder="3-month max" style="width:150px;"/>
                                          
                                          <p id="footnote" style="margin:2px 0px 10px 0px;">
                                              *Date this coupon will start to appear on CouZoo.com<br/>
                                              **Date this coupon will no longer appear on CouZoo.com
                                               <br clear="all"/>
                                          </p>
                                    </div>  
                                    <br clear="all"/> 
                                    
                                    <div class="exp-date-container" style="display:none;">
                                    <p style="width:100%; border-top:1px solid #f26625; padding-top:15px;">
                                    	<span class="step-copy">When would you like this coupon to expire (when it will no longer be valid for redemption at <?=$bname?> by customers)?</span>
                                    </p>
                                    <div  style="width:100%; height:30px; padding-top:10px; margin:0px; overflow:hidden;">
                                        <span>
                                        <input type="radio" value="3m" class="required exp-date-radio"  id="exp-date-3m" name="exp-date" style="border:none;"/> 
                                        <label for="exp-date-3m"><span class="step-copy" style="margin-right:30px;">3 months from now</span></label>
                                        </span>                              
                                        <span>
                                        <input type="radio" value="6m" class="required exp-date-radio"  id="exp-date-6m" name="exp-date" style="border:none;"/> 
                                        <label for="exp-date-6m"><span class="step-copy" style="margin-right:30px;">6 months from now</span></label>
                                        </span>
                                        <span>
                                        <input type="radio" value="1y" class="required exp-date-radio"  id="exp-date-1y" name="exp-date" style="border:none;"/> 
                                        <label for="exp-date-1y"><span class="step-copy" style="margin-right:15px;">1 year from now</span></label>
                                        </span>                              
                                        <span>
                                        <input type="radio" value="custom" class="required exp-date-radio"  id="exp-date-custom" name="exp-date" style="border:none; margin-left:15px;"/> 
                                        <label for="exp-date-custom"><span class="step-copy">Custom date range</span></label>
                                        </span>
                           			 </div>
                                    
                                        <!--Start Redemption Validity Period-->
                                        <div style="width:440px; height:auto; display:none; float:right;" class="custom-exp-date-range-container">
                                            <input type="hidden" id="valid_date_formatted" name="valid_date_formatted" class="required">
                                            <input type="hidden" id="exp_date_formatted" name="exp_date_formatted" class="required">
                                            <p class="step-copy">
                                            <div style="width:420px; float:left; margin-right:20px;">
                                                <p class="step-copy" style="margin:8px 0px 6px 70px;">Select Custom Valid Time Frame</p><br clear="all"/>
                                                <span class="step-field-title-box" style="width:240px;">Coupon becomes valid on*&nbsp;:</span>
                                                <input type="text" id="valid_date" name="valid_date" class="required" placeholder="click to select" style="width:150px;"/>
                                                    <br clear="all"/>
                                                <span class="step-field-title-box" style="width:240px;">Coupon is no longer valid after**&nbsp;: &nbsp;</span>
                                                <input type="text" id="exp_date" name="exp_date" class="required" placeholder="click to select" style="width:150px;"/>
                                        </div>
                                    </p>
                                    <p id="footnote">
                                      *This is the date this coupon will <strong>become valid</strong> and customers may begin to redeem it at your place of business.<br/>
                                      **This is the date this coupon is <strong>no longer valid</strong> and customers may no longer redeem it at your place of business.
                             		</p>
                                    </div>
                                    <!--End Redemption Validity Period-->
                                    <br clear="all"/>
                                    </div><!--END exp-date-container-->
                                    <div class="next-step-button next-step5"><a href="" id="open5">Next Step</a></div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <h3 id="step-5"><span class="cc-step-title"><strong>5:</strong>Create Coupon Restrictions</span>
						<span class="error" id="err-step-5"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content" id="restrictions">
                                <p><span class="step-copy">What redemption restrictions would you like to put on this coupon?</span></p>
                                    <div style="margin-top:12p; clear:both;">
                                      <textarea name="restrictions" class="coupon-restrictions-field" cols="93" rows="9" value="Enter all coupon restrictions here"></textarea>
                                          <p id="footnote">
                                      &nbsp;&nbsp;<strong>examples:</strong> 1 per customer. Dine in only. Not valid on weekends. Cannot be combined with other offers.
                                      </p>
                                   </div>
                                   <div class="next-step-button next-step6"><a href="" id="open6">Next Step</a></div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <h3 id="step-6"><span class="cc-step-title"><strong>6:</strong>Create Search Key Words</span>
				<span class="error" id="err-step-6"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <p><span class="step-copy">What key words or phrases do you think customers interested in this coupon and your product or service may use to search?</span></p>
                                   <br clear="all"/><br clear="all"/>
                                   
                                   <div>
                            
                                    <font style="font-weight:bold; color:#f26625">*250 character max.  &nbsp; &nbsp; 
                                    *Sepatare words or phrases with with commas</font> </span>
					<div id="keywords">
                                      <textarea name="keywords" class="coupon-key-words-field" cols="93" rows="5" onkeypress="textCounter(this,this.form.counter,250);" value="Enter search terms that are relevant to your coupon"></textarea>
					</div>
                                      <script type="text/javascript"/>
                                            function textCounter( field, countfield, maxlimit ) {
                                              if ( field.value.length > maxlimit )
                                              {
                                                field.value = field.value.substring( 0, maxlimit );
                                                alert( 'There is a 250 characters in length limit to the Search Tags you may use.' );
                                                return false;
                                              }
                                              else
                                              {
                                                countfield.value = maxlimit - field.value.length;
                                              }
                                            }
                                      </script>
                                      <p id="footnote">
                                  &nbsp;&nbsp;<strong>examples:</strong> If you are an Italian Restaurant you may list menu items such as pasta, pizza, ravioli, gnocchi...yum<br />
                                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  If you are a Spa you may list all of your services, i.e. manicure, pedicure, facial, waxing...ouch!
                                  </p>
                                  </div> 
                                   <div class="next-step-button next-step7"><a href="" id="open7">Next Step</a></div>
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="step-7"><span class="cc-step-title"><strong>7:</strong>Select Featured Coupon Ad Options</span>
				<span class="error" id="err-step-7"></span></h3>
                        <div class="acc-section" id="faRadio">
                            <div class="acc-content">
                                <p><span class="step-copy">Would you like to create an Ad representing this coupon that will appear at the top of the results page when customer search words or phrases realted to your coupon?</span></p>
                        <br clear="all"/><br clear="all"/>
                          <div style="width:700px; overflow:hidden;">
                      
                      <div style="width:150px; height:auto; float:left; margin-right:15px; overflow:hidden;">
                          <span>
                          <input type="radio" name="featuredAd" value="0" class="required no-ad-radio"  id="step8-no" style="border:none;"/> 
                          <label for="step8-no"><span class="step-copy">No, Thanks</span></label>
                          </span>
                          <br clear="all"/>
                          <span>
                          <input type="radio" name="featuredAd" value="1" class="required yes-ad-radio"  id="step8-yes" style="border:none;"/> 
                          <label for="step8-yes"><span class="step-copy">Yes, Please</span></label>
                          </span>
              	</div>
                      

             	 <div class="toHide" style="float:left;" id="adblk-0"></div> 
                       
                       <span><!--Start hidden section-->
                                              
                       <div  style="width:250px; float:left;">
                           <span>
                           	   <span class="ad-seclected-show">
                                   <input type="checkbox" class="required large-ad-ckbx" name="large_ad" value="" id="foo" />
                                   <span class="step-copy">Large, Search-Based Ad</span><br />
                                   <span class="step-copy" style="margin-top:2px;">Cost: $5 per sale from Ad</span><br />
                               </span>
                            <div style="float:left; width:125px; margin:8px 4px 0px 25px;"><img src="images/large-ad-thumb.jpg"/></div>
                               <div style="float:left; margin:8px 0px 0px 0px;">
                               <a href="#large-ad-example" class="fancybox" >larger ad<br/>example</a><br /><br />
                               <a href="#large-ad-info" class="fancybox" >more info</a>
                               </div>
                               <br clear="all"/>
                               <div style="display:none; height:40px; margin:6px 0px 0px 24px;" id="checked-a" >
                                   <span class="step-field-title-box">Max Budget: $&nbsp;</span><input type="number" name="budget_large_ad" id="budget_large" class="required ad-budget-field" placeholder="0.00" style="width:60px;"/>
                               </div>
                          </span>
                          <br clear="all"/>
                      </div>
                        <div  style="width:250px; float:left;">
                                <span>
                                	<span class="ad-seclected-show">
                                       <input type="checkbox" class="side-ad-ckbx" name="side_ad" value="" id="foo2"/>
                                       <span class="step-copy">Side, Location-Based Ad</span><br />
                                       <span class="step-copy" style="margin-top:2px;">Cost: $3 per sale from Ad<br /></span>
                                    </span>
                                   <div style="float:left; width:125px; margin:8px 4px 0px 25px;"><img src="images/side-ad-thumb.jpg"/></div>
                                       <div style="float:left; ; margin:8px 0px 0px 0px;">
                                       <a href="#side-ad-example" class="fancybox" >side ad<br/>example</a><br /><br />
                                       <a href="#side-ad-info" class="fancybox" >more info</a>
                                       </div>
                                        <br clear="all"/>
                                       <div style="display:none; height:40px; margin:6px 0px 0px 24px;" id="checked-b" >
                                           <span class="step-field-title-box">Max Budget: $&nbsp;</span><input type="number" name="budget_side_ad" id="budget_side" class="required ad-budget-field" placeholder="0.00" style="width:60px;"/>
                                       </div>
                                  </span>
                                  <br clear="all"/>
                           </div>	
     						 </span><!--END hidden section-->
                           <br clear="all"/>
                           </div>
                           <div class="next-step-button next-step8"><a href="" id="open8">Next Step</a></div>
                           </div>
                  </div>
           </li>
                    
            <li>
                        <h3 id="publish"><span class="cc-step-title"><strong>Publish</strong></span>
				<span class="error" id="err-publish"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <div id="payment-left-column">
                                
                            </div>
                            
                            <div id="payment-right-column">
                               
                                
					<div id="promo-hide-coup">

<?php
       $qry = mysql_query("SELECT * FROM CouZoo_Cards WHERE payer_id = '$id_user'");
	$total_cc = mysql_num_rows($qry);
	if ($total_cc) {
?>
               <div id="cart-check-out-table-header" class="card-headers">
		     <div class="card-name">Saved Cards</div>
                   <div class="card-type">Card Type</div>
                   <div class="card-number">Card Number</div>
               </div><!--end table header-->
<?php
	} while ($cc = mysql_fetch_array($qry)) {
		if ($cc['type'] == 'amex') { $cc_type = "American Express"; } else { $cc_type = ucfirst($cc['type']); }
?>
               <div id="cart-check-out-table-row" class="<?=$cc['id']?>">
		     <input type="radio" id="cc_id" name="cc_id" value="<?=$cc['id']?>">
                   <div class="card-name"><?=$cc['fname']?> <?=$cc['lname']?></div>
                   <div class="card-type"><?=$cc_type?></div>
                   <div class="card-number"><?=$cc['number']?></div>
		     <div id="<?=$cc['id']?>" class="card-delete"><img src="/images/red-x.png" width="15"></img></div>
               </div><!--end table header-->
<?php } ?>

   <div id="payment-left-column">
             <p id="no-card-added" class="step-copy" style="margin-bottom:10px; <?=$total_cc > 0 ? "display: none;" : "";?>">
                You have not yet entered a credit card to be used with your CouZoo Merchant Account. There is a $25 per month subscription fee, which allows you to create and post as many coupons as you wish to CouZoo.com. You may cancel at any time.
             </p>
             <a href="#add-card" id="card-text" class="fancybox change" style="font-size:14px;"><?=!$total_cc ? "Add a Credit Card" : "Add Another Credit Card";?></a>  &nbsp; |  &nbsp; <a href="javascript:;" style="font-size:14px;" onmousedown="slidedown('payment-right-column-coupon');">Use a Promo Code</a>
        </div>

    <div id="payment-right-column-coupon" style="display:none; overflow:hidden; height:128px; width:100%;">
        <br clear="all"/>
        <div style="margin:10px 0px 0px 0px; color:#603912; float:left;" id="payblk-2">
             <div style="width:200px; ">
                <div id="advancedCall2">
                    <form>
                        <input id="promo-code-coupon" type="text" value="promo code" style="width:168px; margin-top:-20px; padding-left:0px; text-align:center;" />
                    </form>
                </div>
             </div>
             <div style="width:200px; margin:2px 0px 8px 0px;"><div id="coupon" class="apply-promo-btn"></div></div>
             <div style="width:168px; text-align:center;">
                <a href="javascript:;" style="font-size:12px;" onmousedown="slideup('payment-right-column-coupon');">I don't have a promo code</a>
             </div>
        </div>
        
        <div style="margin:10px 0px; float:left; width:400px;">
             <p id="promo-msg-coupon" class="step-copy" style="color:#f26625"></p>  
        </div>
     </div>

<?php if ($total_cc > 0) { ?>
	<div id="sub-renew-info">    
        	<br clear="all"/>
        	<p class="step-copy" style="margin:10px 0px 10px 0px">
            		You are subscribed with the selected credit card above to create unlimited coupons.<br/> 
            		Would you like to auto-renew at the end of each billing period?</p>
        	<br clear="all"/>
        	<form>
            		<input type="radio" name="customer-subscribe-auto-renew" value="yes" CHECKED  />&nbsp;yes  &nbsp;&nbsp;&nbsp;
            		<input type="radio" name="customer-subscribe-auto-renew" value="no" />&nbsp;no
        	</form>
	</div>
<?php } ?>

					</div>
                            
                            </div>
                            <br clear="all"/>
                            
                         </div>

			<div class="submit-btn" style="float: left; margin-top: 10px"></div>
			<div id="submitStatus" style="float: left; padding: 20px">Click submit once everything has been filled out.</div>
                    </div>
                 </li>        
                </ul>
            	</form>
                </div><!--End Advanced Call-->
         </div>         
         
         
   <!--Start Auto-populate text from form fields javascript - updated/added by Pete Nov 19, 2013-->
 	<script type="text/javascript"/>     <!--Retail Price-->         
		(function() {
                var $input = $('input.apretail');
                $input.keyup(function(event) {
                     var apretailtext = $input.val();
			         $('.apretail-field').text(apretailtext);
					 console.log('apretail-field',$('.apretail-field'));
			});
		})();
	</script>
    
     <script type="text/javascript"/> <!--Sale Price -->             
		(function() {
                var $input = $('input.apsale');
                $input.keyup(function(event) {
                     var apsaletext = $input.val();
			         $('.apsale-field').text(apsaletext);
					 console.log('apsale-field',$('.apsale-field'));
			});
		})();
	</script>
    
     <script type="text/javascript"/>  <!--featured item name-->             
		(function() {
                var $input = $('input.apfeaturename');
                $input.keyup(function(event) {
                     var apfeaturenametext = $input.val();
			         $('.apfeaturename-field').text(apfeaturenametext);
					 console.log('apfeaturename-field',$('.apfeaturename-field'));
			});
		})();
	</script>    
    
    <script type="text/javascript"/> <!--dollars off, step 1-->
		(function() {
                var $input = $('input.apdollarsoff');
                $input.keyup(function(event) {
                     var apdollarsofftext = $input.val();
			         $('.apdollarsoff-field').text(apdollarsofftext);
					 console.log('apdollarsoff-field',$('.apdollarsoff-field'));
			});
		})();
	</script>
    
    <script type="text/javascript"/> <!--percent off, step 1-->             
		(function() {
                var $input = $('input.appercentoff');
                $input.keyup(function(event) {
                     var appercentofftext = $input.val();
			         $('.appercentoff-field').text(appercentofftext);
					 console.log('appercentoff-field',$('.appercentoff-field'));
			});
		})();
	</script>
    
    
	<script type="text/javascript"/> <!--dollars off, step 1-->
		(function() {
                var $input = $('input.apdollarsofftotal');
                $input.keyup(function(event) {
                     var apdollarsofftotaltext = $input.val();
			         $('.apdollarsofftotal-field').text(apdollarsofftotaltext);
					 console.log('apdollarsofftotal-field',$('.apdollarsofftotal-field'));
			});
		})();
	</script>
    
    <script type="text/javascript"/> <!--percent off, step 1-->             
		(function() {
                var $input = $('input.appercentofftotal');
                $input.keyup(function(event) {
                     var appercentofftotaltext = $input.val();
			         $('.appercentofftotal-field').text(appercentofftotaltext);
					 console.log('appercentofftotal-field',$('.appercentofftotal-field'));
			});
		})();
	</script>
    
    <script type="text/javascript"/> <!--minimum purchase amount, percent off section, step 1-->             
		(function() {
                var $input = $('input.apminpurch');
                $input.keyup(function(event) {
                     var apminpurchtext = $input.val();
			         $('.apminpurch-field').text(apminpurchtext);
					 console.log('apminpurch-field',$('.apminpurch-field'));
			});
		})();
	</script>
    <script type="text/javascript"/><!--scroll to CAC on click-->
		$('.tab-2x3').click(function(){
			$('html, body').animate({
				scrollTop: $( $(this).attr('href') ).offset().top+110
			}, 1800);
			return false;
		})
	</script>
     <!--END Auto-populate text from form fields javascript - updated/added by Pete Nov 19, 2013-->
    
      <!--Show/Hide Div check box-->
        <script>
        $("#foo").change(function(){
           var ischecked=$(this).is(':checked');
            if(ischecked)
            {
                 $("#checked-a").fadeIn(200);
            }
            else
            {
                $("#checked-a").fadeOut(200);   
             }
         });
                         
        
        $(function(){
            var ischecked=$("#foo").is(':checked');
           if(ischecked)
           {
               $("#checked-a").fadeIn(200);
           }
            else
            {
                $("#checked-a").fadeOut(200);   
             }
        });
		
		        $("#foo2").change(function(){
           var ischecked=$(this).is(':checked');
            if(ischecked)
            {
                 $("#checked-b").fadeIn(200);
            }
            else
            {
                $("#checked-b").fadeOut(200);   
             }
         });
		 
		 $(document).ready(function(){
			$(".no-ad-radio").click(function(){
				$("#checked-a").hide('slow');
				$("#checked-b").hide('slow');
				$(".ad-seclected-show").hide('slow');
				$("#budget_large").val('');
				$("#budget_side").val('');
				$("#foo").attr('checked', false);
				$("#foo2").attr('checked', false);
			});
		});
		$(document).ready(function(){
			$(".yes-ad-radio").click(function(){
				$(".ad-seclected-show").show('slow');
			});
		});
        
        $(function(){
            var ischecked=$("#foo2").is(':checked');
           if(ischecked)
           {
               $("#checked-b").fadeIn(200);
           }
            else
            {
                $("#checked-b").fadeOut(200);   
             }
        });
        </script>  
        
       <!-- IF no Ad is clicked clear YEs Ad values-->
        <script type="text/javascript"> 
		
		</script>
       

<script type="text/javascript">
$(document).ready(function(){
        $("#open2").mousedown(function(){
			$("#step-2").click();
		});   
		$("#open3").mousedown(function(){
			$("#step-3").click();
		});
		$("#open4").mousedown(function(){
			$("#step-4").click();
		});   
		$("#open5").mousedown(function(){
			$("#step-5").click();
		});
		$("#open6").mousedown(function(){
			$("#step-6").click();
		});   
		$("#open7").mousedown(function(){
			$("#step-7").click();
		});
		$("#open8").mousedown(function(){
			$("#publish").click();
		});
		
		$(".title-option").click(function(){
            $(".next-step2").show('slow');
        });
		/*$(".select-image-btn").click(function(){
            $(".next-step3").show('slow');
        })*/
		$(".coupon-description-field").keyup(function() {
		setTimeout(func, 1500);
			function func() {
				$(".next-step4").show('slow');
			}
		});
		$(".exp-date-radio").click(function(){
            $(".next-step5").show('slow');
        });
		$(".coupon-restrictions-field").keyup(function() {
		setTimeout(func, 1500);
			function func() {
				$(".next-step6").show('slow');
			}
		});
		$(".coupon-key-words-field").keyup(function() {
		setTimeout(func, 1500);
			function func() {
				$(".next-step7").show('slow');
			}
		});
		$(".no-ad-radio").click(function(){
            $(".next-step8").show('slow');
        })
		$(".yes-ad-radio").click(function(){
            $(".next-step8").hide('slow');
        })
		$(".ad-budget-field").keyup(function() {
		setTimeout(func, 400);
			function func() {
				$(".next-step8").show('slow');
			}
		});
	});
</script>






<script type="text/javascript">

// -- Step 1 Functions -- //
	$('.step-1-change').bind('change keypress',function() {
    		$('#step-1').data('completed', false);
		$('#err-step-1').html('**Please select a final title for your coupon');
		$('input:radio[name="title_format"]').attr('checked', false);
	});

	$('input:radio[name="title_format"]').change(function() {
	var type = $('input:radio[name="coupontype"]:checked').val();
	var featured_item = $('#featured-item').val();
	var retail_price = $('#retail-price').val();
	var minimum_purchase = $('#minimum-purchase').val();
	var format = $('input:radio[name="title_format"]');
	var p_id = $(this).val();
	var title = $("#p-" + p_id).text();
    	$('#step-1').data('completed', false);
		if (type == 0) {
		    if(featured_item.length < 1 || featured_item == "Enter Product or Service Featured") {
         		$('#err-step-1').html('**Please enter the product or service featured');
		    } else if(retail_price < 1) {
			$('#err-step-1').html('**Please enter the retail value of your product or service');
		    } else if(!$(format).is(':checked')) {
			$('#err-step-1').html('**Please select a final title for your coupon');
		    } else {
			$('#err-step-1').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-1').data('completed', true);
			$('#title_final').val(title);
		    }
		} else {
		    if(minimum_purchase < 1) {
         		$('#err-step-1').html('**Please enter the minimum purchase');
		    } else if(!$(format).is(':checked')) {
			$('#err-step-1').html('**Please select a final title for your coupon');
		    } else {
			$('#err-step-1').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-1').data('completed', true);
			$('#title_final').val(title);
		    }
		}
	});

	$('.percent-off').keyup(function(e) {
    		var $this = $(this);
    		var val = $this.val();
    		if (val > 100){
        		e.preventDefault();
       		$this.val(100);
    		}
	});


// -- Step 2 Functions -- //
	$('#step-2').one("click", function() {
       	$('#err-step-2').html('**Please select a coupon image');
	});

	function readImg(input) {
    	    if (input.files && input.files[0]) {
		$('#img-loader').fadeIn();
        	var reader = new FileReader();
        	reader.onload = function (e) {
            		$('#imgPreview').attr('src', e.target.result);
			$('#img-loader').fadeOut();
        	}
        	reader.readAsDataURL(input.files[0]);
    	    }
	}

	$("#uploadImg").change(function(){
    		readImg(this);
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    		   	$('#imgPreview').attr('src','');
       		$('#err-step-2').html('**Invalid image format!');
			$('#step-2').data('completed', false);
			$('#img_type').val("");
		} else {
         		$('#err-step-2').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
            		$("#rmImg").show("fast");
			$('#step-2').data('completed', true);
		}
		$('#img_type').val("uploaded");
	});

	var profImg = "<?=$prof_img?>?<?=$last_update?>";
	$('.use-profile-pic').click(function() {
        	$('#imgPreview').attr('src','uploads/merchants/' + profImg);
         	$('#err-step-2').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
            	$("#rmImg").show("fast");
		$('#step-2').data('completed', true);
		$('#img_type').val("prof");
	});

	$('.reuse-img').click(function() {
		$.fancybox.close();
     		var c_id = $(this).attr('id');
        	$('#imgPreview').attr('src','uploads/coupons/' + c_id + '.jpg');
         	$('#err-step-2').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
            	$("#rmImg").show("fast");
		$('#step-2').data('completed', true);
		$('#img_type').val("reuse");
		$('#reuse_id').val(c_id);
	});

	$('#rmImg').click(function() {
        	$('#imgPreview').attr('src','');
       	$('#err-step-2').html('**Please select a coupon image');
            	$("#rmImg").fadeToggle();
		$('#step-2').data('completed', false);
		$('#img_type').val("");
	});



// -- Step 3 Functions -- //
	$('#step-3').one("click", function() {
       	$('#err-step-3').html('**Please give your coupon a description');
	});

	$('#description textarea').keyup(function() {
    	$('#step-3').data('completed', false);
		if($('#description textarea').val() < 1) {
         		$('#err-step-3').html('**Please give your coupon a description');
		} else {
         		$('#err-step-3').html('<img class="checkmark" src="images/green-check.png" width="30" height="25">');
    			$('#step-3').data('completed', true);
		}
	});


// -- Step 4 Functions -- //
	$('#step-4').one("click", function() {
       	$('#err-step-4').html('**Please select all the date ranges');
	});

	$('#maxpurchchbx, #maxPurchases_num').bind('change keyup', function() {
	var maxNum = $('#maxPurchases_num').val();
	var runDates = $('input[name="run-dates"]:checked').val()
	var expDate = $('input[name="exp-date"]:checked').val()
    	$('#step-4').data('completed', false);
		if($('#maxpurchchbx').is(':checked') && maxNum.length < 1) {
       		$('#err-step-4').html('**Max. purchases is empty');
		} else if(!runDates) {
       	    	$('#err-step-4').html('**Please select the run time for your coupon');
		} else if(runDates == 'custom' && !$('#posting_date').datepicker('getDate')) {
       		$('#err-step-4').html('**Please select a starting date');
		} else if(runDates == 'custom' && !$('#removal_date').datepicker('getDate')) {
			$('#err-step-4').html('**Please select an ending date');
		} else if(!expDate) {
       	    	$('#err-step-4').html('**Please select an expiration date');
		} else if(expDate == 'custom' && !$('#valid_date').datepicker('getDate')) {
       	     	$('#err-step-4').html('**Please select when the coupon becomes valid');
		} else if(expDate == 'custom' && !$('#exp_date').datepicker('getDate')) {
			$('#err-step-4').html('**Please tell us when the coupon needs to be used by');
		} else {
 			$('#err-step-4').html('<img class="checkmark" src="images/green-check.png" width=28 height=23>');
    			$('#step-4').data('completed', true);
		}
	});

	$('input[name="run-dates"], input[name="exp-date"]').bind('change', function() {
	var maxNum = $('#maxPurchases_num').val();
	var runDates = $('input[name="run-dates"]:checked').val()
	var expDate = $('input[name="exp-date"]:checked').val()
    	$('#step-4').data('completed', false);
		if($('#maxpurchchbx').is(':checked') && maxNum.length < 1) {
       		$('#err-step-4').html('**Max. purchases is empty');
		} else if(!runDates) {
       	    	$('#err-step-4').html('**Please select the run time for your coupon');
		} else if(runDates == 'custom' && !$('#posting_date').datepicker('getDate')) {
       		$('#err-step-4').html('**Please select a starting date');
		} else if(runDates == 'custom' && !$('#removal_date').datepicker('getDate')) {
			$('#err-step-4').html('**Please select an ending date');
		} else if(!expDate) {
       	    	$('#err-step-4').html('**Please select an expiration date');
		} else if(expDate == 'custom' && !$('#valid_date').datepicker('getDate')) {
       	     	$('#err-step-4').html('**Please select when the coupon becomes valid');
		} else if(expDate == 'custom' && !$('#exp_date').datepicker('getDate')) {
			$('#err-step-4').html('**Please tell us when the coupon needs to be used by');
		} else {
 			$('#err-step-4').html('<img class="checkmark" src="images/green-check.png" width=28 height=23>');
    			$('#step-4').data('completed', true);
		}

	});


// -- Step 5 Functions -- //
	$('#step-5').one("click", function() {
       	$('#err-step-5').html('**Please set some coupon restrictions');
	});

	$('#restrictions textarea').keyup(function() {
    	$('#step-5').data('completed', false);
		if($('#restrictions textarea').val() < 1) {
         		$('#err-step-5').html('**Please set some coupon restrictions');
		} else {
         		$('#err-step-5').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-5').data('completed', true);
		}
	});


// -- Step 6 Functions -- //
	$('#step-6').one("click", function() {
       	$('#err-step-6').html("**Please enter some search keywords");
	});

	$('#keywords textarea').keyup(function() {
    	$('#step-6').data('completed', false);
		if($('#keywords textarea').val() < 1) {
         		$('#err-step-6').html('**Please give your coupon a description');
		} else {
         		$('#err-step-6').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		    	$('#step-6').data('completed', true);
		}
	});


// -- Step 7 Functions -- //
	$('#step-7').one("click", function() {
       	$('#err-step-7').html("Would you like to run an ad?");
	});

	$('#faRadio input').bind('change keyup', function() {
    	$('#step-7').data('completed', false);
	var fAd = $('input[name="featuredAd"]:checked').val()
	var lAd = $('input[name="large_ad"]').is(':checked')
	var sAd = $('input[name="side_ad"]').is(':checked')
		if(fAd == 1) {
			if(lAd == 1 && !$('#budget_large').val()) {
       			$('#err-step-7').html('**Please enter your large ad budget');
			} else if (sAd == 1 && !$('#budget_side').val()) {
       			$('#err-step-7').html('**Please enter your side ad budget');
			} else if (!sAd && !lAd) {
       			$('#err-step-7').html('**Please select a large ad, side ad, or both');
			} else {
 				$('#err-step-7').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		    		$('#step-7').data('completed', true);
			}
		} else {
 			$('#err-step-7').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		    	$('#step-7').data('completed', true);
		}
	});


// -- Publish Functions -- //
<?php if ($promo_applied < 1): ?>
	$('#publish').one("click", function() {
       	$('#err-publish').html("**Please select how you would like to be billed");
	});

	$('#payment-right-column input').change(function() {
	var payRadio = $('input[name="paymentForm"]:checked').val()
	$('#publish').data('completed', false);
		if(payRadio.length > 0) {
 			$('#err-publish').html('<font color="green">Click to confirm ad</font>');
		    	$('#publish').data('completed', true);
		} else {
       		$('#err-publish').html('**Please select how you would like to be billed');
		}
	});
<?php else: ?>
	$('#publish').one("click", function() {
		$('#publish').data('completed', true);
	});
<?php endif; ?>

$('.submit-btn').click(function() {
$('#submitStatus').fadeIn(250).css('color', '#f26625').html('One moment..');
var success = true;
   for (var n = 1; n < 8; n++) {
	if(success == true && !$('#step-' + n).data('completed')) {
		var success = false;
		var err = n;
	}
   }

  if(success == false) {
  	$('#submitStatus').fadeIn(250).css('color', '#ff464a').html("Step " + err + " hasn't been fully completed. Please complete it before moving on!");
  } else if(!$('#publish').data('completed')) {
  	$('#submitStatus').fadeIn(250).css('color', '#ff464a').html("Please select a billing method.");
  } else {
       $('#submitStatus').fadeIn(250).css('color', 'green').html('Coupon created! Redirecting now..');
	$("#form1").submit();
   }
    return false;
});

	</script>
  
    </div>

</div>