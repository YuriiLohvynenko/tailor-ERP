// JavaScript Document
function deleteRow(obj) {
 	var d = obj.id;
	document.getElementById(d+"_att").innerHTML='';
	document.getElementById(d).value = '';
}

function cloneRow()
  {
   var row = document.getElementById("rowToClone"); // find row to copy
   var table = document.getElementById("tableToModify"); // find table to append to
   var clone = row.cloneNode(true);
   clone.id = "rowToClone"; // change id or other attributes/contents
   table.appendChild(clone); // add new row to end of table
}



function disableddays()
{
    alert("jitendra");
}
/*------JQUERY VALIDATION FILE FOR TAILOR APP-----------*/		
$(document).ready(function() {
	
			var baseUrl = $("#baseurl").val();
	
			$("#employee").select2({
                placeholder: "select employee",
				allowClear: true
            });
			
			$("#category").select2({
                placeholder: "Select Option",
				allowClear: true
            });
			
			$("#select2").select2({
                placeholder: "Select Option",
				allowClear: true
            });
			
			$("#select3").select2({
                placeholder: "Select Option",
				allowClear: true
            });
			
			$("#select4").select2({
                placeholder: "Select Option",
				allowClear: true
            });
			$("#product_sel").select2({
                placeholder: "Select Product",
				allowClear: true
            });
			$("#pattarn_sel").select2({
                placeholder: "Select pattarn",
				allowClear: true
            });
			$(".worker").select2({
                placeholder: "Select worker",
				allowClear: true
            });
			$("#payment_type").select2({
                placeholder: "Select type",
				allowClear: true
            });
			
			$("#style_sel").select2({
                placeholder: "Select style",
				allowClear: true
            });
			$("#employees_sel").select2({
                placeholder: "Select Product",
				allowClear: true
            });
		
			$("#select5").select2({
                placeholder: "Select Option",
				allowClear: true
            });
			
			$("#select6").select2({
                placeholder: "Select Option",
				allowClear: true
            });	
			
			$("#select7").select2({
                placeholder: "Select Option",
				allowClear: true
            });
			
			$("#select8").select2({
                placeholder: "Select Option",
				allowClear: true
            });
            
            $("#select9").select2({
                placeholder: "Select Option",
				allowClear: true
            });		
			
			$("#status").select2({
                placeholder: "Select Status",
				allowClear: true
            });
			
			$("#country").select2({
                placeholder: "Country",
				allowClear: true
            });
			
			$("#province").select2({
                placeholder: "Province",
				allowClear: true
            });
			
			$("#language").select2({
                placeholder: "Select your language",
				allowClear: true
            });
			
/*---------JQUERY AJAX CODE IN TAILOR APP----------------*/			
			
			<!------GET STATE LIST AJAX FUNCTION------>
			
			$("#country").change(function(){
				$("#loading").html( "" );
				var cntid = $(this).val();
				$.ajax({
					url: baseUrl+"modal/getStateList",
					type: "post",
					data: {'id':cntid},
					cache: false,
					beforeSend: function () {
					$('#loading').html('<img src="'+baseUrl+'/assets/img/loaders/1.gif" alt="" width="24" height="24">');
					},
					success: function(msg){
						$("#state").html(msg);
						$("#loading").html('');
						$("#province").select2({
							placeholder: "Province"
						})
					},
					error:function(){
						$("#state").val('Not Found');
					}
				});
			});
			
			$("#category").change(function(){
				$("#loading").html( "" );
				var cntid = $(this).val();
				$.ajax({
					url: baseUrl+"modal/getSubcategoryList",
					type: "post",
					data: {'id':cntid},
					cache: false,
					beforeSend: function () {
					$('#loading').html('<img src="'+baseUrl+'/assets/img/loaders/1.gif" alt="" width="24" height="24">');
					},
					success: function(msg){
						$("#subcat").html(msg);
						$("#loading").html('');
						$("#select3").select2({
							placeholder: "Sub Category"
						})
					},
					error:function(){
						$("#subcat").val('Not Found');
					}
				});
			});
		
/*---------JQUERY ATTACHMENT FILE SHOW CODE IN TAILOR APP----------------*/			
			
			
			<!------PRODUCT IMAGE ATTACTMENT IN PRODUCT NEW------> 
			$('#image').change(function(){
				
				var file = $(this)[0].files[0];
				var times = "<a href='javascript:;' onclick='deleteRow(image)' class='deldoc'><i class='fa fa-times-circle'></i></a>";
				$("#image_att").html(file.name+" "+times);
				
			});
			
/*---------JQUERY CALENDERS CODE IN TAILOR APP----------------*/			
			
			<!------CALENDER------> 
			$('.dob').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
			
			$('.reg_date').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
			
			$('.attdate').datetimepicker({
				/*language:  'en',*/
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left",
				daysOfWeekDisabled: [0,6],
				datesDisabled:["2015-06-02","2015-06-04"]
				
				
			});
			
			$('.attdateto').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left",
			});
			
			$('.start_date').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left",
			});
			
			$('.time_in').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 1,
				minView: 0,
				maxView: 1,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
		
			$('.time_out').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 1,
				minView: 0,
				maxView: 1,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
			
			
			<!------QUALIFICATION CLONE FUNCTION IN NEW EMPLOYEE------> 
			
			/* $("#tableData").on('click', 'button.addButton', function() {
			  
					var $tr = $(this).closest('tr');
					var allTrs = $tr.closest('table').find('tr');
					var lastTr = allTrs[allTrs.length-1];
					var $clone = $(lastTr).clone();
					$clone.find('td').each(function(){
						var el = $(this).find(':first-child');
						var id = el.attr('id') || null;
						if(id) {
							var i = id.substr(id.length-1);
							var prefix = id.substr(0, (id.length-1));
							el.attr('id', prefix+(+i+1));
							el.attr('name', prefix+(+i+1));
						}
					});
					$clone.find('input:text').val('');
					$tr.closest('table').append($clone);
				});*/
				
