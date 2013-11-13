// JavaScript Document
        $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCall").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCall input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 2.0);
            }
            function demoFocus(element) {
                $("#advancedCall input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(400, 0.5);
            }
        });
		
		
/*Below is for Login drop down */		
	   $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCall2").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCall2 input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 2.0);
            }
            function demoFocus(element) {
                $("#advancedCall2 input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(400, 0.5);
            }
        });
		
		
/*Below is for Register drop down */		
	   $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCall3").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCall3 input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 2.0);
            }
            function demoFocus(element) {
                $("#advancedCall3 input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(400, 0.5);
            }
        });	
		
/*Below is for Home page browse location section */		
	   $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCallBrowse").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCall3 input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 2.0);
            }
            function demoFocus(element) {
                $("#advancedCall3 input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(400, 0.5);
            }
        });	
		
		
/*Below is for Home page browse location section */		
	   $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCallLogin").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCallLogin input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 2.0);
            }
            function demoFocus(element) {
                $("#advancedCallLogin input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(400, 0.5);
            }
        });	
		
		
/*Below is for the Mini Cart */		
	   $(document).ready(function () {
            /*Calling your own functions through Form Highlighter*/
            $("#advancedCall-minicart").formHighlighter({
                classFocus: 'demoFocus',
                classBlur: 'demoBlur',
                classKeyDown: 'demoKeydown',
                classNotEqualToDefault: 'demoNotEqualToDefault',
                clearField:false,
                onBlur: function () { demoBlur(); },
                onFocus: function () { demoFocus($(this)); }
            });
            /*Your own function that will be called from Form Highlighter*/
            function demoBlur() {
                $("#advancedCall-minicart input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(500, 2.0);
            }
            function demoFocus(element) {
                $("#advancedCall-minicart input.demoBlur:not(input:hidden)").stop(0, 1).fadeTo(400, 0.5);
            }
        });								
		
	