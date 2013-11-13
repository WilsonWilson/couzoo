<!--START footer-->
<div id="footer">
<div id="footer-animals"></div>
<div id="footer-container">

<div id="footer-column">
<h2>COUZOO</h2>
<ul>
<li><a class="footer-column-link" href="index.php">home</a></li>
<li><a class="footer-column-link" href="about-us.php">about us</a></li>
<li><a class="footer-column-link" href="contact-us.php">contact us</a></li>
</ul>
</div><!--END Footer Column-->

<div id="footer-column">
<h2>Merchant Info</h2>
<ul>
<li><a class="footer-column-link" href="compare-couzoo-to-daily-deals.shtml">compare to daily deals</a></li>
<li><a class="footer-column-link" href="post-a-couzoo-coupon.shtml">post a coupon</a></li>
<li><a class="footer-column-link" href="couzoo-merchants-faqs.shtml">FAQs</a></li>
</ul>
</div><!--END Footer Column-->

<div id="footer-column">
<h2>Customer Info</h2>
<ul>
<li><a class="footer-column-link" href="compare-couzoo-to-daily-deals.shtml">compare to daily deals</a></li>
<li><a class="footer-column-link" href="subscribe-to-couzoo-unlimited-coupons.shtml">subscribe to unlimited coupons</a></li>
<li><a class="footer-column-link" href="couzoo-customer-faqs.shtml">FAQs</a></li>
</ul>
</div><!--END Footer Column-->

<!--
<div id="footer-column-video">

</div><!--END Footer Column-->


</div><!--END footer container-->
</div><!--END footer-->

<script type="text/javascript">
$('.buy-now-btn').click(function() {
	$(this).closest("form").submit();
});

$('.add-to-cart-btn').click(function() {
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, type: 'Cart' },
        beforeSend: function(){
            $('#cartStatus_' + cid).fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(data){
            $('#cartStatus_' + cid).fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#cartNum').fadeIn(250).html(data.number);
            $('#emptyCartMsg').remove();
	     $("#cart-item-container li:first").after(data.items);
            $('#totalQty').fadeIn(250).html(data.tQty);
            $('#totalPrice').fadeIn(250).html(data.tPrice);
        },
        error: function(data){
            $('#cartStatus_' + cid).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});

$('.maybe-btn').click(function() {
var cid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "update.php",
    	 dataType: "json",
        data: { id_user: '<?=$id_user?>', id_coupon: cid, type: 'Watch' },
        beforeSend: function(){
            $('#watchStatus_' + cid).fadeIn(250).css('color', '#f26625').html('One moment..');
        },
        success: function(data){
            $('#watchStatus_' + cid).fadeIn(250).html(data.message).delay(2500).fadeOut(250);
            $('#watchNum').fadeIn(250).html(data.number);
            $('#emptyWatchMsg').remove();
	     $("#watching-item-container li:first").after(data.items);
            $('#watchTQty').fadeIn(250).html(data.tQty);
            $('#watchTPrice').fadeIn(250).html(data.tPrice);
        },
        error: function(data){
            $('#watchStatus_' + cid).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(2500).fadeOut(250);
        }
    });
    return false;
});
</script>