/*---------JQUERY VALIDATION CODE ON PAGES IN TAILOR APP----------------*/

			<!---------SETTINGS PAGE VALIDATION------->		
						
			$('#settings').validate(
             {
              rules: {
                system_name: {
                  minlength: 6,
                  required: true
                },
				system_title: {
                  minlength: 6,
                  required: true
                },
				address: {
                  minlength: 6,
                  required: true
                },
				phone: {
                  minlength: 10,
                  required: true,
				  digits: true
                },
                system_email: {
                  required: true,
                  email: true
                },
				currency: {
				  minlength: 3,
                  required: true
                },
				
                language: {
                  required: true
                },
				purchase_prefix: {
                  required: true
                },
				order_prefix: {
                  required: true
                },
				invoice_prefix: {
                  required: true
                },
				tax_rate: {
                  required: true
                },
				tax_rate2: {
                  required: true
                },
				dateformat: {
                  required: true
                },
				default_discount: {
                  required: true
                },
				discount_method: {
                  required: true
                },
				discount_option: {
                  required: true
                },
                default_bonus: {
                  required: true
                },
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			<!---------SMTPCONFIGURATION PAGE VALIDATION------->
				 
			 $('#smtpConfiguration').validate(
             {
              rules: {
                smtp: {
                  required: true
                },
				port: {
					digits:true,
                  minlength: 2,
                  required: true
                },
				username: {
                  email: true,
                  required: true
                },
				password: {
                  required: true,
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			<!---------EMAILTEMPLATES PAGE VALIDATION------->
				 
			  $('#emailTemplates').validate(
             {
              rules: {
                template: {
                  required: true
                },
				subject: {
                  required: true
                },
				email: {
                  email: true,
                  required: true
                },
				editor1: {
                  required: true,
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			<!---------CHANGE PASSWORD PAGE VALIDATION------->	 
			 $('#changePass').validate(
             {
              rules: {
                old_pass: {
                  
                  required: true
                },
				new_pass: {
                 
                  required: true
                },
				cn_pass: {
                 
                  required: true,
				 /* equalTo:'#new_pass'*/
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			<!---------PRODUCT FORM PAGE VALIDATION------->
				 
			  $('#productForm').validate(
             {
              rules: {
                product_code: {
                  required: true
                },
				product_name: {
                  required: true
                },
				category: {
                  required: true
                },
				size: {
                  required: true,
                },
				product_cost: {
                  required: true
                },
				product_price: {
                  required: true
                },
				/*alert_quantity: {
                  required: true
                },*/
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			<!------EMPLOYEE VALDATION------>  
			$('#employeesForm').validate(
             {
              rules: {
				 
				fname: {
                  required: true
                },
				lname: {
                  required: true
                },
				
               
				sex: {
                  required: true
                },
				
                /*religion: {
                  required: true
                },*/
				
				dateofbirth: {
                  required: true
                },
				
                country: {
                  required: true
                },
				province: {
                  required: true,
                },
				city: {
                  required: true
                },
				gender:{
					required: true
				},
               
				
				postal: {
                  required: true,
				  digits: true
                },
				
                address: {
                  required: true
                },
				mobile: {
                  required: true,
				  digits: true
                },
				phone: {
				  digits: true
                },
				
                email: {
                  required: true,
				  email: true
                },
				/*emp_id: {
                  required: true,
                },*/
				
				/*password: {
                  required: true
                }, 
                cnpassword: {
                  required: true,
				  equalTo: "#password"
                },*/
				
				company: {
                  required: true,
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			<!------PURCHASE VALIDATION------> 
			$('#purchaseForm').validate(
             {
              rules: {
				 employee: {
                  required: true
                }, 
                attdate: {
                  required: true
                },
				/*attdateto: {
                  required: true
                },*/
				timein: {
                  required: true
                },
				timeout: {
                  required: true
                }
				
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			
		<!------PAYROLL EMPLOYEE SEARCH VALIDATION------> 	  
		
			$('#empSearchForm').validate(
             {
              rules: {
				 employee: {
                  required: true
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             }); 
});
