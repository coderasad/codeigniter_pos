$("document").ready(function () {
	var sl = 1;	
	// Add Sell Row =========
	$("#add-invoice-item").click(function () {
		var product_id = $(".product_id").val();
		var product_name = $(`.product_id option[value='${product_id}']`).html();
		var quantity = $(".quantity").val();
		var price = $(".price").val();
		var min = $(".price").attr("min");
		var maxqty = Number($(".quantity").attr("max"));
		var total = price * quantity;

		if (
			product_id != "" &&
			quantity > 0 &&
			quantity <= maxqty &&
			price > min - 1
		){
			$("#addinvoiceItem tr:first-child").css({
				display: "none",
			});
			$("#addinvoiceItem").append(`
				<tr id=rowId_${sl}>
					<td class="text-center ">${sl++}</td>
					<td class="text-center t_product_id">${product_name}<input type='hidden' name='t_product_id[]' value='${product_id}'></td>
					<td class="text-center"><input type='number' class='t_quantity border-0 form-control text-right' name='t_quantity[]' value='${quantity}' autocomplete="off" min="0"></td>
					<td class="text-center"><input type='number' value='${price}' name='t_price[]' class='t_price form-control border-0 text-right'  min="0"></td>
					<td class="text-center"><input type='number' readonly value='${total}' name='t_total[]' class='t_total form-control border-0 text-right'></td>
					<td class="text-center"><a class='btn_delete btn btn-block text-white btn-danger'>Delete</a></td>
				</tr>
			`);
			$(".quantity").val("");
			$(".price").val("");
			$(".available_quantity").val("");

			// total price area
			var total_price = $(".t_total");
			var total = 0;
			total_price.each(function () {
				total += Number($(this).val());
			});			
			var paid_amount = $(".paid_amount").val();
			var discount = Number($("#discount").val());
			$(".total").val(total);
			var total2 = $(".total").val();
			$("#grandTotal").val(total2 - discount);
			var grandTotal = Number($("#grandTotal").val());
			$(".due_amount").val(grandTotal - paid_amount);
			
		} else {
			alert("Field is Required");
		}
	});

	// Available Product Select=========
	$("body").on("change", ".product_id", function () {
		var pid = $(this).val();
		if (pid) {
			$.ajax({
				type: "post",
				url: $("meta[name='url']").attr("content") + "api/product-check",
				data: {
					pid: pid,
				},
				success: function (data) {
					$("#available_quantity").html(`
                        <label for="available_quantity" class="col-form-label">Stock <i class="text-danger">*</i></label>
                        <input type="text" readonly="" name="available_quantity" class="available_quantity form-control text-right" value="${data}" >
                    `);
					$("#quantity").html(`
                        <label for="quantity" class="col-form-label">Quantity <i class="text-danger">*</i></label>
                        <input type="number" name="quantity" min="0" max="${data}" autocomplete="off" class="quantity form-control text-right" placeholder="0 Pcs">
                    `);
					$("#price").html(`                    
                        <label for="price" class="col-form-label">Price <i class="text-danger">*</i></label>
                        <input type="number" name="price" min="0" autocomplete="off" class="price form-control text-right" placeholder="0 Tk.">
                    `);
				},
			});
		}
	});

	// Product Price=========
	$("body").on("change", ".quantity", function () {
		var qid = $(".product_id").val();
		if (qid) {
			$.ajax({
				type: "post",
				url: $("meta[name='url']").attr("content") + "api/product-price",
				data: {
					qid: qid,
				},
				success: function (data) {
					$("#price").html(`                    
                        <label for="price" class="col-form-label">Price <i class="text-danger">*</i></label>
						<input type="number" name="price" min="${data}" autocomplete="off" id='click_price' class="price form-control text-right" placeholder="0 Tk.">						
                    `);
				},
			});
		}
	});

	// Delete Sell Row  =================
	$("body").on("click", ".btn_delete", function () {
		$(this).parents("tr").remove();
		var total_price = $(".t_price");
		var total = 0;
		total_price.each(function () {
			total += Number($(this).val());
		});
		$(".total").val(total);
		$("#grandTotal").val(total);
	});

    // discount======= 
	$("body").on("change", "#discount", function () {
		var discount = Number($(this).val());
		var paid_amount = Number($(".paid_amount").val());
		var total = Number($(".total").val());
		var dp = Number(total - discount);
        var due = Number(dp - paid_amount);  
        if(total > discount){
            $("#grandTotal").val(dp);      
            $(".due_amount").val(due); 
		}
    });
    
    // Due======= 
	$("body").on("change", ".paid_amount", function () {
		var discount = Number($("#discount").val());
		var paid_amount = Number($(".paid_amount").val());
		var total = Number($(".total").val());
		var dp = Number(total - discount);
        var due = Number(dp - paid_amount);  
        if(total > discount){
            $("#grandTotal").val(dp);      
            $(".due_amount").val(due); 
        }
	});

    // qty table ======= 
	$("body").on("change", ".t_quantity ", function () {
		var qty = $(this).val();
		var b = $(this).parents("tr").attr("id");
		// var b = $(a).val();
		var c = $(`#${b} .t_price`).val();
		alert(c)
		// var price = $('.t_price').val();
		// var ss = $(this).siblings(price).val();
		// alert(ss);



		// // total price area
		// var total_price = $(".t_total");
		// var total = 0;
		// total_price.each(function () {
		// 	total += Number($(this).val());
		// });			
		// var paid_amount = $(".paid_amount").val();
		// var discount = Number($("#discount").val());
		// $(".total").val(total);
		// var total2 = $(".total").val();
		// $("#grandTotal").val(total2 - discount);
		// var grandTotal = Number($("#grandTotal").val());
		// $(".due_amount").val(grandTotal - paid_amount);
		
	});
	
    // Order No======= 
	$("body").on("change", ".customers_id", function () {
		var str = 1 + Math.floor(Math.random() * 9999);
		// var str = Math.random().toString(36).substring(7);
		$(".order_no").val(str)
	});
	
    // customer_id No======= 
	$("body").on("change", ".customer_id", function () {
		var customer_id = $('.customer_id').val()
		if (customer_id) {
			$.ajax({
				type: "post",
				url: $("meta[name='url']").attr("content") + "api/customer/due/amount",
				data: {
					'customer_id': customer_id,
				},
				success: function (data) {
					$(".customer_due").html(`
						<input class="form-control" readonly max='${data}' name='pre_balance' value='${data}'>			
					`)
					$(".due_amount").html(`
						<input required="" class="form-control " name="amount" type='number' min='0' max='${data}' placeholder="Amount">	
					`)
				}
			});
		}

	});
	
    // supplierID No======= 
	$("body").on("change", ".supplier_id", function () {
		var supplier_id = $('.supplier_id').val()
		if (supplier_id) {
			$.ajax({
				type: "post",
				url: $("meta[name='url']").attr("content") + "api/customer/pay/amount",
				data: {
					'supplier_id': supplier_id,
				},
				success: function (data) {
					$(".customer_due").html(`
						<input class="form-control" readonly max='${data}' name='pre_balance' value='${data}'>			
					`)
					$(".due_amount").html(`
						<input required="" class="form-control " name="amount" type='number' min='0' max='${data}' placeholder="Amount">	
					`)
				}
			});
		}

	});

	// Transection_mood option======= 
	$("body").on("change", "input[name=transectio_type]", function () {
		radioBtn = Number($(this).val());
		if(radioBtn == 1){
			$('.supplierID').show()
			$('.customerID').hide()
		}
		else if(radioBtn == 2){
			$('.customerID').show()
			$('.supplierID').hide()
		}
	});
    // Check option payment ======= 
	$("body").on("change", "#transection_mood", function () {
		trnBtn = Number($(this).val());
		if(trnBtn == 2){
			$('#bank_info_hide').show()
		}
		else{
			$('#bank_info_hide').hide()
		}
	});

	$("#print").click(function () {
        window.print();
	});
	
	
});
