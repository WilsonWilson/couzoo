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
                        <h3 id="step-1"><span class="cc-step-title"><strong>1:</strong>Select Coupon Category</span>
				<span class="error" id="err-step-1"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                               <p><span class="step-copy">What is the category or industry your coupon represents?</span></p>
                               
                                <!--Start Checkbox options-->
                               
                        <br clear="all"/>
                        <br clear="all"/>

                        <div id="customer-pref-container">
                           
                            <div id="customer-pref-column-two">
                                    <div id="catagory-top">
						<div id='checkAll_1'>
                                        <div id="catagory-title">
                                        <span class="check-all-title" name='checkall'><h1>Food & Drink</h1></span>
                                        </div>               
                                        <div id="check-all"><span class="check-all-btn" name='checkall'>all</span></div>
					   	</div>
                                    </div><!--END catagory top-->
                                	<br clear="all"/>
                                    <div class="catagory-box" id="cat_1">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Restauants">&nbsp;<label>Restauants</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Bar">&nbsp;<label>Bars & Nightlife</label></div>
                                    </div>
                            
                                    <div id="catagory-top">
						<div id='checkAll_2'>
                                        <div id="catagory-title">
                                        <span class="check-all-title" name='checkall'><h1>Beauty</h1></span>
                                        </div>               
                                        <div id="check-all"><span class="check-all-btn" name='checkall'>all</span></div>
						</div>
                                    </div><!--END catagory top-->
                                    <br clear="all"/>
                                    <div class="catagory-box" id="cat_2">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Massage">&nbsp;<label>Massage</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Facial">&nbsp;<label>Facial</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="NailCare">&nbsp;<label>Nail Care</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Tanning">&nbsp;<label>Tanning</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Hair">&nbsp;<label>Hair</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Waxing">&nbsp;<label>Waxing</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Spa">&nbsp;<label>Spa</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="TeethWhitening">&nbsp;<label>Teeth Whitening</label></div>
                                    </div>
                                
                                    <div id="catagory-top">
						<div id='checkAll_3'>
                                        <div id="catagory-title">
                                        <span class="check-all-title" name='checkall'><h1>Fitness</h1></span>
                                        </div>               
                                        <div id="check-all"><span class="check-all-btn" name='checkall'>all</span></div>
						</div>
                                    </div><!--END catagory top-->
                                    <br clear="all"/>
                                    <div class="catagory-box" id="cat_3">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Yoga">&nbsp;<label>Yoga & Pilates</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Gym">&nbsp;<label>Gym</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="BootCamp">&nbsp;<label>Boot Camp</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="MartialArts">&nbsp;<label>Martial Arts</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Classes">&nbsp;<label>Classes</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="PersonalTraining">&nbsp;<label>Personal Training</label></div>
                                    </div>
                                
                            </div><!--END Column One-->
                    
                    
                            <div id="customer-pref-column-two">
                               
                                <div id="catagory-top">
						<div id='checkAll_4'>
                                    <div id="catagory-title">
                                    <span class="check-all-title" name='checkall'><h1>Medical</h1></span>
                                    </div>               
                                    <div id="check-all"><span class="check-all-btn" name='checkall'>all</span></div>
						</div>
                                </div><!--END catagory top-->
                                <br clear="all"/>
                                <div class="catagory-box" id="cat_4">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Vision">&nbsp;<label>Vision & Eye Care</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Dental">&nbsp;<label>Dental</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Chiropractor">&nbsp;<label>Chiropractor</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="SkinCare">&nbsp;<label>Skin Care</label></div>
                                </div>
                            
                                    <div id="catagory-top">
						<div id='checkAll_5'>
                                        <div id="catagory-title">
                                        <span class="check-all-title" name='checkall'><h1>Activities</h1></span>
                                        </div>               
                                        <div id="check-all"><span class="check-all-btn" name='checkall'>all</span></div>
						</div>
                                    </div><!--END catagory top-->
                                        <br clear="all"/>
                                    <div class="catagory-box" id="cat_5">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Museums">&nbsp;<label>Museums</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="WineTasting">&nbsp;<label>Wine Tasting</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Tours">&nbsp;<label>Tours</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="ComedyClubs">&nbsp;<label>Comedy Clubs</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Shows">&nbsp;<label>Shows</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="LifeSkill">&nbsp;<label>Life Skill Classes</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Golf">&nbsp;<label>Golf</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Bowling">&nbsp;<label>Bowling</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="SkyDiving">&nbsp;<label>Sky Diving</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="OutdoorAdventure">&nbsp;<label>Outdoor Adventure</label></div>
                                    </div>                            
                                       
                            </div><!--END Column Two-->
                        
                            <div id="customer-pref-column-two">
                                                         
                                 <div id="catagory-top">
						<div id='checkAll_6'>
                                      <div id="catagory-title">
                                      <span class="check-all-title" name='checkall'><h1>Retail & Services</h1></span>
                                      </div>               
                                    <div id="check-all"><span class="check-all-btn" name='checkall'>all</span></div>
						</div>
                                 </div><!--END catagory top-->
                                   <br clear="all"/>
                                <div class="catagory-box" id="cat_6">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Home Services">&nbsp;<label>Home Services</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Clothing">&nbsp;<label>Clothing</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Automotive">&nbsp;<label>Automotive</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Photography">&nbsp;<label>Photography</label></div>
                                </div>
                            
						<div id='checkAll_7'>
                                <div id="catagory-title">
                                     <span class="check-all-title" name='checkall'><h1>Other</h1></span>
                                </div>               
                                <div id="check-all"><span class="check-all-btn" name='checkall'>all</span></div>
						</div>
                                     <br clear="all"/>
                                <div class="catagory-box" id="cat_7">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Wedding">&nbsp;<label>Wedding</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Pregnancy">&nbsp;<label>Pregnancy</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Baby">&nbsp;<label>Baby</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Children">&nbsp;<label>Children</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Gay">&nbsp;<label>Gay</label></div>
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="Travel">&nbsp;<label>Travel</label></div>
                                </div>
                            
                                <div class="catagory-box">
                                      <div class="check-box-md"><input type="checkbox" name="category[]" id="cat" value="EverythingElse">&nbsp;<label>Everything Else</label></div>
                                </div>
                            </div><!--END Column Three-->
             			    <br clear="all"/> 
						</div><!--END customer-pref-container-->
                               
                               <!--End Checkbox options--> 
                              
                            </div>
                        </div>
                    </li>     
       

                    <li>
                        <h3 id="step-2"><span class="cc-step-title"><strong>2:</strong>Set Coupon Sale Value</span><a href="#help-step1" class="fancybox help-icon" >[&nbsp;?&nbsp;]</a>
				<span class="error" id="err-step-2"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <p><span class="step-copy">What is the original retail price and sale price with this coupon of the produact or service being featured in this coupon?</span></p>
                              <br clear="all"/><br clear="all"/>
                               <div style="width:600px;"><span class="step-copy">Display mark down by:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> 
                              
                               <div  style="width:160px; float:left;"><span><input type="radio" name="markDown" value="1" class="required"  id="step1-dollars" style="border:none;"/> <label for="step1-dollars"><span class="step-copy">Dollars off ($)</span></label></span></div>
                               
                               <div  style="width:160px; float:left;"><span><input type="radio" name="markDown" value="2" class="required"  id="step1-percent" style="border:none;"/> <label for="step1-percent"><span class="step-copy">Percent off (%)</span></label></span></div>
                               </div>
                              
                                <br clear="all"/>
                                
                                <div style="height:auto;">
                                
                                <!--Start Dollar amount section-->
                                <div class="toHide" style="display:none; float:left; margin:0px 0px;" id="blk-1">
                                <p class="step-copy">
                                
                                <div style="width:260px; float:left; margin-right:20px;">
                                <span class="step-field-title-box">Retail Value: $&nbsp;</span><input type="text" name="retail_price" id="retail-price" class="required apretail" value="" style="width:80px;"/>
                                </div>
                                
                                <div style="width:260px; float:left;">
                                <span class="step-field-title-box">Price with Coupon: $&nbsp;</span><input type="text" name="sale_price" id="sale-price" class="required apsale"  value="" style="width:80px; margin-left:1px;"/>
                                </div>
                                
                                </p>
                                </div>
                                <!--End Dollar amount section-->
                                
                                <!--Start Percent amount section-->
                                <div class="toHide" style="display:none; float:left; margin:0px 0px;" id="blk-2">
                                <p class="step-copy">
                                
                                <div style="width:260px; float:left; margin-right:20px;">
                                <span class="step-field-title-box">Percent Off: &nbsp;</span><input type="number" name="percent_off" id="percent-off" class="required appercentoff" value="" style="width:80px;"/>&nbsp;<font color="#603912">%</font>
                                </div>
                                
                                <div style="width:320px; float:left;">        
                                <span class="step-field-title-box">Minimum Purchase: $&nbsp;</span><input type="number" name="min_purchase" id="minimum-purchase" class="required apminpurch" value="" style="width:80px; margin-left:1px;"/>
                                </div>
                                
                                </p>
                                </div>
                                <!--End Percent amount section-->        
                                
                              </div>
                              <br clear="all"/>
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="step-3"><span class="cc-step-title"><strong>3:</strong>Create Coupon Title</span>
				<span class="error" id="err-step-3"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <p><span class="step-copy">What is the product or service being featured in this coupon?</span></p>
        <br clear="all"/><br clear="all"/>
        <input type="text" name="featured_item" id="featured-item" class="required apfeaturename"  value="Enter Product or Service Featured" maxlength="35" style="width:696px; margin-left:3px;"/>
        
        <p id="footnote">&nbsp;&nbsp;<strong>examples:</strong> "lunch and a drink" , "a hair coloring" , "purchase at Joe's Store" , "an oil change", "a message" , "a mani pedi" </p>

        <div id="select-title-format">Select Title Format</div>
	 <input type="hidden" name="id_user" value="<?=$id_user?>">
	 <input type="hidden" name="bname" value="<?=$bname?>">

        <div class="step-3-dollars toHide" style="display:none;" id="blk-b-1">
        <input type="radio" class="required" value="style1" id="step-2-dollars-op1" name="title_format" /> <label for="step-2-dollars-op1"><p class="step-copy step-3-copy">$<span class="apsale-field autopop-pricing-copy"></span> for <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?> Name (Regularly $<span class="apretail-field autopop-pricing-copy"></span>)</p></label>
        <br clear="all"/>
        <input type="radio" class="required" value="style2" id="step-2-dollars-op2" name="title_format" /> <label for="step-2-dollars-op2"><p class="step-copy step-3-copy">$<span class="apsale-field autopop-pricing-copy"></span> for a $<span class="apretail-field autopop-pricing-copy"></span> <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?></p></label>
        <br clear="all"/>
        <input type="radio" class="required" value="style3" id="step-2-dollars-op3" name="title_format" /> <label for="step-2-dollars-op3"><p class="step-copy step-3-copy">$<span class="apsale-field autopop-pricing-copy"></span> for $<span class="apretail-field autopop-pricing-copy"></span> worth of <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?></p></label>
        </div>
        
        <div class="step-3-dollars toHide" style="display:none;" id="blk-b-2">
        <input type="radio" class="required" value="style1" id="step-2-percent-op1" name="title_format" /> <label for="step-2-percent-op1"><p class="step-copy step-3-copy"><span class="appercentoff-field autopop-pricing-copy"></span>% off $<span class="apminpurch-field autopop-pricing-copy"></span> or more at <?=$bname?></p></label>
        <br clear="all"/>
        <input type="radio" class="required" value="style2" id="step-2-percent-op2" name="title_format" /> <label for="step-2-percent-op2"><p class="step-copy step-3-copy"><span class="appercentoff-field autopop-pricing-copy"></span>% off <span class="apfeaturename-field autopop-pricing-copy"></span> when you spend $<span class="apminpurch-field autopop-pricing-copy"></span> or more at <?=$bname?></p></label>
        <br clear="all"/>
        <input type="radio" class="required" value="style3" id="step-2-percent-op3" name="title_format" /> <label for="step-2-percent-op3"><p class="step-copy step-3-copy">Spend $<span class="apminpurch-field autopop-pricing-copy"></span> on <span class="apfeaturename-field autopop-pricing-copy"></span> at <?=$bname?> and get <span class="appercentoff-field autopop-pricing-copy"></span>% off</p></label>
        </div>
        
        <br clear="all"/>
                            </div>
                        </div>
                    </li>
                   
                    <li>
                       <h3 id="step-4"><span class="cc-step-title"><strong>4:</strong>Select Coupon Image</span>
				<span class="error" id="err-step-4"></span></h3>
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

						  <input type="hidden" id="img_type" name="img_type">
						  <input type="hidden" id="reuse_id" name="reuse_id">

						  <div class="upload-image"><input type="file" name="coupon_img" id="uploadImg" /></div>
                                            <div class="use-profile-pic"></div>
                                            <a href="#reuse-img" class="fancybox"><div class="reuse-image"></div></a>
						  <div id="rmImg" style="display: none; cursor: pointer; width: 100%"><font color="red">Remove current image</font></div>
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
                        <h3 id="step-5"><span class="cc-step-title"><strong>5:</strong>Create Coupon Description</span>
				<span class="error" id="err-step-5"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <p><span class="step-copy">Describe the product or service in which this coupon is featuring. </span></p>
                                   <br clear="all"/><br clear="all"/>
                                   
                                   <div>
                            
                                    <font style="font-weight:bold; color:#f26625">*425 character max.  &nbsp; &nbsp; 
                                    *Sepatare words or phrases with with commas</font> </span>
					<div id="description">
                                      <textarea name="description" cols="93" rows="5" onkeypress="textCounterDesc(this,this.form.counter,425);" value="Enter a description of the product or service featured in this coupon"></textarea>
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
                            </div>
                        </div>
                    </li>
                    
                    
                    <li>
                        <h3 id="step-6"><span class="cc-step-title"><strong>6:</strong>Select Coupon Run Dates & Maximum Purchases</span>
				<span class="error" id="err-step-6"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <p><span class="step-copy">What date range would you like this coupon to appear on CouZoo.com and what is the maximum number total purchases (if any) you would like to allow for this coupon?</span><br clear="all"/><br clear="all"/></p>
                                	
					<input type="hidden" id="posting_date_formatted" name="posting_date_formatted" class="required">
					<input type="hidden" id="removal_date_formatted" name="removal_date_formatted" class="required">

                			<div style="width:310px; height:100px; float:left; margin:0px 30px 0px 0px; padding:0px 20px 0px 0px;">
                                          <span class="step-field-title-box" style="width:120px;">Posting Date*&nbsp;:</span><input type="text" id="posting_date" name="posting_date" class="required" placeholder="click to select" style="width:150px;"/>
                                          <br clear="all"/>
                                          <span class="step-field-title-box" style="width:120px;">Removal Date**&nbsp;:</span><input type="text" id="removal_date" name="removal_date" class="required" placeholder="3-month max" style="width:150px;"/>
                                  	</div>
                                      
                                      <div style="width:340px; height:140px; float:left;">
                                         
                                         <br clear="all"/>
                                         
                                         <div style="margin:0px 0px 0px 0px;">
                                            <input type="checkbox" name="maxPurchases" id="maxPurchases" value="1"><label for="remove-sales">enable max purchases</label>
                                         </div>
                                         
                                         <br clear="all"/>
                                
                                          <div class="toHide" style="display:none; float:left; margin:0px 0px;" id="paymaxp-1">
                                                <div style="width:320px; height:40px; margin-top:20px;"><span class="step-field-title-box">Max. Purchases***&nbsp;:&nbsp;</span><input type="number" name="maxPurchases_num" id="maxPurchases_num" placeholder="10,000" style="width:80px;" /></div>
                                          </div>
                                          
                                       </div>   
                                    <br clear="all"/>
                                      <p id="footnote">
                                      *Date this coupon will start to appear on CouZoo.com<br/>
                                      **Date this coupon will no longer appear on CouZoo.com<br/>
                                      ***Coupon will be removed from CouZoo after this many purchases.
                                      </p>
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="step-7"><span class="cc-step-title"><strong>7:</strong>Select Coupon Valid Dates</span>
				<span class="error" id="err-step-7"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                               <p><span class="step-copy">What date range would you like your coupon to be valid for redemption?</span></p>

					<input type="hidden" id="valid_date_formatted" name="valid_date_formatted" class="required">
					<input type="hidden" id="exp_date_formatted" name="exp_date_formatted" class="required">
                               
                               <!--Start Redemption Validity Period-->
                                <div style="float:left; margin:0px 0px;"">
                                <p class="step-copy">
                                
                                <div style="width:330px; float:left; margin-right:20px;">
                                <span class="step-field-title-box" style="padding-bottom:10px;">Coupon becomes valid on*:</span>
                                <input type="text" id="valid_date" name="valid_date" class="required" placeholder="click to select" style="width:150px; margin-left:3px;"/>
                                </div>
                                
                                <div style="width:330px; float:left;">        
                                <span class="step-field-title-box" style="padding-bottom:10px;">Coupon is no longer valid after**:</span><br />
                                <input type="text" id="exp_date" name="exp_date" class="required" placeholder="click to select" style="width:150px;"/>
                                </div>
                                
                                </p>
                                </div>
                                <!--End Redemption Validity Period-->
                                <br clear="all"/>
                              <p id="footnote">
                              *This is the date this coupon will <strong>become valid</strong> and customers may begin to redeem it at your place of business.<br/>
                              **This is the date this coupon is <strong>no longer valid</strong> and customers may no longer redeem it at your place of business.<br />
                              **May NOT be earlier than "Removal Date" in previous step.
                              </p>
                              <br clear="all"/>
                              <br clear="all"/>
                              <br clear="all"/>
                              <br clear="all"/>
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="step-8"><span class="cc-step-title"><strong>8:</strong>Create Coupon Restrictions</span>
				<span class="error" id="err-step-8"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content" id="restrictions">
                                <p><span class="step-copy">What redemption restrictions would you like to put on this coupon?</span></p>
                                   <br clear="all"/><br clear="all"/>
                                        
                                   <div>
                                      <textarea name="restrictions" cols="93" rows="9" value="Enter all coupon restrictions here"></textarea>
                                          <p id="footnote">
                                      &nbsp;&nbsp;<strong>examples:</strong> 1 per customer. Dine in only. Not valid on weekends. Cannot be combined with other offers.
                                      </p>
                                   </div>
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="step-9"><span class="cc-step-title"><strong>9:</strong>Create Search Key Words</span>
				<span class="error" id="err-step-9"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">
                                <p><span class="step-copy">What key words or phrases do you think customers interested in this coupon and your product or service may use to search?</span></p>
                                   <br clear="all"/><br clear="all"/>
                                   
                                   <div>
                            
                                    <font style="font-weight:bold; color:#f26625">*250 character max.  &nbsp; &nbsp; 
                                    *Sepatare words or phrases with with commas</font> </span>
					<div id="keywords">
                                      <textarea name="keywords" cols="93" rows="5" onkeypress="textCounter(this,this.form.counter,250);" value="Enter search terms that are relevant to your coupon"></textarea>
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
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="step-10"><span class="cc-step-title"><strong>10:</strong>Select Featured Coupon Ad Options</span>
				<span class="error" id="err-step-10"></span></h3>
                        <div class="acc-section" id="faRadio">
                            <div class="acc-content">
                                <p><span class="step-copy">Would you like to create an Ad representing this coupon that will appear at the top of the results page when customer search words or phrases realted to your coupon?</span></p>
                        <br clear="all"/><br clear="all"/>
                          <div style="width:700px; overflow:hidden;">
                      
                      <div style="width:150px; height:auto; float:left; margin-right:15px; overflow:hidden;">
                          <span>
                          <input type="radio" name="featuredAd" value="0" class="required"  id="step8-no" style="border:none;"/> 
                          <label for="step8-no"><span class="step-copy">No, Thanks</span></label>
                          </span>
                          <br clear="all"/>
                          <span>
                          <input type="radio" name="featuredAd" value="1" class="required"  id="step8-yes" style="border:none;"/> 
                          <label for="step8-yes"><span class="step-copy">Yes, Please</span></label>
                          </span>
              	</div>
                      

             	 <div class="toHide" style="float:left;" id="adblk-0"></div> 
                       
                       <span class="toHide" id="adblk-1"><!--Start hidden section-->
                                              
                       <div  style="width:250px; float:left;">
                           <span>
                               <input type="checkbox" name="large_ad" value="1" id="foo" class="required"/>
                               <span class="step-copy">Large, Search-Based Ad</span><br />
                               <span class="step-copy" style="margin-top:2px;">Cost: $5 per sale from Ad</span><br />
                            <div style="float:left; width:125px; margin:8px 4px 0px 25px;"><img src="images/large-ad-thumb.jpg"/></div>
                               <div style="float:left; margin:8px 0px 0px 0px;">
                               <a href="#large-ad-example" class="fancybox" >larger ad<br/>example</a><br /><br />
                               <a href="#large-ad-info" class="fancybox" >more info</a>
                               </div>
                               <br clear="all"/>
                               <div style="display:none; height:40px; margin:6px 0px 0px 24px;" id="checked-a" >
                                   <span class="step-field-title-box">Max Budget: $&nbsp;</span><input type="number" name="budget_large_ad" id="budget_large" class="required" placeholder="0.00" style="width:60px;"/>
                               </div>
                          </span>
                          <br clear="all"/>
                      </div>
                       
                       
                     <div  style="width:250px; float:left;">
                       	<span>
                       		   <input type="checkbox" name="side_ad" value="1" id="foo2"/>
                               <span class="step-copy">Side, Location-Based Ad</span><br />
                               <span class="step-copy" style="margin-top:2px;">Cost: $3 per sale from Ad<br /></span>
                           <div style="float:left; width:125px; margin:8px 4px 0px 25px;"><img src="images/side-ad-thumb.jpg"/></div>
                               <div style="float:left; ; margin:8px 0px 0px 0px;">
                               <a href="#side-ad-example" class="fancybox" >side ad<br/>example</a><br /><br />
                               <a href="#side-ad-info" class="fancybox" >more info</a>
                               </div>
                       			<br clear="all"/>
                               <div style="display:none; height:40px; margin:6px 0px 0px 24px;" id="checked-b" >
                                   <span class="step-field-title-box">Max Budget: $&nbsp;</span><input type="number" name="budget_side_ad" id="budget_side" class="required" placeholder="0.00" style="width:60px;"/>
                               </div>
                          </span>
                          <br clear="all"/>
                   </div>
     
                       
                      </span><!--END hidden section-->
                              
                                         
                            <br clear="all"/>
                           </div>
                           </div>
                        </div>
                    </li>
                    
                    <li>
                        <h3 id="publish"><span class="cc-step-title"><strong>Publish</strong></span>
				<span class="error" id="err-publish"></span></h3>
                        <div class="acc-section">
                            <div class="acc-content">

			<!-- Not needed
                                <div id="payment-left-column">
                                  <ul class="priceList">
                                        <li>
                                          <strong>Coupon</strong>
                                          <em>$100</em>
                                        </li>
                                        <li>
                                            <strong>Large Ad</strong>
                                            <em>$0*</em>
                                        </li>
                                        <li>
                                            <strong>Side Ad</strong>
                                            <em>$0*</em>
                                        </li>
                                        <li class="last">
                                          <strong>Order Total</strong>
                                          <em>$100</em>
                                        </li>
                                 </ul>
                                 <br clear="all"/>
                                 <div id="footnote">*Ad price is based on total number of purchase originating from the Ad. Billing for Ads will occur after Ad is finished running on COUZOO.</div>
                            </div> -->
                            
                            <div id="payment-right-column">
                                <h2>Billing Info</h2>
                                
					<div id="promo-hide-coup">

