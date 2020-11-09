$("document").ready(function() {
    $('.waves-effect').click(function(){
        $('.waves-effect').removeClass('active');
        $(this).addClass('active');
    });

    $("#new_customer_show_btn").click(function(){
        $("#payment_from_new_customer").css('display','block')
        $("#payment_from_old_customer").css('display','none')
    });

    $("#old_customer_show_btn").click(function(){
        $("#payment_from_old_customer").css('display','block')
        $("#payment_from_new_customer").css('display','none')
    });

    // add Sell Row =========
    var demo_id = 1;    
    $("#add-invoice-item").click(function(){     
        ++demo_id;
        if(demo_id){
            $.ajax({
                type: "post",
                url: $("meta[name='url']").attr("content") + "api/add-row",
                data: {
                    demo_id: demo_id
                },
                success: function(data) {
                    $("#addinvoiceItem").append(data)
                }
            });
        }
    });

    // Delete Sell Row  =================
    $("body").on('click','.btn_delete',function(){
        $(this).parents('tr').remove();
    });
    
    // Available Product Select=========    
    $("body").on('change','.product_id',function(){
        var pid = $(this).val();
        var attrId = $(this).attr("id");
        var str = attrId.substr(11);
        var aid = "#available_quantity_"+str;
        if(pid){
            $.ajax({
                type: "post",
                url: $("meta[name='url']").attr("content") + "api/product-check",
                data: {
                    pid: pid
                },
                success: function(data) {
                $(aid).html(`<input type="text" name="available_quantity" class="form-control text-right" value="${data}" readonly="">`)
                }
            });
        }
    });

    
    // Available Product Select=========    
    $("body").on('change','input[name="quantity[]"]',function(){
        var attrId = $(this).attr("id");
        var str = attrId.substr(9);
        var pid = "#rate_"+str;
        var tid = "#total_price_"+str;
        var qty = $(this).val();        
        var price = $(pid).val();
        var maxid = "#available_quantity_"+str+" .form-control"
        var max = $(maxid).val();
        $(this).attr('max',max);
        var total = qty * price;
        $(tid).val(total);  

        var total_price = $('.total_price');
        var grand_total = 0;
        total_price.each(function() {
            grand_total += Number($(this).val());
        });    
        $("#grandTotal").val(grand_total);  
    })

    // $("body").on('change','input[name="rate[]"]',function(){
    //     var attrId = $(this).attr("id");
    //     var str = attrId.substr(5);
    //     var pid = "#rate_"+str;
    //     var tid = "#total_price_"+str;
    //     var qty = $(this).val();        
    //     var price = $(pid).val();
    //     var total = qty * price;
    //     $(tid).val(total);  

    //     var total_price = $('.total_price');
    //     var grand_total = 0;
    //     total_price.each(function() {
    //         grand_total += Number($(this).val());
    //     });    
    //     $("#grandTotal").val(grand_total);  
    // })

    
})
