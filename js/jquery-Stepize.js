(function($){  
           /************ FUNCTION FO CALCULATE OFFSET OF AN ELEMENT IN A PARENT *****************/
          function offset(selector,parent){
           var position = (selector.offset().left - parent.offset().left);
            position = position -((parent.outerWidth()-parent.innerWidth())/2);
           return position;  
          };
          /************* FUNCTION TO CALCULATE CURRENT VISIBLE STEP *****************/
            function current_step(selector,form){             
              form.find(selector).each(function(i){            
               if(offset($(this),$(this).closest(form)) == 0){
                d = i;
               }
              });             
              return d;
            };        
          /************* FUNCTION TO RIGHT AND LEFT SLIDE STEP AND SEVERAL CONTROLS****************/
          function slide_form(container,selector,form,n_p,highlight_class){
            
            if(n_p == 'next'){
              np = '-='+selector.outerWidth( true );                      
            }else{
              np = '+='+selector.outerWidth( true );
            }
            selector.each(function(i){
            i++;
            var inext = i + 1;
            var iprev = i - 1;           
             if(offset($(this),$(this).closest(form)) == 0){
               if(n_p == 'next'){               
                  form.animate({'height':selector.eq(current_step(selector,form)).next(selector).height()+'px'},200,function(){                  
                     container.animate({'left' : np}, 200,function(){
                       selector.eq(current_step(selector,form)).find('input:first').focus();
                       $('[rel_form="'+form.attr('id')+'"][rel^="fstep_"]').removeClass(highlight_class);
                       $('[rel_form="'+form.attr('id')+'"][rel="fstep_'+inext+'"]').addClass(highlight_class);
                     });         
                  });
               }else{
                  form.animate({'height':$(this).prev(selector).height()+'px'},200,function(){
                     container.animate({'left' : np}, 200,function(){
                       selector.eq(current_step(selector,form)).find('input:first').focus();
                       $('[rel_form="'+form.attr('id')+'"][rel^="fstep_"]').removeClass(highlight_class);
                       $('[rel_form="'+form.attr('id')+'"][rel="fstep_'+iprev+'"]').addClass(highlight_class);                     
                     });           
                  });        
               }
             }
           });  
          }; 
 $.fn.StepizeForm = function(options) {  
            /***************************************/
            /** List of available default options **/
            /***************************************/
            var defaults = {  
            Text_Next         :  'Next',//--> text of "NEXT" button
            Text_Prev         :  'Prev',//--> text of "PREV" button
            Text_Submit       :  'Submit',//--> text of "SUBMIT" button
            Class_Prev        :  'myButton',/**** you can add more class to "PREV" button, give them an interspace eg:. "class1 class2 class3" ****/
            Class_Next        :  'myButton',/**** you can add more class to "NEXT" button, give them an interspace eg:. "class1 class2 class3" ****/
            Class_Submit      :  'myButton',/**** you can add more class to "SUBMIT" button, give them an interspace eg:. "class1 class2 class3" ****/
            Class_Highlight   :  'step_highlight'//--> class to give "STEP BAR" when you go to the next step
            }; 
            
   var options = $.extend(defaults, options); 
    return this.each(function() {                     
//--------------------------------------------------------------------------////---------------------------------------------------------//    
          /************** create the elements for the form *********************/    
               var o = options        
          ,  $this = $(this)
          ,  $steps = $this.find('[id*="fstep_"]');
          $steps.wrapAll('<div class="container_steps" style="position:relative" />').append('<div style="clear:both"></div>');
          $this.wrap('<div class="container_form" />');
          var $container_steps = $this.find('.container_steps')
          ,   $container_form = $this.closest('.container_form');
          $container_form.append('<span type="button" class="fprev '+o.Class_Prev+'" style="display:none">'+o.Text_Prev+'</span>'
                                 +'<span type="button" class="fnext '+o.Class_Next+'">'+o.Text_Next+'</span>'
                                 +'<span type="submit" class="fsubmit '+o.Class_Submit+'" style="display:none">'+o.Text_Submit+'</span>');
          var $next_b = $container_form.find('.fnext')
          ,   $prev_b = $container_form.find('.fprev')
          ,   $submit_b = $container_form.find('.fsubmit');
          
          
          $this.find('button:submit,input:submit').remove();
          $this.css({'height':$this.find('[id^="fstep_"]:first').height()+'px','overflow':'hidden','width':$this.outerWidth( true ),'border':'none','padding':'0px','margin':'0px'});           
          $steps.css({'width':$this.outerWidth( true ),'overflow':'auto','border':'none','padding':'0px','margin':'0px','float':'left'});
          $container_steps.css({'width':($this.outerWidth( true )*$steps.length)+'px','border':'none','padding':'0px','margin':'0px'});
          $('[rel_form="'+$this.attr('id')+'"]:first').addClass(o.Class_Highlight);
             /**************** validation of form (required jquery plugin "validate" *************/
           if($().validate){ 
            $this.validate(); 
           }                        
            /**************** controls on next click ************************************/                     
          $next_b.click(function(){
          var current = $steps.eq(current_step($steps,$this));
           if($().validate){ 
            $this.valid(); 
           } 
           if(current.find('.error:visible').length == 0){
              if ($().validate) $this.validate().resetForm();            
              slide_form($container_steps,$steps,$this,'next',o.Class_Highlight);              
              $prev_b.fadeIn('slow');              
              if(offset($steps.eq(($steps.length - 2)),$steps.eq(($steps.length - 2)).closest($this)) == 0){ 
                 $next_b.hide();
                 $submit_b.fadeIn('slow');
              } 
           }else{
            $this.animate({'height':current.height()+'px'},200);
           }                           
          });
          /****************** controls to prev click ***********************************/
          $prev_b.click(function(){
              if ($().validate) $this.validate().resetForm(); 
              slide_form($container_steps,$steps,$this,'prev',o.Class_Highlight); 
              $next_b.fadeIn('slow');
              $submit_b.hide(); 
              if(offset($steps.eq(1),$steps.eq(1).closest($this)) == 0){ 
                 $prev_b.hide();
              }                       
          }); 
          /***************** trigger "NEXT" and "SUBMIT" button on press ENTER **************/
          $steps.find('input').live('keydown',function(e){
           if(e.which == 13){
            if(offset($steps.eq(($steps.length-1)),$steps.eq(($steps.length-1)).closest($this)) == 0){
             $submit_b.click();
            }else{
             $next_b.click();
            }
           }
          });
          /****************** managment of slide bar *******************/
          $('[rel_form="'+$this.attr('id')+'"]').click(function(el){
             if($().validate){ 
               $this.valid(); 
             }
             var current = $steps.eq(current_step($steps,$this));
             if($('#'+$(this).attr('rel')).prevAll().find('.error:visible').length == 0){
              if ($().validate) $this.validate().resetForm();
              if($(this).attr('rel_form') != 'undefined'){                
                $steps.not(current).find('label.error').remove();
                $steps.not(current).find('.error').removeClass('error');              
                $('[rel_form="'+$this.attr('id')+'"]').removeClass(o.Class_Highlight);
                $(this).addClass(o.Class_Highlight);   
                el= $('#'+$this.attr('id'));
                var offset_left = $this.find('#'+$(this).attr('rel')).prevAll().length * el.outerWidth( true );                  
                el.animate({'height':$('#'+$(this).attr('rel')).height()+'px'},200,function(){
                   $container_steps.animate({'left' : -offset_left},100,function(){                      
                      if(offset($steps.eq(0),$steps.eq(0).closest($this)) == 0){ 
                         $prev_b.hide();
                         $submit_b.hide();
                         $next_b.fadeIn('slow');
                      }else if(offset($steps.eq(($steps.length-1)),$steps.eq(($steps.length-1)).closest($this)) == 0){
                         $next_b.hide();
                         $submit_b.fadeIn('slow');
                         $prev_b.fadeIn('slow');                              
                      }else{
                         $next_b.fadeIn('slow');
                         $prev_b.fadeIn('slow');
                         $submit_b.hide();
                      }                      
                      $steps.eq(current_step($steps,$this)).find('input:first').focus();                 
                   });                      
                });                              
               }
              }else{  
                    var current_error = $steps.find('.error:visible').closest($steps).attr('id');
                    $('[rel_form="'+$this.attr('id')+'"][rel="'+current_error+'"]').click();   
                    if($().validate){ 
                      $this.valid(); 
                    }                     
              }
          }); 
          /************** controls of form height on submit **********************/
          $submit_b.click(function(){ 
          if($().validate){ 
            $this.valid(); 
          }
           if($steps.eq(current_step($steps,$this)).find('.error:visible').length == 0){                     
             $this.submit();
           }else{
            $this.animate({'height':$steps.eq(current_step($steps,$this)).height()+'px'},200);        
           }             
          });    
//--------------------------------------------------------------------------////---------------------------------------------------------//

    });  
 };  
})(jQuery);