<?php
       $qry = mysql_query("SELECT * FROM CouZoo_Cards WHERE payer_id = '$id_user'");
	$total_cc = mysql_num_rows($qry);
?>
               <div id="cart-check-out-table-header" class="card-headers" style="<?=$total_cc < 1 ? "display: none;" : "";?>">
		     <div class="card-name">Saved Cards</div>
                   <div class="card-type">Card Type</div>
                   <div class="card-number">Card Number</div>
               </div><!--end table header-->
<?php
	  while ($cc = mysql_fetch_array($qry)) {
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

   <div id="new-card-holder-coupon"></div>

   <div id="payment-left-column">
             <p class="no-card-added step-copy" style="margin-bottom:10px; <?=$total_cc > 0 ? "display: none;" : "";?>">
                You have not yet entered a credit card to be used with your CouZoo Merchant Account. There is a $25 per month subscription fee, which allows you to create and post as many coupons as you wish to CouZoo.com. You may cancel at any time.
             </p>
             <a href="#add-card" class="card-text fancybox change" style="font-size:14px;"><?=!$total_cc ? "Add a Credit Card" : "Add Another Credit Card";?></a>  &nbsp; |  &nbsp; <a href="javascript:;" style="font-size:14px;" onmousedown="slidedown('payment-right-column-coupon');">Use a Promo Code</a>
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

	<div class="sub-renew-info" style="<?=$total_cc < 1 ? "display: none;" : "";?>">    
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
         
         
          <!--Start Auto-populate text from form fields javascript-->
  <script type="text/javascript"/>              
		(function() {
                var $input = $('input.apretail');
                $input.keyup(function(event) {
                     var apretailtext = $input.val();
			         $('.apretail-field').text(apretailtext);
					 console.log('apretail-field',$('.apretail-field'));
			});
		})();
	</script>
    
     <script type="text/javascript"/>              
		(function() {
                var $input = $('input.apsale');
                $input.keyup(function(event) {
                     var apsaletext = $input.val();
			         $('.apsale-field').text(apsaletext);
					 console.log('apsale-field',$('.apsale-field'));
			});
		})();
	</script>
    
     <script type="text/javascript"/>              
		(function() {
                var $input = $('input.apfeaturename');
                $input.keyup(function(event) {
                     var apfeaturenametext = $input.val();
			         $('.apfeaturename-field').text(apfeaturenametext);
					 console.log('apfeaturename-field',$('.apfeaturename-field'));
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


	<script type="text/javascript">

// -- Step 1 Functions -- //
	$('#step-1').one("click", function() {
       	$('#err-step-1').html('**Please select a title for your coupon');
	});

	$('.catagory-box').change(function() {
	var cbCheck = $('.catagory-box input:checkbox:checked').length;
    	$('#step-1').data('completed', false);
		if(cbCheck > 0) {
         		$('#err-step-1').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-1').data('completed', true);
		} else {
         		$('#err-step-1').html('**Please select a title for your coupon');
		}
	});


// -- Step 2 Functions -- //
	$('#step-2').one("click", function() {
       	$('#err-step-2').html('**Please set value');
	});

	$('#blk-1 input, #step1-dollars').change(function() {
    	$('#step-2').data('completed', false);
	var rpInput = $('#retail-price').val();
	var spInput = $('#sale-price').val();
	var title = $('#featured-item').val();
	var format = $('#blk-b-1 input:radio[name="title_format"]');
		if($('#step1-dollars').is(':checked') && rpInput.length > 0 && spInput.length > 0) {
         		$('#err-step-2').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-2').data('completed', true);
		} else {
         		$('#err-step-2').html('**Please set value');
		}

		if(title.length < 1 && $('#step-3').data('clicked')) {
         		$('#err-step-3').html('**Please enter a coupon title');
		} else if(!$(format).is(':checked') && $('#step-3').data('clicked')) {
         		$('#err-step-3').html('**Please select a title format');
		} else if(title.length > 0 && $(format).is(':checked') && $('#step-3').data('clicked')) {
         		$('#err-step-3').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-2').data('completed', true);
		}
	});

	$('#blk-2 input, #step1-percent').change(function() {
    	$('#step-2').data('completed', false);
	var rpInput = $('#percent-off').val();
	var spInput = $('#minimum-purchase').val();
	var title = $('#featured-item').val();
	var format = $('#blk-b-2 input:radio[name="title_format"]');
		if($('#step1-percent').is(':checked') && rpInput.length > 0 && spInput.length > 0) {
         		$('#err-step-2').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-2').data('completed', true);
		} else {
         		$('#err-step-2').html('**Please set value');
		}

		if(title.length < 1 && $('#step-3').data('clicked')) {
         		$('#err-step-3').html('**Please enter a coupon title');
		} else if(!$(format).is(':checked') && $('#step-3').data('clicked')) {
         		$('#err-step-3').html('**Please select a title format');
		} else if(title.length > 0 && $(format).is(':checked') && $('#step-3').data('clicked')) {
         		$('#err-step-3').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-2').data('completed', true);
		}
	});

	$('#percent-off').keyup(function(e) {
    		var $this = $(this);
    		var val = $this.val();
    		if (val > 100){
        		e.preventDefault();
       		$this.val(100);
    		}
	});


// -- Step 3 Functions -- //
	$('#step-3').one("click", function() {
       	$('#err-step-3').html('**Please enter coupon title');
    		$(this).data('clicked', true);
	});

	$('#featured-item, input:radio[name="title_format"]').change(function() {
    	$('#step-3').data('completed', false);
	var title = $('#featured-item').val();
	var format = $('input:radio[name="title_format"]');
		if(title.length < 1) {
         		$('#err-step-3').html('**Please enter a coupon title');
		} else if(!$(format).is(':checked')) {
         		$('#err-step-3').html('**Please select a title format');
		} else {
         		$('#err-step-3').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		    	$('#step-3').data('completed', true);
		}
	});


// -- Step 4 Functions -- //
	$('#step-4').one("click", function() {
       	$('#err-step-4').html('**Please select a coupon image');
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
       		$('#err-step-4').html('**Invalid image format!');
			$('#step-4').data('completed', false);
			$('#img_type').val("");
		} else {
         		$('#err-step-4').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
            		$("#rmImg").show("fast");
			$('#step-4').data('completed', true);
		}
		$('#img_type').val("uploaded");
	});

	var profImg = "<?=$prof_img?>?<?=$last_update?>";
	$('.use-profile-pic').click(function() {
        	$('#imgPreview').attr('src','uploads/merchants/' + profImg);
         	$('#err-step-4').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
            	$("#rmImg").show("fast");
		$('#step-4').data('completed', true);
		$('#img_type').val("prof");
	});

	$('.reuse-img').click(function() {
		$.fancybox.close();
     		var c_id = $(this).attr('id');
        	$('#imgPreview').attr('src','uploads/coupons/' + c_id + '.jpg');
         	$('#err-step-4').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
            	$("#rmImg").show("fast");
		$('#step-4').data('completed', true);
		$('#img_type').val("reuse");
		$('#reuse_id').val(c_id);
	});

	$('#rmImg').click(function() {
        	$('#imgPreview').attr('src','');
       	$('#err-step-4').html('**Please select a coupon image');
            	$("#rmImg").fadeToggle();
		$('#step-4').data('completed', false);
		$('#img_type').val("");
	});



// -- Step 5 Functions -- //
	$('#step-5').one("click", function() {
       	$('#err-step-5').html('**Please give your coupon a description');
	});

	$('#description textarea').keyup(function() {
    	$('#step-5').data('completed', false);
		if($('#description textarea').val() < 1) {
         		$('#err-step-5').html('**Please give your coupon a description');
		} else {
         		$('#err-step-5').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-5').data('completed', true);
		}
	});


// -- Step 6 Functions -- //
	$('#step-6').one("click", function() {
       	$('#err-step-6').html('**Please select date range');
	});

	$('#maxPurchases, #maxPurchases_num').bind('change keyup', function() {
	var maxNum = $('#maxPurchases_num').val();
    	$('#step-6').data('completed', false);
		if($('#maxPurchases').is(':checked') && maxNum.length < 1) {
       		$('#err-step-6').html('**Max. purchases is empty');
		} else if(!$('#posting_date').datepicker('getDate')) {
       		$('#err-step-6').html('**Please select a start date');
		} else if(!$('#removal_date').datepicker('getDate')) {
       		$('#err-step-6').html('**Please select an ending date');
		} else {
 			$('#err-step-6').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-6').data('completed', true);
		}

	});


// -- Step 7 Functions -- //
	$('#step-7').one("click", function() {
       	$('#err-step-7').html("**Please select the coupon's validity date range");
	});


// -- Step 8 Functions -- //
	$('#step-8').one("click", function() {
       	$('#err-step-8').html('**Please set some coupon restrictions');
	});

	$('#restrictions textarea').keyup(function() {
    	$('#step-8').data('completed', false);
		if($('#restrictions textarea').val() < 1) {
         		$('#err-step-8').html('**Please set some coupon restrictions');
		} else {
         		$('#err-step-8').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
    			$('#step-8').data('completed', true);
		}
	});


// -- Step 9 Functions -- //
	$('#step-9').one("click", function() {
       	$('#err-step-9').html("**Please enter some search keywords");
	});

	$('#keywords textarea').keyup(function() {
    	$('#step-9').data('completed', false);
		if($('#keywords textarea').val() < 1) {
         		$('#err-step-9').html('**Please give your coupon a description');
		} else {
         		$('#err-step-9').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		    	$('#step-9').data('completed', true);
		}
	});


// -- Step 10 Functions -- //
	$('#step-10').one("click", function() {
       	$('#err-step-10').html("Would you like to run an ad?");
	});

	$('#faRadio input').bind('change keyup', function() {
    	$('#step-10').data('completed', false);
	var fAd = $('input[name="featuredAd"]:checked').val()
	var lAd = $('input[name="large_ad"]:checked').val()
	var sAd = $('input[name="side_ad"]:checked').val()
		if(fAd == 1) {
			if(lAd == 1 && !$('#budget_large').val()) {
       			$('#err-step-10').html('**Please enter your large ad budget');
			} else if (sAd == 1 && !$('#budget_side').val()) {
       			$('#err-step-10').html('**Please enter your side ad budget');
			} else if (!sAd && !lAd) {
       			$('#err-step-10').html('**Please select a large ad, side ad, or both');
			} else {
 				$('#err-step-10').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		    	$('#step-10').data('completed', true);
			}
		} else {
 			$('#err-step-10').html('<img class="checkmark" src="images/green-check.png" width=30 height=25>');
		    	$('#step-10').data('completed', true);
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
   for (var n = 1; n < 11; n++) {
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